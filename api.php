<?php
// PayDesk API: PHP backend for the existing MySQL employee_payroll database.
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

require_once __DIR__ . '/config.php';

function respond(bool $success, $data = null, string $message = '', int $status = 200): void {
    http_response_code($status);
    echo json_encode(['success' => $success, 'data' => $data, 'message' => $message], JSON_UNESCAPED_UNICODE);
    exit;
}
function getDb(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) return $pdo;
    $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    return $pdo;
}
function fetchData(PDO $pdo): array {
    $departments = array_map(fn($r) => ['id'=>(int)$r['department_id'], 'name'=>$r['department_name'], 'location'=>$r['location'] ?? ''], $pdo->query('SELECT department_id, department_name, location FROM Departments ORDER BY department_id')->fetchAll());
    $employees = array_map(fn($r) => ['id'=>(int)$r['employee_id'], 'first'=>$r['first_name'], 'last'=>$r['last_name'], 'email'=>$r['email'], 'hire'=>$r['hire_date'], 'departmentId'=>$r['department_id']===null?null:(int)$r['department_id'], 'basic'=>(float)$r['basic_salary']], $pdo->query('SELECT employee_id, first_name, last_name, email, hire_date, department_id, basic_salary FROM Employees ORDER BY employee_id')->fetchAll());
    $attendance = array_map(fn($r) => ['id'=>(int)$r['attendance_id'], 'employeeId'=>(int)$r['employee_id'], 'date'=>$r['attendance_date'], 'status'=>$r['status']], $pdo->query('SELECT attendance_id, employee_id, attendance_date, status FROM Attendance ORDER BY attendance_date DESC, attendance_id')->fetchAll());
    $payroll = array_map(fn($r) => ['id'=>(int)$r['payroll_id'], 'employeeId'=>(int)$r['employee_id'], 'month'=>(int)$r['pay_month'], 'year'=>(int)$r['pay_year'], 'bonus'=>(float)$r['bonus'], 'deductions'=>(float)$r['deductions'], 'net'=>(float)$r['net_salary'], 'status'=>$r['payment_status']], $pdo->query('SELECT payroll_id, employee_id, pay_month, pay_year, bonus, deductions, net_salary, payment_status FROM Payroll ORDER BY pay_year DESC, pay_month DESC, payroll_id')->fetchAll());
    return ['departments'=>$departments, 'employees'=>$employees, 'attendance'=>$attendance, 'payroll'=>$payroll];
}

function syncRows(PDO $pdo, string $table, string $idColumn, array $rows, string $columns, string $insertSql, callable $values): void {
    $ids = [];
    $stmt = $pdo->prepare($insertSql);

    foreach ($rows as $row) {
        if (!is_array($row)) {
            throw new RuntimeException('Invalid record supplied.');
        }

        $id = isset($row['id']) ? (int)$row['id'] : 0;
        $params = $values($row);

        // Keep the ID parameter: the SQL statement expects it.
        // ID 0 lets MySQL generate a new AUTO_INCREMENT ID.
        $stmt->execute($params);

        if ($id > 0) {
            $ids[] = $id;
        } else {
            $ids[] = (int)$pdo->lastInsertId();
        }
    }

    // Remove records deleted in the UI.
    $existing = $pdo->query(
        "SELECT {$idColumn} FROM {$table}"
    )->fetchAll(PDO::FETCH_COLUMN);

    $remove = array_values(array_diff(
        array_map('intval', $existing),
        $ids
    ));

    if ($remove) {
        $marks = implode(',', array_fill(0, count($remove), '?'));
        $del = $pdo->prepare(
            "DELETE FROM {$table} WHERE {$idColumn} IN ({$marks})"
        );
        $del->execute($remove);
    }
}

try {
    $pdo = getDb();
    if ($_SERVER['REQUEST_METHOD'] === 'GET') respond(true, fetchData($pdo));
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') respond(false, null, 'Method not allowed.', 405);
    $input = json_decode(file_get_contents('php://input'), true);
    if (!is_array($input) || ($input['action'] ?? '') !== 'sync' || !is_array($input['data'] ?? null)) respond(false, null, 'Invalid request.', 400);
    $data = $input['data'];
    foreach (['departments','employees','attendance','payroll'] as $key) if (!is_array($data[$key] ?? null)) respond(false, null, 'Missing or invalid ' . $key . ' data.', 400);

    $pdo->beginTransaction();
    // Upsert parent records before dependent records.
    syncRows($pdo, 'Departments', 'department_id', $data['departments'], '',
      'INSERT INTO Departments (department_id, department_name, location) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE department_name=VALUES(department_name), location=VALUES(location)',
      fn($r) => [(int)($r['id']??0), trim((string)($r['name']??'')), ($r['location']??'') !== '' ? (string)$r['location'] : null]);
    syncRows($pdo, 'Employees', 'employee_id', $data['employees'], '',
      'INSERT INTO Employees (employee_id, first_name, last_name, email, hire_date, department_id, basic_salary) VALUES (?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE first_name=VALUES(first_name), last_name=VALUES(last_name), email=VALUES(email), hire_date=VALUES(hire_date), department_id=VALUES(department_id), basic_salary=VALUES(basic_salary)',
      fn($r) => [(int)($r['id']??0), trim((string)($r['first']??'')), trim((string)($r['last']??'')), trim((string)($r['email']??'')) ?: null, (string)($r['hire']??''), (int)($r['departmentId']??0) ?: null, (float)($r['basic']??0)]);
    syncRows($pdo, 'Attendance', 'attendance_id', $data['attendance'], '',
      'INSERT INTO Attendance (attendance_id, employee_id, attendance_date, status) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE employee_id=VALUES(employee_id), attendance_date=VALUES(attendance_date), status=VALUES(status)',
      fn($r) => [(int)($r['id']??0), (int)($r['employeeId']??0), (string)($r['date']??''), (string)($r['status']??'Present')]);
    syncRows($pdo, 'Payroll', 'payroll_id', $data['payroll'], '',
      'INSERT INTO Payroll (payroll_id, employee_id, pay_month, pay_year, bonus, deductions, net_salary, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE employee_id=VALUES(employee_id), pay_month=VALUES(pay_month), pay_year=VALUES(pay_year), bonus=VALUES(bonus), deductions=VALUES(deductions), net_salary=VALUES(net_salary), payment_status=VALUES(payment_status)',
      fn($r) => [(int)($r['id']??0), (int)($r['employeeId']??0), (int)($r['month']??1), (int)($r['year']??date('Y')), (float)($r['bonus']??0), (float)($r['deductions']??0), (float)($r['net']??0), (string)($r['status']??'Pending')]);
    $pdo->commit();
    respond(true, fetchData($pdo), 'Database updated.');
} catch (Throwable $e) {
    if (isset($pdo) && $pdo instanceof PDO && $pdo->inTransaction()) $pdo->rollBack();
    error_log('PayDesk API error: ' . $e->getMessage());
    $message = $e instanceof PDOException ? 'Database operation failed. Check that the database exists, credentials are correct, and linked records are not being deleted.' : $e->getMessage();
    respond(false, null, $message, 500);
}

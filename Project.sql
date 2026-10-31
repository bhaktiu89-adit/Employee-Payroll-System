
-- ==========================================
-- EMPLOYEE PAYROLL SYSTEM
-- DBMS PROJECT - MYSQL
-- ==========================================

CREATE DATABASE IF NOT EXISTS employee_payroll;
USE employee_payroll;
-- REMOVE OLD OBJECTS FOR A CLEAN SETUP

DROP VIEW IF EXISTS Payroll_Report;
DROP TRIGGER IF EXISTS ValidateSalaryPayment;
DROP PROCEDURE IF EXISTS GetMonthlyPayroll;

DROP TABLE IF EXISTS Salary_Payments;
DROP TABLE IF EXISTS Payroll;
DROP TABLE IF EXISTS Attendance;
DROP TABLE IF EXISTS Employees;
DROP TABLE IF EXISTS Departments;

-- CREATE DEPARTMENTS TABLE

CREATE TABLE Departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL UNIQUE,
    location VARCHAR(100)
);

--  CREATE EMPLOYEES TABLE

CREATE TABLE Employees (
    employee_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE,
    hire_date DATE NOT NULL,
    department_id INT,
    basic_salary DECIMAL(12,2) NOT NULL,
    FOREIGN KEY (department_id)
        REFERENCES Departments(department_id),
    CHECK (basic_salary >= 0)
);

--  CREATE ATTENDANCE TABLE

CREATE TABLE Attendance (
    attendance_id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    attendance_date DATE NOT NULL,
    status ENUM('Present','Absent','Leave') NOT NULL,
    FOREIGN KEY (employee_id)
        REFERENCES Employees(employee_id),
    UNIQUE (employee_id, attendance_date)
);

--  CREATE PAYROLL TABLE

CREATE TABLE Payroll (
    payroll_id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    pay_month TINYINT NOT NULL,
    pay_year SMALLINT NOT NULL,
    bonus DECIMAL(12,2) NOT NULL DEFAULT 0,
    deductions DECIMAL(12,2) NOT NULL DEFAULT 0,
    net_salary DECIMAL(12,2) NOT NULL DEFAULT 0,
    payment_status ENUM('Pending','Paid')
        NOT NULL DEFAULT 'Pending',
    FOREIGN KEY (employee_id)
        REFERENCES Employees(employee_id),
    UNIQUE (employee_id, pay_month, pay_year),
    CHECK (pay_month BETWEEN 1 AND 12),
    CHECK (bonus >= 0 AND deductions >= 0),
    CHECK (net_salary >= 0)
);

--  CREATE SALARY PAYMENTS TABLE

CREATE TABLE Salary_Payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    payroll_id INT NOT NULL,
    payment_date DATE NOT NULL,
    amount_paid DECIMAL(12,2) NOT NULL,
    payment_method VARCHAR(30) NOT NULL,
    FOREIGN KEY (payroll_id)
        REFERENCES Payroll(payroll_id),
    CHECK (amount_paid > 0)
);

--  INSERT DEPARTMENTS

INSERT INTO Departments
(department_name, location)
VALUES
('IT', 'Office A'),
('HR', 'Office B'),
('Finance', 'Office C');

--  INSERT EMPLOYEES

INSERT INTO Employees
(first_name, last_name, email, hire_date,
 department_id, basic_salary)
VALUES
('Aarav', 'Shah', 'aarav@example.com',
 '2024-01-15', 1, 40000.00),
('Diya', 'Patel', 'diya@example.com',
 '2023-06-10', 2, 35000.00),
('Rohan', 'Mehta', 'rohan@example.com',
 '2024-03-01', 3, 45000.00);

--  INSERT ATTENDANCE RECORDS

INSERT INTO Attendance
(employee_id, attendance_date, status)
VALUES
(1, '2026-10-01', 'Present'),
(1, '2026-10-02', 'Present'),
(1, '2026-10-03', 'Absent'),
(2, '2026-10-01', 'Present'),
(2, '2026-10-02', 'Absent'),
(3, '2026-10-01', 'Present'),
(3, '2026-10-02', 'Leave');

--  INSERT MONTHLY PAYROLL

INSERT INTO Payroll
(employee_id, pay_month, pay_year, bonus, deductions)
VALUES
(1, 10, 2026, 2000.00, 1000.00),
(2, 10, 2026, 1500.00, 500.00),
(3, 10, 2026, 3000.00, 2000.00);

--  CALCULATE NET SALARY

UPDATE Payroll
SET net_salary = (
    SELECT basic_salary
    FROM Employees
    WHERE Employees.employee_id = Payroll.employee_id
) + bonus - deductions
WHERE payroll_id > 0;


--  CREATE PAYROLL REPORT VIEW

CREATE VIEW Payroll_Report AS
SELECT
    e.employee_id,
    e.first_name,
    e.last_name,
    d.department_name,
    p.pay_month,
    p.pay_year,
    e.basic_salary,
    p.bonus,
    p.deductions,
    p.net_salary,
    p.payment_status
FROM Employees e
JOIN Departments d
    ON e.department_id = d.department_id
JOIN Payroll p
    ON e.employee_id = p.employee_id;

--  CREATE MONTHLY PAYROLL PROCEDURE

DELIMITER //

CREATE PROCEDURE GetMonthlyPayroll(
    IN input_month TINYINT,
    IN input_year SMALLINT
)
BEGIN
    SELECT
        e.employee_id,
        e.first_name,
        e.last_name,
        p.net_salary,
        p.payment_status
    FROM Employees e
    JOIN Payroll p
        ON e.employee_id = p.employee_id
    WHERE p.pay_month = input_month
      AND p.pay_year = input_year;
END //

DELIMITER ;

-- 14. CREATE PAYMENT VALIDATION TRIGGER

DELIMITER //

CREATE TRIGGER ValidateSalaryPayment
BEFORE INSERT ON Salary_Payments
FOR EACH ROW
BEGIN
    DECLARE salary_due DECIMAL(12,2);
    DECLARE already_paid DECIMAL(12,2);

    SELECT net_salary
    INTO salary_due
    FROM Payroll
    WHERE payroll_id = NEW.payroll_id;

    SELECT COALESCE(SUM(amount_paid), 0)
    INTO already_paid
    FROM Salary_Payments
    WHERE payroll_id = NEW.payroll_id;

    IF NEW.amount_paid >
       salary_due - already_paid THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT =
            'Payment exceeds remaining salary due';
    END IF;
END //

DELIMITER ;

-- 15. CREATE INDEX

CREATE INDEX idx_payroll_period
ON Payroll(pay_year, pay_month);

-- 16. RECORD A FULL SALARY PAYMENT

INSERT INTO Salary_Payments
(payroll_id, payment_date, amount_paid, payment_method)
VALUES
(1, '2026-10-31', 41000.00, 'Bank Transfer');

UPDATE Payroll
SET payment_status = 'Paid'
WHERE payroll_id = 1;

-- END OF EMPLOYEE PAYROLL SYSTEM



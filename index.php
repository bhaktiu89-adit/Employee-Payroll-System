<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PayDesk | Employee Payroll System</title>
<style>
:root{--bg:#f4f7fb;--panel:#fff;--ink:#172033;--muted:#748096;--line:#e7ebf2;--primary:#4257d6;--primary2:#eef0ff;--green:#16865b;--red:#c84c58;--amber:#b87913;--nav:#17213c;--shadow:0 8px 28px rgba(25,40,80,.06)}
*{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--ink);font:14px/1.45 Inter,ui-sans-serif,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif}button,input,select{font:inherit}button{cursor:pointer;border:0;border-radius:9px;padding:10px 13px;font-weight:650}.app{display:flex;min-height:100vh}.sidebar{width:245px;background:var(--nav);color:#dbe3f7;padding:24px 16px;display:flex;flex-direction:column;flex-shrink:0}.brand{display:flex;align-items:center;gap:11px;padding:0 9px 30px;font-size:18px;font-weight:800;color:#fff}.brandmark{background:#6878ff;color:white;border-radius:11px;width:36px;height:36px;display:grid;place-items:center;font-size:18px}.navlabel{font-size:10px;text-transform:uppercase;letter-spacing:1.6px;color:#8996b6;padding:8px 12px}.navbtn{display:flex;gap:12px;align-items:center;width:100%;text-align:left;background:transparent;color:#bac6e0;margin:3px 0;padding:12px;border-radius:10px;font-weight:550}.navbtn span:first-child{width:20px;text-align:center;font-size:16px}.navbtn.active,.navbtn:hover{background:#2a365a;color:#fff}.sidebarfoot{margin-top:auto;padding:15px 10px 0;color:#93a0bd;font-size:12px;border-top:1px solid #34405f}.main{flex:1;min-width:0}.topbar{height:76px;background:#fff;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;padding:0 32px;gap:16px}.crumb{color:var(--muted);font-size:12px}.topbar h1{font-size:20px;margin:2px 0 0}.profile{display:flex;align-items:center;gap:10px}.avatar{background:#e9edff;color:#4257d6;width:37px;height:37px;border-radius:50%;display:grid;place-items:center;font-weight:800}.content{padding:28px 32px;max-width:1500px;margin:auto}.pagehead{display:flex;justify-content:space-between;align-items:flex-start;gap:16px;margin-bottom:22px}.pagehead h2{font-size:24px;margin:0 0 5px;letter-spacing:-.5px}.sub{color:var(--muted);margin:0}.primary{background:var(--primary);color:#fff}.secondary{background:#f0f2f8;color:#39435a}.outline{background:#fff;border:1px solid var(--line);color:#3b465d}.danger{background:#fff0f1;color:var(--red)}.stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px;margin-bottom:22px}.stat,.panel{background:var(--panel);border:1px solid var(--line);border-radius:15px;box-shadow:var(--shadow)}.stat{padding:19px}.stat-top{display:flex;justify-content:space-between;align-items:center;color:var(--muted);font-size:12px}.stat-icon{width:36px;height:36px;border-radius:10px;background:var(--primary2);color:var(--primary);display:grid;place-items:center;font-size:17px}.stat strong{display:block;font-size:27px;letter-spacing:-.8px;margin:14px 0 4px}.stat small{color:var(--muted)}.grid2{display:grid;grid-template-columns:1.35fr 1fr;gap:18px}.panel{padding:20px;margin-bottom:18px;min-width:0}.panelhead{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:16px}.panelhead h3{margin:0;font-size:15px}.panelhead p{margin:3px 0 0;color:var(--muted);font-size:12px}.tablewrap{overflow:auto}table{border-collapse:collapse;width:100%;white-space:nowrap}th{text-align:left;color:#7a8599;text-transform:uppercase;letter-spacing:.65px;font-size:10px;font-weight:750;background:#fafbfe}td,th{padding:13px 12px;border-bottom:1px solid #edf0f5}td{font-size:12px}tbody tr:last-child td{border-bottom:0}tbody tr:hover{background:#fafbff}.person{display:flex;align-items:center;gap:10px}.miniavatar{width:32px;height:32px;border-radius:9px;background:#eef0ff;color:#4d5ed2;display:grid;place-items:center;font-weight:800}.person strong{display:block;font-size:12px}.person small{color:var(--muted);font-size:11px}.badge{display:inline-flex;align-items:center;border-radius:20px;padding:5px 9px;font-size:10px;font-weight:750}.paid,.present{background:#e8f7ef;color:#16865b}.pending,.leave{background:#fff4df;color:#a56a0a}.absent{background:#fff0f1;color:#c84c58}.muted{color:var(--muted)}.toolbar{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:16px}.search{min-width:200px;flex:1;position:relative}.search input{width:100%}input,select{border:1px solid #dfe4ed;border-radius:9px;padding:10px 11px;background:#fff;color:var(--ink);outline:none}input:focus,select:focus{border-color:#7b88ed;box-shadow:0 0 0 3px #eef0ff}.toolbar select{min-width:140px}.formgrid{display:grid;grid-template-columns:1fr 1fr;gap:14px}.field{display:flex;flex-direction:column;gap:6px}.field label{font-size:12px;font-weight:700;color:#556177}.field.full{grid-column:1/-1}.modalback{position:fixed;inset:0;background:#10172c80;display:none;align-items:center;justify-content:center;padding:18px;z-index:5}.modalback.open{display:flex}.modal{width:min(570px,100%);background:#fff;border-radius:17px;padding:24px;box-shadow:0 25px 80px #0d163a40;max-height:92vh;overflow:auto}.modalhead{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}.modalhead h3{margin:0;font-size:19px}.xbtn{background:#f2f4f8;color:#647087;padding:7px 10px}.modalactions{display:flex;justify-content:flex-end;gap:9px;margin-top:22px}.empty{text-align:center;padding:32px;color:var(--muted)}.notice{border-radius:10px;background:#f1f4ff;color:#4354b8;padding:12px 14px;font-size:12px;margin-bottom:16px}.quicklist{display:flex;flex-direction:column;gap:14px}.quickrow{display:flex;align-items:center;justify-content:space-between;gap:12px}.quickrow .left{display:flex;gap:10px;align-items:center}.quickrow strong{display:block;font-size:12px}.quickrow small{color:var(--muted)}.amount{font-weight:800}.barrow{margin:15px 0}.barlabel{display:flex;justify-content:space-between;font-size:12px;margin-bottom:7px}.bar{height:8px;border-radius:10px;background:#edf0f7;overflow:hidden}.bar i{display:block;height:100%;background:var(--primary);border-radius:10px}.actions{display:flex;gap:6px}.smallbtn{padding:7px 9px;font-size:11px}.footnote{font-size:11px;color:var(--muted);margin-top:12px}.hidden{display:none!important}.toast{position:fixed;bottom:22px;right:22px;background:#17213c;color:white;padding:12px 17px;border-radius:11px;box-shadow:var(--shadow);display:none;z-index:10}.toast.show{display:block}.mobilemenu{display:none}
@media(max-width:1000px){.sidebar{width:210px}.content{padding:22px}.stats{grid-template-columns:repeat(2,minmax(0,1fr))}.grid2{grid-template-columns:1fr}}
@media(max-width:650px){.sidebar{width:64px;padding:18px 7px}.brand{padding:0 7px 25px}.brandname,.navlabel,.navbtn .navtext,.sidebarfoot{display:none}.navbtn{justify-content:center;padding:12px 6px}.navbtn span:first-child{width:auto}.topbar{padding:0 16px;height:68px}.content{padding:18px 12px}.pagehead{flex-direction:column}.stats{gap:9px}.stat{padding:13px}.stat strong{font-size:22px}.stat-top{font-size:11px}.stat-icon{width:30px;height:30px}.formgrid{grid-template-columns:1fr}.field.full{grid-column:auto}.profile .proftext{display:none}}
</style>
</head>
<body>
<div class="app">
<aside class="sidebar">
  <div class="brand"><div class="brandmark">₱</div><span class="brandname">PayDesk</span></div>
  <div class="navlabel">Workspace</div>
  <button class="navbtn active" data-page="dashboard"><span>▦</span><span class="navtext">Dashboard</span></button>
  <button class="navbtn" data-page="employees"><span>♙</span><span class="navtext">Employees</span></button>
  <button class="navbtn" data-page="departments"><span>▤</span><span class="navtext">Departments</span></button>
  <button class="navbtn" data-page="attendance"><span>◷</span><span class="navtext">Attendance</span></button>
  <button class="navbtn" data-page="payroll"><span>₹</span><span class="navtext">Payroll</span></button>
  <button class="navbtn" data-page="reports"><span>▥</span><span class="navtext">Reports</span></button>
  <div class="sidebarfoot">EMPLOYEE PAYROLL SYSTEM<br><span>Connected to MySQL database</span></div>
</aside>
<main class="main">
  <header class="topbar"><div><div class="crumb">Workspace / <span id="crumb">Dashboard</span></div><h1 id="topTitle">Dashboard</h1></div><div class="profile"><div class="avatar">AD</div><div class="proftext"><strong>Administrator</strong><div class="muted" style="font-size:11px">Payroll manager</div></div></div></header>
  <div class="content">
    <div id="connectionNotice" class="notice hidden" role="alert"></div>
    <section id="page-dashboard" class="page">
      <div class="pagehead"><div><h2>Good day, Administrator 👋</h2><p class="sub">Here's what's happening with your payroll today.</p></div><button class="primary" onclick="openPayrollForm()">＋ Create payroll</button></div>
      <div class="stats">
        <div class="stat"><div class="stat-top">Total employees <span class="stat-icon">♙</span></div><strong id="statEmployees">3</strong><small>Active employee records</small></div>
        <div class="stat"><div class="stat-top">Departments <span class="stat-icon">▤</span></div><strong id="statDepartments">3</strong><small>Organizational units</small></div>
        <div class="stat"><div class="stat-top">October payroll <span class="stat-icon">₹</span></div><strong id="statPayroll">₹1,23,000</strong><small>Total net salary for selected month</small></div>
        <div class="stat"><div class="stat-top">Payments pending <span class="stat-icon">◷</span></div><strong id="statPending">2</strong><small>Payroll records awaiting payment</small></div>
      </div>
      <div class="grid2">
        <div class="panel"><div class="panelhead"><div><h3>Recent payroll</h3><p>Latest salary records</p></div><button class="outline smallbtn" onclick="showPage('payroll')">View all →</button></div><div class="tablewrap"><table><thead><tr><th>Employee</th><th>Net salary</th><th>Status</th></tr></thead><tbody id="recentPayroll"></tbody></table></div></div>
        <div class="panel"><div class="panelhead"><div><h3>Department overview</h3><p>Employees by department</p></div></div><div id="departmentBars"></div></div>
      </div>
      <div class="panel"><div class="panelhead"><div><h3>Quick actions</h3><p>Common payroll tasks</p></div></div><div class="toolbar"><button class="primary" onclick="openEmployeeForm()">＋ Add employee</button><button class="secondary" onclick="showPage('attendance')">＋ Mark attendance</button><button class="secondary" onclick="openPayrollForm()">＋ Add payroll</button><button class="outline" onclick="showPage('reports')">View reports →</button></div><p class="footnote">Demo data is stored in this browser. Use Export CSV in Reports to keep a copy.</p></div>
    </section>
    <section id="page-employees" class="page hidden">
      <div class="pagehead"><div><h2>Employees</h2><p class="sub">Manage employee details and basic salaries.</p></div><button class="primary" onclick="openEmployeeForm()">＋ Add employee</button></div>
      <div class="panel"><div class="toolbar"><div class="search"><input id="employeeSearch" placeholder="Search name or email…" oninput="renderEmployees()"></div><select id="employeeDeptFilter" onchange="renderEmployees()"><option value="">All departments</option></select></div><div class="tablewrap"><table><thead><tr><th>Employee</th><th>Department</th><th>Hire date</th><th>Basic salary</th><th>Actions</th></tr></thead><tbody id="employeesTable"></tbody></table></div></div>
    </section>
    <section id="page-departments" class="page hidden">
      <div class="pagehead"><div><h2>Departments</h2><p class="sub">Organize teams and their locations.</p></div><button class="primary" onclick="openDepartmentForm()">＋ Add department</button></div>
      <div class="panel"><div class="tablewrap"><table><thead><tr><th>Department</th><th>Location</th><th>Employees</th><th>Actions</th></tr></thead><tbody id="departmentsTable"></tbody></table></div></div>
    </section>
    <section id="page-attendance" class="page hidden">
      <div class="pagehead"><div><h2>Attendance</h2><p class="sub">Record daily attendance, absences and leave.</p></div><button class="primary" onclick="openAttendanceForm()">＋ Mark attendance</button></div>
      <div class="panel"><div class="toolbar"><input id="attendanceDateFilter" type="date" onchange="renderAttendance()"><select id="attendanceStatusFilter" onchange="renderAttendance()"><option value="">All statuses</option><option>Present</option><option>Absent</option><option>Leave</option></select></div><div class="tablewrap"><table><thead><tr><th>Date</th><th>Employee</th><th>Department</th><th>Status</th><th>Actions</th></tr></thead><tbody id="attendanceTable"></tbody></table></div></div>
    </section>
    <section id="page-payroll" class="page hidden">
      <div class="pagehead"><div><h2>Payroll</h2><p class="sub">Calculate salary, bonuses, deductions and payment status.</p></div><button class="primary" onclick="openPayrollForm()">＋ Create payroll</button></div>
      <div class="panel"><div class="toolbar"><select id="payrollMonthFilter" onchange="renderPayroll()"><option value="">All months</option></select><select id="payrollYearFilter" onchange="renderPayroll()"><option value="">All years</option><option>2026</option><option>2025</option><option>2024</option></select><select id="payrollStatusFilter" onchange="renderPayroll()"><option value="">All payment statuses</option><option>Pending</option><option>Paid</option></select><button class="outline" onclick="exportPayroll()">Export CSV ↓</button></div><div class="tablewrap"><table><thead><tr><th>Employee</th><th>Period</th><th>Basic salary</th><th>Bonus</th><th>Deductions</th><th>Net salary</th><th>Status</th><th>Actions</th></tr></thead><tbody id="payrollTable"></tbody></table></div><p class="footnote">Net salary = basic salary + bonus − deductions. Each employee can have one payroll record per month.</p></div>
    </section>
    <section id="page-reports" class="page hidden">
      <div class="pagehead"><div><h2>Reports & exports</h2><p class="sub">A quick summary of payroll expenses and records.</p></div><button class="outline" onclick="window.print()">Print report ↗</button></div>
      <div class="stats"><div class="stat"><div class="stat-top">Total payroll records <span class="stat-icon">▥</span></div><strong id="reportCount">3</strong><small>Across all periods</small></div><div class="stat"><div class="stat-top">Paid amount <span class="stat-icon">✓</span></div><strong id="reportPaid">₹41,000</strong><small>Records marked paid</small></div><div class="stat"><div class="stat-top">Pending amount <span class="stat-icon">◷</span></div><strong id="reportPending">₹82,000</strong><small>Awaiting payment</small></div><div class="stat"><div class="stat-top">Attendance entries <span class="stat-icon">◷</span></div><strong id="reportAttendance">7</strong><small>Recorded attendance rows</small></div></div>
      <div class="grid2"><div class="panel"><div class="panelhead"><div><h3>Payroll by month</h3><p>Grouped total net salary</p></div></div><div class="tablewrap"><table><thead><tr><th>Month</th><th>Payroll records</th><th>Total net salary</th></tr></thead><tbody id="monthlyReport"></tbody></table></div></div><div class="panel"><div class="panelhead"><div><h3>Export your data</h3><p>Download CSV files for your project documentation.</p></div></div><div class="quicklist"><div class="quickrow"><div class="left"><div class="stat-icon">♙</div><div><strong>Employees</strong><small>Employee master records</small></div></div><button class="outline smallbtn" onclick="exportTable('employees')">Export CSV</button></div><div class="quickrow"><div class="left"><div class="stat-icon">◷</div><div><strong>Attendance</strong><small>Attendance history</small></div></div><button class="outline smallbtn" onclick="exportTable('attendance')">Export CSV</button></div><div class="quickrow"><div class="left"><div class="stat-icon">₹</div><div><strong>Payroll</strong><small>Monthly salary calculations</small></div></div><button class="outline smallbtn" onclick="exportPayroll()">Export CSV</button></div><div class="quickrow"><div class="left"><div class="stat-icon">▤</div><div><strong>Departments</strong><small>Department list</small></div></div><button class="outline smallbtn" onclick="exportTable('departments')">Export CSV</button></div></div></div></div>
      <div class="notice">This ready-to-open version uses browser storage for demo purposes. It does not connect to your MySQL Workbench database. For a live multi-user system, a server-side backend and database connection are required.</div>
      <button class="danger" onclick="resetDemo()">Reset demo data</button>
    </section>
  </div>
</main>
</div>
<div class="modalback" id="modalback" onclick="if(event.target===this)closeModal()"><div class="modal"><div class="modalhead"><h3 id="modalTitle">Add record</h3><button class="xbtn" onclick="closeModal()">✕</button></div><form id="modalForm" onsubmit="submitModal(event)"><div id="modalFields" class="formgrid"></div><div class="modalactions"><button type="button" class="outline" onclick="closeModal()">Cancel</button><button type="submit" class="primary">Save record</button></div></form></div></div>
<div class="toast" id="toast"></div>
<script>
const initial = {
 departments:[
  {id:1,name:'IT',location:'Office A'},{id:2,name:'HR',location:'Office B'},{id:3,name:'Finance',location:'Office C'}
 ],
 employees:[
  {id:1,first:'Aarav',last:'Shah',email:'aarav@example.com',hire:'2024-01-15',departmentId:1,basic:40000},
  {id:2,first:'Diya',last:'Patel',email:'diya@example.com',hire:'2023-06-10',departmentId:2,basic:35000},
  {id:3,first:'Rohan',last:'Mehta',email:'rohan@example.com',hire:'2024-03-01',departmentId:3,basic:45000}
 ],
 attendance:[
  {id:1,employeeId:1,date:'2026-10-01',status:'Present'},{id:2,employeeId:1,date:'2026-10-02',status:'Present'},{id:3,employeeId:1,date:'2026-10-03',status:'Absent'},
  {id:4,employeeId:2,date:'2026-10-01',status:'Present'},{id:5,employeeId:2,date:'2026-10-02',status:'Absent'},
  {id:6,employeeId:3,date:'2026-10-01',status:'Present'},{id:7,employeeId:3,date:'2026-10-02',status:'Leave'}
 ],
 payroll:[
  {id:1,employeeId:1,month:10,year:2026,bonus:2000,deductions:1000,net:41000,status:'Paid'},
  {id:2,employeeId:2,month:10,year:2026,bonus:1500,deductions:500,net:36000,status:'Pending'},
  {id:3,employeeId:3,month:10,year:2026,bonus:3000,deductions:2000,net:46000,status:'Pending'}
 ]
};
let db=JSON.parse(JSON.stringify(initial));
let modalType='',editId=null;
async function apiRequest(payload=null){
 const options=payload?{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(payload)}:{};
 const response=await fetch('api.php',options);
 const result=await response.json();
 if(!response.ok||!result.success)throw new Error(result.message||'The server could not complete the request.');
 return result;
}
async function loadDatabase(){
 try{const result=await apiRequest();db=result.data;renderAll();document.getElementById('connectionNotice')?.remove();}
 catch(error){const n=document.getElementById('connectionNotice');if(n){n.textContent='Database connection failed: '+error.message+' Check config.php and make sure Apache and your MySQL Server are running.';n.classList.remove('hidden');}console.error(error);}
}
async function save(){
 try{await apiRequest({action:'sync',data:db});renderAll();}
 catch(error){toast('Database save failed: '+error.message);console.error(error);try{await loadDatabase()}catch(e){}}
}
function money(n){return '₹'+Number(n||0).toLocaleString('en-IN',{maximumFractionDigits:2})}
function emp(id){return db.employees.find(x=>x.id===Number(id))}
function dept(id){return db.departments.find(x=>x.id===Number(id))}
function empName(id){let e=emp(id);return e?e.first+' '+e.last:'Deleted employee'}
function deptName(id){let d=dept(id);return d?d.name:'Unassigned'}
function monthName(n){return new Date(2026,Number(n)-1,1).toLocaleString('en',{month:'short'})}
function escapeHtml(s){return String(s??'').replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]))}
function toast(msg){let t=document.getElementById('toast');t.textContent=msg;t.classList.add('show');setTimeout(()=>t.classList.remove('show'),2500)}
function showPage(page){document.querySelectorAll('.page').forEach(x=>x.classList.add('hidden'));document.getElementById('page-'+page).classList.remove('hidden');document.querySelectorAll('.navbtn').forEach(x=>x.classList.toggle('active',x.dataset.page===page));let title=page[0].toUpperCase()+page.slice(1);document.getElementById('topTitle').textContent=title;document.getElementById('crumb').textContent=title;renderAll()}
document.querySelectorAll('.navbtn').forEach(b=>b.addEventListener('click',()=>showPage(b.dataset.page)));
function renderAll(){renderFilters();renderDashboard();renderEmployees();renderDepartments();renderAttendance();renderPayroll();renderReports()}
function renderFilters(){
 let dep=document.getElementById('employeeDeptFilter'),old=dep.value;dep.innerHTML='<option value="">All departments</option>'+db.departments.map(d=>`<option value="${d.id}">${escapeHtml(d.name)}</option>`).join('');dep.value=old;
 let m=document.getElementById('payrollMonthFilter'),om=m.value;m.innerHTML='<option value="">All months</option>'+Array.from({length:12},(_,i)=>`<option value="${i+1}">${new Date(2026,i,1).toLocaleString('en',{month:'long'})}</option>`).join('');m.value=om;
}
function statusBadge(s){let c=s==='Paid'?'paid':s==='Present'?'present':s==='Absent'?'absent':s==='Leave'?'leave':'pending';return `<span class="badge ${c}">${escapeHtml(s)}</span>`}
function renderDashboard(){
 document.getElementById('statEmployees').textContent=db.employees.length;document.getElementById('statDepartments').textContent=db.departments.length;
 let october=db.payroll.filter(p=>p.month===10&&p.year===2026);document.getElementById('statPayroll').textContent=money(october.reduce((s,p)=>s+p.net,0));
 document.getElementById('statPending').textContent=db.payroll.filter(p=>p.status==='Pending').length;
 document.getElementById('recentPayroll').innerHTML=db.payroll.slice().sort((a,b)=>b.year-a.year||b.month-a.month).slice(0,5).map(p=>`<tr><td><div class="person"><div class="miniavatar">${escapeHtml(empName(p.employeeId).split(' ').map(x=>x[0]).join(''))}</div><div><strong>${escapeHtml(empName(p.employeeId))}</strong><small>${monthName(p.month)} ${p.year}</small></div></div></td><td><strong>${money(p.net)}</strong></td><td>${statusBadge(p.status)}</td></tr>`).join('')||'<tr><td colspan="3" class="empty">No payroll records yet</td></tr>';
 let max=Math.max(1,...db.departments.map(d=>db.employees.filter(e=>e.departmentId===d.id).length));
 document.getElementById('departmentBars').innerHTML=db.departments.map(d=>{let n=db.employees.filter(e=>e.departmentId===d.id).length;return `<div class="barrow"><div class="barlabel"><span>${escapeHtml(d.name)}</span><strong>${n} employee${n===1?'':'s'}</strong></div><div class="bar"><i style="width:${n/max*100}%"></i></div></div>`}).join('')||'<p class="empty">No departments yet</p>';
}
function renderEmployees(){
 let q=(document.getElementById('employeeSearch')?.value||'').toLowerCase(),filter=document.getElementById('employeeDeptFilter')?.value||'';
 let list=db.employees.filter(e=>(`${e.first} ${e.last} ${e.email}`.toLowerCase().includes(q))&&(!filter||e.departmentId===Number(filter)));
 document.getElementById('employeesTable').innerHTML=list.map(e=>`<tr><td><div class="person"><div class="miniavatar">${escapeHtml((e.first[0]||'')+(e.last[0]||''))}</div><div><strong>${escapeHtml(e.first+' '+e.last)}</strong><small>${escapeHtml(e.email)}</small></div></div></td><td>${escapeHtml(deptName(e.departmentId))}</td><td>${escapeHtml(e.hire)}</td><td><strong>${money(e.basic)}</strong></td><td><div class="actions"><button class="outline smallbtn" onclick="editEmployee(${e.id})">Edit</button><button class="danger smallbtn" onclick="deleteEmployee(${e.id})">Delete</button></div></td></tr>`).join('')||'<tr><td colspan="5" class="empty">No employees found</td></tr>';
}
function renderDepartments(){document.getElementById('departmentsTable').innerHTML=db.departments.map(d=>`<tr><td><strong>${escapeHtml(d.name)}</strong></td><td>${escapeHtml(d.location||'—')}</td><td>${db.employees.filter(e=>e.departmentId===d.id).length}</td><td><div class="actions"><button class="outline smallbtn" onclick="editDepartment(${d.id})">Edit</button><button class="danger smallbtn" onclick="deleteDepartment(${d.id})">Delete</button></div></td></tr>`).join('')||'<tr><td colspan="4" class="empty">No departments added</td></tr>'}
function renderAttendance(){
 let date=document.getElementById('attendanceDateFilter')?.value||'',st=document.getElementById('attendanceStatusFilter')?.value||'';
 let rows=db.attendance.filter(a=>(!date||a.date===date)&&(!st||a.status===st)).slice().sort((a,b)=>b.date.localeCompare(a.date));
 document.getElementById('attendanceTable').innerHTML=rows.map(a=>`<tr><td>${escapeHtml(a.date)}</td><td><strong>${escapeHtml(empName(a.employeeId))}</strong></td><td>${escapeHtml(deptName(emp(a.employeeId)?.departmentId))}</td><td>${statusBadge(a.status)}</td><td><div class="actions"><button class="outline smallbtn" onclick="editAttendance(${a.id})">Edit</button><button class="danger smallbtn" onclick="deleteRecord('attendance',${a.id})">Delete</button></div></td></tr>`).join('')||'<tr><td colspan="5" class="empty">No attendance records match your filters</td></tr>';
}
function renderPayroll(){
 let m=document.getElementById('payrollMonthFilter')?.value||'',y=document.getElementById('payrollYearFilter')?.value||'',st=document.getElementById('payrollStatusFilter')?.value||'';
 let rows=db.payroll.filter(p=>(!m||p.month===Number(m))&&(!y||p.year===Number(y))&&(!st||p.status===st)).slice().sort((a,b)=>b.year-a.year||b.month-a.month);
 document.getElementById('payrollTable').innerHTML=rows.map(p=>`<tr><td><strong>${escapeHtml(empName(p.employeeId))}</strong></td><td>${monthName(p.month)} ${p.year}</td><td>${money(emp(p.employeeId)?.basic||0)}</td><td>${money(p.bonus)}</td><td>${money(p.deductions)}</td><td><strong>${money(p.net)}</strong></td><td>${statusBadge(p.status)}</td><td><div class="actions"><button class="outline smallbtn" onclick="editPayroll(${p.id})">Edit</button>${p.status==='Pending'?`<button class="primary smallbtn" onclick="markPaid(${p.id})">Mark paid</button>`:''}<button class="danger smallbtn" onclick="deleteRecord('payroll',${p.id})">Delete</button></div></td></tr>`).join('')||'<tr><td colspan="8" class="empty">No payroll records match your filters</td></tr>';
}
function renderReports(){
 document.getElementById('reportCount').textContent=db.payroll.length;document.getElementById('reportPaid').textContent=money(db.payroll.filter(p=>p.status==='Paid').reduce((s,p)=>s+p.net,0));document.getElementById('reportPending').textContent=money(db.payroll.filter(p=>p.status==='Pending').reduce((s,p)=>s+p.net,0));document.getElementById('reportAttendance').textContent=db.attendance.length;
 let groups={};db.payroll.forEach(p=>{let k=`${p.year}-${String(p.month).padStart(2,'0')}`;if(!groups[k])groups[k]={count:0,total:0,month:p.month,year:p.year};groups[k].count++;groups[k].total+=p.net});
 document.getElementById('monthlyReport').innerHTML=Object.values(groups).sort((a,b)=>b.year-a.year||b.month-a.month).map(g=>`<tr><td>${new Date(g.year,g.month-1,1).toLocaleString('en',{month:'long'})} ${g.year}</td><td>${g.count}</td><td><strong>${money(g.total)}</strong></td></tr>`).join('')||'<tr><td colspan="3" class="empty">No payroll data yet</td></tr>';
}
function field(name,label,type='text',value='',opts=null,required=true,full=false){let id='f_'+name;let control=opts?`<select id="${id}" name="${name}" ${required?'required':''}>${opts.map(o=>`<option value="${escapeHtml(o.value)}" ${String(o.value)===String(value)?'selected':''}>${escapeHtml(o.label)}</option>`).join('')}</select>`:`<input id="${id}" name="${name}" type="${type}" value="${escapeHtml(value)}" ${required?'required':''} ${type==='number'?'min="0" step="0.01"':''}>`;return `<div class="field ${full?'full':''}"><label for="${id}">${label}</label>${control}</div>`}
function openModal(type,title,fields,id=null){modalType=type;editId=id;document.getElementById('modalTitle').textContent=title;document.getElementById('modalFields').innerHTML=fields.join('');document.getElementById('modalback').classList.add('open')}
function closeModal(){document.getElementById('modalback').classList.remove('open');document.getElementById('modalForm').reset();editId=null}
function openEmployeeForm(e=null){if(!db.departments.length){toast('Add a department first');return}e=e||{};openModal('employee',e.id?'Edit employee':'Add employee',[field('first','First name','text',e.first||''),field('last','Last name','text',e.last||''),field('email','Email','email',e.email||'',null,true,true),field('hire','Hire date','date',e.hire||'2026-01-01'),field('departmentId','Department','text',e.departmentId||db.departments[0].id,db.departments.map(d=>({value:d.id,label:d.name}))),field('basic','Basic salary (₹)','number',e.basic??0)],e.id||null)}
function editEmployee(id){openEmployeeForm(emp(id))}
function openDepartmentForm(d=null){d=d||{};openModal('department',d.id?'Edit department':'Add department',[field('name','Department name','text',d.name||''),field('location','Location','text',d.location||'',null,false,true)],d.id||null)}
function editDepartment(id){openDepartmentForm(dept(id))}
function openAttendanceForm(a=null){if(!db.employees.length){toast('Add an employee first');return}a=a||{};openModal('attendance',a.id?'Edit attendance':'Mark attendance',[field('employeeId','Employee','text',a.employeeId||db.employees[0].id,db.employees.map(e=>({value:e.id,label:e.first+' '+e.last})),true,true),field('date','Date','date',a.date||'2026-10-01'),field('status','Status','text',a.status||'Present',['Present','Absent','Leave'].map(x=>({value:x,label:x})),true,true)],a.id||null)}
function editAttendance(id){openAttendanceForm(db.attendance.find(a=>a.id===id))}
function openPayrollForm(p=null){if(!db.employees.length){toast('Add an employee first');return}p=p||{};openModal('payroll',p.id?'Edit payroll':'Create payroll',[field('employeeId','Employee','text',p.employeeId||db.employees[0].id,db.employees.map(e=>({value:e.id,label:e.first+' '+e.last})),true,true),field('month','Pay month','text',p.month||10,Array.from({length:12},(_,i)=>({value:i+1,label:new Date(2026,i,1).toLocaleString('en',{month:'long'})}))),field('year','Pay year','number',p.year||2026),field('bonus','Bonus (₹)','number',p.bonus??0),field('deductions','Deductions (₹)','number',p.deductions??0),field('status','Payment status','text',p.status||'Pending',['Pending','Paid'].map(x=>({value:x,label:x})),true,true)],p.id||null)}
function editPayroll(id){openPayrollForm(db.payroll.find(p=>p.id===id))}
function submitModal(ev){
 ev.preventDefault();let data=Object.fromEntries(new FormData(ev.target).entries());
 if(modalType==='employee'){
  data.departmentId=Number(data.departmentId);data.basic=Number(data.basic);
  if(db.employees.some(e=>e.email.toLowerCase()===data.email.toLowerCase()&&e.id!==editId)){toast('That email is already in use');return}
  if(editId)Object.assign(emp(editId),data);else db.employees.push({id:Math.max(0,...db.employees.map(e=>e.id))+1,...data});
 }else if(modalType==='department'){
  if(db.departments.some(d=>d.name.toLowerCase()===data.name.toLowerCase()&&d.id!==editId)){toast('Department name already exists');return}
  if(editId)Object.assign(dept(editId),data);else db.departments.push({id:Math.max(0,...db.departments.map(d=>d.id))+1,...data});
 }else if(modalType==='attendance'){
  data.employeeId=Number(data.employeeId);
  if(db.attendance.some(a=>a.employeeId===data.employeeId&&a.date===data.date&&a.id!==editId)){toast('Attendance already exists for this employee and date');return}
  if(editId)Object.assign(db.attendance.find(a=>a.id===editId),data);else db.attendance.push({id:Math.max(0,...db.attendance.map(a=>a.id))+1,...data});
 }else if(modalType==='payroll'){
  data.employeeId=Number(data.employeeId);data.month=Number(data.month);data.year=Number(data.year);data.bonus=Number(data.bonus);data.deductions=Number(data.deductions);data.status=data.status||'Pending';
  if(db.payroll.some(p=>p.employeeId===data.employeeId&&p.month===data.month&&p.year===data.year&&p.id!==editId)){toast('Payroll already exists for this employee and month');return}
  data.net=Math.max(0,(emp(data.employeeId)?.basic||0)+data.bonus-data.deductions);
  if(editId)Object.assign(db.payroll.find(p=>p.id===editId),data);else db.payroll.push({id:Math.max(0,...db.payroll.map(p=>p.id))+1,...data});
 }
 closeModal();save();toast('Record saved successfully');
}
function deleteEmployee(id){if(db.payroll.some(p=>p.employeeId===id)||db.attendance.some(a=>a.employeeId===id)){toast('Cannot delete: employee has attendance/payroll records');return}if(confirm('Delete this employee?')){db.employees=db.employees.filter(e=>e.id!==id);save();toast('Employee deleted')}}
function deleteDepartment(id){if(db.employees.some(e=>e.departmentId===id)){toast('Move employees to another department first');return}if(confirm('Delete this department?')){db.departments=db.departments.filter(d=>d.id!==id);save();toast('Department deleted')}}
function deleteRecord(type,id){if(confirm('Delete this record?')){db[type]=db[type].filter(x=>x.id!==id);save();toast('Record deleted')}}
function markPaid(id){let p=db.payroll.find(p=>p.id===id);p.status='Paid';save();toast('Payroll marked as paid')}
function resetDemo(){if(confirm('Replace all database records with the original sample records? Any changes will be lost.')){db=JSON.parse(JSON.stringify(initial));save();toast('Demo data reset')}}
function csvDownload(filename,rows){if(!rows.length){toast('No data to export');return}let csv=rows.map(r=>r.map(v=>'"'+String(v??'').replace(/"/g,'""')+'"').join(',')).join('\r\n');let a=document.createElement('a');a.href=URL.createObjectURL(new Blob(['\ufeff'+csv],{type:'text/csv;charset=utf-8;'}));a.download=filename;a.click();URL.revokeObjectURL(a.href)}
function exportTable(type){
 let rows;
 if(type==='employees')rows=[['ID','First name','Last name','Email','Hire date','Department','Basic salary'],...db.employees.map(e=>[e.id,e.first,e.last,e.email,e.hire,deptName(e.departmentId),e.basic])];
 if(type==='departments')rows=[['ID','Department','Location'],...db.departments.map(d=>[d.id,d.name,d.location])];
 if(type==='attendance')rows=[['ID','Employee','Date','Status'],...db.attendance.map(a=>[a.id,empName(a.employeeId),a.date,a.status])];
 csvDownload(type+'.csv',rows)
}
function exportPayroll(){csvDownload('payroll.csv',[['Payroll ID','Employee','Month','Year','Basic salary','Bonus','Deductions','Net salary','Status'],...db.payroll.map(p=>[p.id,empName(p.employeeId),monthName(p.month),p.year,emp(p.employeeId)?.basic||0,p.bonus,p.deductions,p.net,p.status])])}
document.addEventListener('keydown',e=>{if(e.key==='Escape')closeModal()});
loadDatabase();
</script>
</body>
</html>
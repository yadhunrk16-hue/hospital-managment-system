<?php
session_start();

if(!isset($_SESSION['admin_logged_in'])){
header("Location: admin_login.php");
exit();
}

include "db_connect.php";

/* Visitor Statistics */
$total = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS count FROM visitors"));

$today = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS count
FROM visitors
WHERE DATE(visit_date) = CURDATE()
"));

$active = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS count
FROM visitors
WHERE check_out_time IS NULL
"));

/* Patient Statistics */
$patients = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS count
FROM patients
"));

$admitted = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS count
FROM patients
WHERE discharge_date IS NULL
"));

/* Today's Appointments */

$todayAppointments = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS count 
FROM appointments 
WHERE DATE(appointment_date) = CURDATE()
"));

/* Recent Visitors */
$recent_visitors = mysqli_query($conn,"
SELECT visitor_name, phone_number, visit_date
FROM visitors
ORDER BY visit_date DESC
LIMIT 5
");
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="style_backup.css">

<style>

/* PAGE */

body{
margin:0;
font-family:Arial, sans-serif;
background:linear-gradient(135deg,#0f2027,#2c5364);
}

/* SIDEBAR */

.sidebar{
width:220px;
height:100vh;
background:#0f2027;
color:white;
position:fixed;
left:0;
top:0;
padding:20px;
}

.sidebar h2{
margin-top:0;
}

.sidebar a{
display:block;
color:white;
text-decoration:none;
margin:10px 0;
padding:8px;
border-radius:5px;
}

.sidebar a:hover{
background:#2c5364;
}

/* MAIN CONTENT */

.main{
margin-left:220px;
padding:40px;
width:calc(100% - 220px);
box-sizing:border-box;
}

/* HEADER */

.header{
font-size:28px;
color:white;
margin-bottom:30px;
}

/* DASHBOARD CARDS */

.stats{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:25px;
margin-bottom:40px;
}

/* CARD */

.stat-card{
background:white;
padding:30px;
border-radius:12px;
text-align:center;
box-shadow:0 8px 20px rgba(0,0,0,0.25);
transition:0.3s;
}

.stat-card:hover{
transform:translateY(-5px);
}

.stat-card h3{
margin:0;
font-size:18px;
}

.stat-card p{
font-size:28px;
margin-top:10px;
font-weight:bold;
}

/* BUTTONS */

.btn{
display:inline-block;
padding:12px 22px;
background:#00b4d8;
color:white;
text-decoration:none;
border-radius:6px;
margin:10px 10px 0 0;
font-size:15px;
}

.btn:hover{
background:#0077b6;
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>Hospital Admin</h2>

<a href="admin_dashboard.php">Dashboard</a>

<h3>Visitor Management</h3>
<a href="add_visitor.php">Add Visitor</a>
<a href="view_visitors.php">View Visitors</a>

<h3>Patient Management</h3>
<a href="add_patient.php">Add Patient</a>
<a href="view_patients.php">View Patients</a>

<h3>Appointments</h3>
<a href="view_appointments.php">View Appointments</a>

<a href="logout.php">Logout</a>

</div>


<!-- MAIN CONTENT -->

<div class="main">

<div class="header">
Hospital Management Dashboard
</div>

<div class="clock"id="clock"></div>

<!-- STATISTICS -->

<div class="stats">

<div class="stat-card">
<h3>👥 Total Visitors</h3>
<p><?php echo $total['count']; ?></p>
</div>

<div class="stat-card">
<h3>📅 Today Visitors</h3>
<p><?php echo $today['count']; ?></p>
</div>

<div class="stat-card">
<h3>🟢 Active Visitors</h3>
<p><?php echo $active['count']; ?></p>
</div>

<div class="stat-card">
<h3>🏥 Total Patients</h3>
<p><?php echo $patients['count']; ?></p>
</div>

<div class="stat-card">
<h3>🛏️ Admitted Patients</h3>
<p><?php echo $admitted['count']; ?></p>
</div>

<div class="stat-card">
<h3>📋 Today's Appointments</h3>
<p><?php echo $todayAppointments['count']; ?></p>
</div>

</div>


<!-- QUICK ACTION BUTTONS -->

<a href="add_visitor.php" class="btn">➕ Add Visitor</a>

<a href="view_visitors.php" class="btn">📋 View Visitors</a>

<a href="add_patient.php" class="btn">➕ Add Patient</a>

<a href="view_patients.php" class="btn">📋 View Patients</a>
<!-- Recent Visitors Table -->

<div class="recent-box">

<h3>Recent Visitors</h3>

<table>

<tr>
<th>Name</th>
<th>Phone</th>
<th>Date</th>
</tr>

<?php while($row=mysqli_fetch_assoc($recent_visitors)){ ?>

<tr>
<td><?php echo $row['visitor_name']; ?></td>
<td><?php echo $row['phone_number']; ?></td>
<td><?php echo $row['visit_date']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</div>
<script>

function updateClock(){

let now = new Date();

let time = now.toLocaleTimeString();

document.getElementById("clock").innerHTML = "🕒 " + time;

}

setInterval(updateClock,1000);

updateClock();

</script>
</body>
</html>
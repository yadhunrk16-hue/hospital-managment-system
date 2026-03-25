<?php
include "db_connect.php";

$patient_name = $_POST['patient_name'];
$phone = $_POST['phone'];
$doctor = $_POST['doctor'];
$appointment_date = $_POST['appointment_date'];

$status = "Pending";

$sql = "INSERT INTO appointments
(patient_name, phone, doctor, appointment_date, status)
VALUES
('$patient_name','$phone','$doctor','$appointment_date','$status')";

mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Appointment Booked</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#1e88e5,#43a047);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.box{
background:white;
padding:40px;
border-radius:12px;
text-align:center;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

h2{
color:#2e7d32;
margin-bottom:10px;
}

p{
color:#555;
margin-bottom:20px;
}

.btn{
background:#1e88e5;
color:white;
padding:10px 20px;
text-decoration:none;
border-radius:6px;
}

</style>

</head>

<body>

<div class="box">

<h2>✅ Appointment Booked Successfully</h2>

<p>Your appointment request has been sent.</p>

<p><b>Status:</b> Pending Admin Approval</p>

<a class="btn" href="book_appointment.php">Book Another Appointment</a>
<a class="btn back" href="user_panel.php">⬅ Back to User Panel</a>

</div>

</body>
</html>
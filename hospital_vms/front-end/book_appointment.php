<?php
include "db_connect.php";

$selectedDoctor = "";

if(isset($_GET['doctor'])){
    $selectedDoctor = $_GET['doctor'];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Appointment</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:linear-gradient(135deg,#1e88e5,#43a047);
min-height:100vh;
display:flex;
align-items:center;
justify-content:center;
}

.container{
background:white;
padding:30px;
border-radius:15px;
width:350px;
box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

h2{
text-align:center;
margin-bottom:20px;
color:#1e88e5;
}

input, select{
width:100%;
padding:10px;
margin:10px 0;
border-radius:8px;
border:1px solid #ccc;
}

button{
width:100%;
padding:10px;
background:linear-gradient(135deg,#1e88e5,#43a047);
border:none;
border-radius:8px;
color:white;
font-size:15px;
cursor:pointer;
}

button:hover{
opacity:0.9;
}

.back{
display:block;
margin-bottom:15px;
text-decoration:none;
color:#1e88e5;
}

</style>
</head>

<body>

<div class="container">

<a href="user_panel.php" class="back">⬅ Back</a>

<h2>Book Appointment</h2>

<form action="save_appointment.php" method="POST">

<input type="text" name="patient_name" placeholder="Your Name" required>

<input type="text" name="phone" placeholder="Phone Number" required>

<select name="doctor" required>

<option value="">Select Doctor</option>

<option value="DR Arya" <?php if($selectedDoctor=="DR Arya") echo "selected"; ?>>DR Arya</option>

<option value="DR Rahul" <?php if($selectedDoctor=="DR Rahul") echo "selected"; ?>>DR Rahul</option>

<option value="DR Suresh" <?php if($selectedDoctor=="DR Suresh") echo "selected"; ?>>DR Suresh</option>

<option value="DR Rhea" <?php if($selectedDoctor=="DR Rhea") echo "selected"; ?>>DR Rhea</option>

</select>

<input type="date" name="appointment_date" required>

<button type="submit">Book Appointment</button>

</form>

</div>

</body>
</html>


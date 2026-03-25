<?php
include "db_connect.php";
$result = mysqli_query($conn,"SELECT * FROM doctors");
?>

<!DOCTYPE html>
<html>
<head>

<title>Hospital Information</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f4f7fb;
}

/* Header Banner */

.banner{
background:linear-gradient(135deg,#1e88e5,#43a047);
color:white;
padding:80px 20px;
text-align:center;
}

.banner h1{
font-size:40px;
margin-bottom:10px;
}

.banner p{
font-size:18px;
opacity:0.9;
}

/* Container */

.container{
max-width:1100px;
margin:auto;
padding:40px 20px;
}

/* Section */

.section{
margin-bottom:50px;
}

.section h2{
color:#1e88e5;
margin-bottom:20px;
}

/* Grid */

.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
}

/* Cards */

.card{
background:white;
padding:20px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
transition:0.3s;
}

.card:hover{
transform:translateY(-5px);
}

/* Doctor card */

.doctor-card{
text-align:center;
}

.doctor-img{
width:80px;
height:80px;
border-radius:50%;
object-fit:cover;
margin-bottom:10px;
border:3px solid #1e88e5;
}

/* Emergency */

.emergency{
background:#e53935;
color:white;
padding:25px;
border-radius:12px;
text-align:center;
font-size:18px;
}

/* Contact */

.contact p{
margin:8px 0;
}

/* Back Button */

.back{
position:fixed;
top:20px;
left:20px;
background:#1e88e5;
color:white;
padding:8px 14px;
border-radius:8px;
text-decoration:none;
}

</style>

</head>

<body>

<a href="user_panel.php" class="back">⬅ Back</a>

<div class="banner">

<h1>🏥 CityCare Hospital</h1>
<p>Advanced Healthcare with Trusted Doctors</p>

</div>

<div class="container">

<!-- ABOUT -->

<div class="section">

<h2>About Our Hospital</h2>

<p>
CityCare Hospital provides modern healthcare services with experienced doctors and advanced medical technology.
Our mission is to deliver high-quality treatment and compassionate patient care.
</p>

</div>


<!-- DEPARTMENTS -->

<div class="section">

<h2>Departments</h2>

<div class="grid">

<div class="card">Cardiology</div>
<div class="card">Neurology</div>
<div class="card">Orthopedics</div>
<div class="card">Pediatrics</div>
<div class="card">General Medicine</div>
<div class="card">Emergency Care</div>

</div>

</div>


<!-- FACILITIES -->

<div class="section">

<h2>Facilities</h2>

<div class="grid">

<div class="card">24/7 Emergency</div>
<div class="card">Ambulance Service</div>
<div class="card">Modern ICU</div>
<div class="card">Advanced Laboratory</div>
<div class="card">Pharmacy</div>
<div class="card">Operation Theatre</div>

</div>

</div>


<!-- DOCTORS -->

<div class="section">

<h2>Our Doctors</h2>

<div class="grid">

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<div class="card doctor-card">

<img src="/hospital_vms/images/<?php echo $row['photo']; ?>" class="doctor-img">

<h3><?php echo $row['doctor_name']; ?></h3>

<p><?php echo $row['specialization']; ?></p>

</div>

<?php } ?>

</div>

</div>


<!-- EMERGENCY -->

<div class="section">

<div class="emergency">

🚑 Emergency Ambulance Service  
<br><br>
Call Immediately: <b>108</b>

</div>

</div>


<!-- CONTACT -->

<div class="section contact">

<h2>Contact Us</h2>

<p><b>Hospital Phone:</b> +91 9876543210</p>
<p><b>Email:</b> citycarehospital@email.com</p>
<p><b>Address:</b> Thottada, Kannur, Kerala, India</p>

</div>


<!-- GOOGLE MAP -->

<div class="section">

<h2>Our Location</h2>

<iframe
width="100%"
height="300"
style="border:0;border-radius:12px"
loading="lazy"
allowfullscreen
src="https://maps.google.com/maps?q=kannur%20hospital&t=&z=13&ie=UTF8&iwloc=&output=embed">
</iframe>

</div>


</div>

</body>
</html>


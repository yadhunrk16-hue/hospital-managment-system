<?php
include "db_connect.php";
$result = mysqli_query($conn,"SELECT * FROM doctors");
?>

<!DOCTYPE html>
<html>
<head>
<title>Our Doctors</title>
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
padding:40px;
}

/* Title */

h2{
text-align:center;
color:white;
margin-bottom:40px;
}

/* Grid */

.container{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
gap:30px;
}

/* Doctor Card */

.card{
background:white;
border-radius:20px;
padding:25px;
text-align:center;
box-shadow:0 15px 30px rgba(0,0,0,0.2);
transition:0.3s;
}

.card:hover{
transform:translateY(-6px);
}

/* Doctor Image */

.doctor-img{
width:90px;
height:90px;
border-radius:50%;
object-fit:cover;
margin:0 auto 15px auto;
display:block;
border:3px solid #1e88e5;
}

/* Doctor name */

.card h3{
color:#1e88e5;
margin-bottom:10px;
}

/* Info */

.info{
text-align:left;
margin-top:10px;
}

.info p{
margin:6px 0;
color:#444;
font-size:14px;
}

/* Back button */

.back{
display:inline-block;
margin-bottom:30px;
background:white;
color:#1e88e5;
padding:8px 16px;
border-radius:8px;
text-decoration:none;
font-weight:500;
}

/* Book button */

.book-btn{
display:inline-block;
margin-top:15px;
background:linear-gradient(135deg,#1e88e5,#43a047);
color:white;
padding:10px 18px;
border-radius:8px;
text-decoration:none;
font-size:14px;
transition:0.3s;
}

.book-btn:hover{
transform:scale(1.05);
box-shadow:0 8px 20px rgba(0,0,0,0.3);
}

</style>
</head>

<body>

<a href="user_panel.php" class="back">⬅ Back</a>

<h2>👨‍⚕️ Our Doctors</h2>

<div class="container">

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<div class="card">

<img src="/hospital_vms/images/<?php echo $row['photo']; ?>" class="doctor-img">

<h3><?php echo $row['doctor_name']; ?></h3>

<div class="info">

<p><b>Specialization:</b> <?php echo $row['specialization']; ?></p>

<p><b>Degree:</b> <?php echo $row['degree']; ?></p>

<p><b>Experience:</b> <?php echo $row['experience']; ?></p>

<p><b>Room Number:</b> <?php echo $row['room_number']; ?></p>

<p><b>Timings:</b> <?php echo $row['timing']; ?></p>

<p><b>Phone:</b> <?php echo $row['phone_number']; ?></p>

</div>

<a href="book_appointment.php?doctor=<?php echo urlencode($row['doctor_name']); ?>" class="book-btn">
Book Appointment
</a>

</div>

<?php } ?>

</div>

</body>
</html>


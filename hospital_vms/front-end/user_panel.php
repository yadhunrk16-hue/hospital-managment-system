<!DOCTYPE html>
<html>
<head>
<title>User Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

/* ONLY USER PANEL PAGE STYLE */
.user-panel-page{

height:100vh;

display:flex;
justify-content:center;
align-items:center;

background-image:
linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url("/hospital_vms/images/hospital_bg.jpeg");

background-size:cover;
background-position:center;
background-repeat:no-repeat;

}

/* GLASS PANEL */

.panel{

width:380px;

padding:40px;

border-radius:20px;

background:rgba(255,255,255,0.15);

backdrop-filter:blur(15px);
-webkit-backdrop-filter:blur(15px);

border:1px solid rgba(255,255,255,0.25);

box-shadow:0 20px 40px rgba(0,0,0,0.3);

text-align:center;

animation:fadeIn 0.8s ease;

}

/* Avatar */

.avatar{
font-size:50px;
margin-bottom:25px;
color:white;
}

/* Buttons */

.btn{

display:block;

width:100%;

padding:14px;

margin:12px 0;

border-radius:10px;

text-decoration:none;

font-size:15px;

font-weight:500;

color:white;

transition:0.25s;

}

/* Button Colors */

.book{
background:linear-gradient(45deg,#42a5f5,#1e88e5);
}

.doctors{
background:linear-gradient(45deg,#66bb6a,#43a047);
}

.info{
background:linear-gradient(45deg,#ffb74d,#fb8c00);
}

.home{
background:linear-gradient(45deg,#26c6da,#00838f);
}

/* Hover */

.btn:hover{

transform:translateY(-3px);

box-shadow:0 10px 20px rgba(0,0,0,0.2);

}

/* Animation */

@keyframes fadeIn{

from{
opacity:0;
transform:translateY(20px);
}

to{
opacity:1;
transform:translateY(0);
}

}

</style>
</head>

<body class="user-panel-page">

<div class="panel">

<div class="avatar">👤</div>

<a href="book_appointment.php" class="btn book">📅 Book Appointment</a>

<a href="view_doctors.php" class="btn doctors">👨‍⚕️ View Doctors</a>

<a href="hospital_info.php" class="btn info">🏥 Hospital Info</a>

<a href="index.php" class="btn home">⬅ Back to Home</a>

</div>

</body>
</html>
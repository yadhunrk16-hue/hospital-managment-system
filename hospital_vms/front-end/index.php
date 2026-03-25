<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Hospital Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
min-height:100vh;
background:
linear-gradient(rgba(30,136,229,0.75), rgba(67,160,71,0.75)),
url("https://images.unsplash.com/photo-1586773860418-d37222d8fce3");
background-size:cover;
background-position:center;
}

/* HEADER */

header{
padding:20px 50px;
display:flex;
justify-content:space-between;
align-items:center;
color:#fff;
}

header h1{
font-size:24px;
}

/* HERO */

.hero{
display:flex;
justify-content:center;
align-items:center;
padding:80px 20px;
}

.hero-box{
background:rgba(255,255,255,0.95);
max-width:700px;
padding:45px;
border-radius:20px;
text-align:center;
box-shadow:0 20px 40px rgba(0,0,0,0.25);
}

.hero-box h2{
color:#0d47a1;
margin-bottom:15px;
}

.hero-box p{
color:#555;
font-size:15px;
margin-bottom:30px;
}

/* BUTTONS */

.btn{
display:inline-block;
padding:12px 28px;
border-radius:10px;
text-decoration:none;
font-weight:500;
margin:8px;
color:#fff;
}

.user-btn{
background:linear-gradient(135deg,#1e88e5,#42a5f5);
}

.admin-btn{
background:linear-gradient(135deg,#43a047,#2e7d32);
}

/* INFO SECTION */

.info{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:25px;
padding:40px 50px;
}

.card{
background:rgba(255,255,255,0.95);
padding:25px;
border-radius:18px;
text-align:center;
box-shadow:0 15px 30px rgba(0,0,0,0.2);
}

.card i{
font-size:30px;
color:#1e88e5;
margin-bottom:10px;
}

.card h3{
color:#0d47a1;
margin-bottom:8px;
}

.card p{
font-size:14px;
color:#555;
}

/* FOOTER */

footer{
text-align:center;
padding:15px;
color:#fff;
font-size:13px;
}

</style>
</head>

<body>

<header>
<h1><i class="fa-solid fa-hospital"></i> City Care Hospital</h1>
</header>

<section class="hero">

<div class="hero-box">

<h2>Hospital Management System</h2>

<p>
A smart system to manage hospital visitors, patients,
and doctor appointments efficiently and securely.
</p>

<a href="user_panel.php" class="btn user-btn">
👤 User Panel
</a>

<a href="admin_login.php" class="btn admin-btn">
🔐 Admin Panel
</a>

</div>

</section>

<section class="info">

<div class="card">
<i class="fa-solid fa-clock"></i>
<h3>Visiting Hours</h3>
<p>Mon–Fri: 9 AM – 8 PM<br>Sunday: Emergency Only</p>
</div>

<div class="card">
<i class="fa-solid fa-user-doctor"></i>
<h3>Qualified Doctors</h3>
<p>Experienced doctors and nurses available 24/7.</p>
</div>

<div class="card">
<i class="fa-solid fa-phone"></i>
<h3>Emergency Contact</h3>
<p>+91 98765 43210</p>
</div>

</section>

<footer>
© 2026 City Care Hospital | Hospital Management System
</footer>

</body>
</html>
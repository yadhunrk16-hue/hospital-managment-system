<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

$username = $_POST['username'];
$password = $_POST['password'];

$admin_user = "admin";
$admin_pass = "Admin@123";

if($username == $admin_user && $password == $admin_pass){

$_SESSION['admin_logged_in'] = true;
header("Location: admin_dashboard.php");
exit();

}else{
$error = "Invalid Login Credentials";
}

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Hospital Admin Login</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI;
}

body{

height:100vh;
display:flex;
justify-content:center;
align-items:center;

background:
linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url("https://images.unsplash.com/photo-1586773860418-d37222d8fce3");

background-size:cover;
background-position:center;

}

/* Glass Login Box */

.login-box{

width:350px;
padding:40px;

background:rgba(255,255,255,0.1);
backdrop-filter:blur(15px);

border-radius:15px;

box-shadow:0 10px 40px rgba(0,0,0,0.5);

text-align:center;
color:white;

}

.login-box h1{
margin-bottom:25px;
font-weight:600;
}

/* Inputs */

.input-box{
margin-bottom:20px;
}

.input-box input{

width:100%;
padding:12px;

border:none;
outline:none;

border-radius:8px;

background:rgba(255,255,255,0.2);
color:white;

font-size:15px;

}

.input-box input::placeholder{
color:#ddd;
}

/* Login Button */

.login-btn{

width:100%;
padding:12px;

border:none;
border-radius:8px;

background:linear-gradient(45deg,#00c6ff,#0072ff);

color:white;
font-size:16px;

cursor:pointer;

transition:0.3s;

}

.login-btn:hover{

transform:scale(1.05);
box-shadow:0 5px 20px rgba(0,0,0,0.5);

}

/* Back Button */

.back-btn{

display:block;
margin-top:15px;

text-decoration:none;
text-align:center;

padding:10px;

border-radius:8px;

background:rgba(255,255,255,0.2);
color:white;

transition:0.3s;

}

.back-btn:hover{

background:rgba(255,255,255,0.35);

}

/* Error */

.error{
color:#ff8080;
margin-bottom:15px;
}

/* Footer */

.footer{

margin-top:20px;
font-size:13px;
color:#ddd;

}

</style>

</head>

<body>

<div class="login-box">

<h1>🏥 Admin Login</h1>

<?php
if(isset($_GET['error'])){
echo "<div class='error'>
❌ Invalid Username or Password
</div>";
}
?>
<form method="POST" action="admin_login_backend.php">
    
<div class="input-box">
<input type="text" name="username" placeholder="Username" required>
</div>

<div class="input-box">
<input type="password" name="password" placeholder="Password" required>
</div>

<button class="login-btn">Login</button>

<a href="index.php" class="back-btn">⬅ Back to Home</a>

</form>

<div class="footer">
Hospital Visitor Management System
</div>

</div>

</body>
</html>
```

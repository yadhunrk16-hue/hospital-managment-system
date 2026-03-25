<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$admin_user = "admin";
$admin_pass = "Admin@123";

if($username == $admin_user && $password == $admin_pass){

$_SESSION['admin_logged_in'] = true;

header("Location: admin_dashboard.php");
exit();

}else{

echo "<h2>Invalid Login</h2>";
echo "<a href='admin_login.php'>Try Again</a>";

}

?>
<?php

session_start();
include "db_connect.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$username=$_POST['username'];
$password=$_POST['password'];

$query="SELECT * FROM admin 
WHERE username='$username' 
AND password='$password'";

$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){

$_SESSION['admin_logged_in']=true;

header("Location: admin_dashboard.php");
exit();

}else{

// Send error back to login page
header("Location: admin_login.php?error=1");
exit();

}

}

?>
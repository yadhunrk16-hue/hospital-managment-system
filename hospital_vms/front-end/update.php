<?php
include "db_connect.php";

$id=$_POST['id'];
$name=$_POST['visitor_name'];
$phone=$_POST['phone_number'];

mysqli_query($conn,
"UPDATE visitors SET visitor_name='$name', phone_number='$phone' WHERE id=$id");

header("Location:view_visitors.php");
?>
<?php
include "db_connect.php";

$id = $_GET['id'];

$sql = "UPDATE visitors 
SET check_out_time = NOW() 
WHERE id = $id";

mysqli_query($conn,$sql);

header("Location: view_visitors.php");
?>
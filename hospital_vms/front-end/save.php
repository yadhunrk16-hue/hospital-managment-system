<?php
include "db_connect.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$visitor_name = $_POST['visitor_name'];
$phone_number = $_POST['phone_number'];
$whom_to_meet = $_POST['whom_to_meet'];
$purpose_of_visit = $_POST['purpose_of_visit'];

/* Optional patient */

if(isset($_POST['patient_id']) && $_POST['patient_id']!=""){
$patient_id = $_POST['patient_id'];
}
else{
$patient_id = "NULL";
}

/* CHECK DUPLICATE PHONE */

$check = mysqli_query($conn,
"SELECT * FROM visitors 
WHERE phone_number='$phone_number'");

if(mysqli_num_rows($check) > 0){

header("Location: add_visitor.php?error=phone_exists");
exit();

}

/* Insert visitor */

$sql = "INSERT INTO visitors
(visitor_name, phone_number, purpose_of_visit, whom_to_meet, visit_date, patient_id)

VALUES
('$visitor_name',
'$phone_number',
'$purpose_of_visit',
'$whom_to_meet',
CURDATE(),
$patient_id)";

mysqli_query($conn,$sql);

/* Redirect */

header("Location: view_visitors.php");
exit();

}
?>
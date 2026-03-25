<?php
include "db_connect.php";

$id = $_GET['id'];

/* Get appointment data */
$result = mysqli_query($conn,"SELECT * FROM appointments WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

$patient_name = $row['patient_name'];
$phone = $row['phone'];
$doctor = $row['doctor'];

/* Insert into patients table */
mysqli_query($conn,"
INSERT INTO patients
(patient_name, phone_number, disease, doctor_id, admission_date)
VALUES
('$patient_name','$phone','Not Diagnosed','1',CURDATE())
");

/* Redirect */
header("Location: view_patients.php");
exit();
?>
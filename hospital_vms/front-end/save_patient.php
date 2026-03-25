<?php

include "db_connect.php";

/* Get Form Data */

$patient_name = $_POST['patient_name'];

$phone_number = $_POST['phone_number'];

$room_number = $_POST['room_number'];   // NEW FIELD

$disease = $_POST['disease'];

$doctor_id = $_POST['doctor_id'];

$admission_date = $_POST['admission_date'];


/* Insert Data Into Database */

$sql = "INSERT INTO patients
(patient_name, phone_number, room_number, disease, doctor_id, admission_date)
VALUES
('$patient_name', '$phone_number', '$room_number', '$disease', '$doctor_id', '$admission_date')";


mysqli_query($conn, $sql);


/* Redirect After Save */

header("Location: view_patients.php");

exit();

?>
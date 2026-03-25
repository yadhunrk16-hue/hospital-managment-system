<?php include "db_connect.php"; ?>

<?php
/* Fetch Patients */
$patient_query = mysqli_query($conn,"
SELECT id, patient_name, room_number
FROM patients
WHERE discharge_date IS NULL
");
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Visitor</title>
<link rel="stylesheet" href="style_backup.css">


<style>

/* FIX BACK BUTTON SIZE */

.back-btn{
width:auto !important;
display:inline-block !important;
padding:8px 16px !important;
margin-bottom:15px !important;
}

</style>

</head>

<body class="add-visitor-page">

<!-- SIDEBAR -->
<div class="sidebar">

<h2>Hospital Admin</h2>

<a href="admin_dashboard.php">Dashboard</a>

<h3>Visitor Management</h3>
<a href="add_visitor.php">Add Visitor</a>
<a href="view_visitors.php">View Visitors</a>

<h3>Patient Management</h3>
<a href="add_patient.php">Add Patient</a>
<a href="view_patients.php">View Patients</a>

<h3>Appointments</h3>
<a href="view_appointments.php">View Appointments</a>

<a href="logout.php">Logout</a>

</div>


<!-- MAIN CONTENT -->
<div class="main">

<div class="center-wrapper">

<div class="form-container">

<div class="header">Add New Visitor</div>

<button class="btn back-btn" onclick="history.back()">← Back</button>

<?php
if(isset($_GET['error']) && $_GET['error']=="phone_exists"){
?>
<div class="error-message">
⚠ Phone number already exists!
</div>
<?php
}
?>

<?php
if(isset($_GET['success'])){
echo "<script>alert('Visitor Added Successfully');</script>";
}
?>

<form action="save.php" method="POST" onsubmit="return confirmAddVisitor()">

<!-- Visitor Name -->
<input type="text"
name="visitor_name"
placeholder="Visitor Name"
pattern="[A-Za-z ]+"
title="Enter characters only (no numbers)"
required>

<!-- Phone -->
<input type="text"
name="phone_number"
placeholder="Phone Number"
pattern="[0-9]{10}"
title="Enter numbers only (10 digits)"
maxlength="10"
required>

<!-- Doctor -->
<select name="whom_to_meet">

<option value="">Select Doctor(Optional)</option>

<?php
$query = "SELECT doctor_name FROM doctors";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) {
?>

<option value="<?php echo $row['doctor_name']; ?>">
<?php echo $row['doctor_name']; ?>
</option>

<?php } ?>

</select>


<!-- Select Patient -->
<select name="patient_id">

<option value="">Select Patient(Optional)</option>

<?php
while($row = mysqli_fetch_assoc($patient_query)){
?>

<option value="<?php echo $row['id']; ?>">

<?php 
echo $row['patient_name']; 
echo " — Room ";
echo $row['room_number'];
?>

</option>

<?php } ?>

</select>


<!-- Purpose -->
<textarea
name="purpose_of_visit"
placeholder="Purpose of Visit"
required></textarea>


<button type="submit" class="btn">
Save Visitor
</button>

</form>

</div>  <!-- form-container -->

</div>  <!-- center-wrapper -->

</div>  <!-- main -->

<script>

function confirmAddVisitor(){
return confirm("Are you sure you want to add this visitor?");
}

</script>

</body>

</html>
<?php include "db_connect.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Add Patient</title>
<link rel="stylesheet" href="style_backup.css">
</head>

<body class="add-patient-page">

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

<div class="header from-title">Add Patient</div>


<form action="save_patient.php" method="POST">

<!-- Patient Name -->
<input type="text"
name="patient_name"
placeholder="Patient Name"
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
<!-- Room Number -->

<input type="text"
name="room_number"
placeholder="Room Number (Example: 101)"
required>

<!-- Disease -->
<input type="text"
name="disease"
placeholder="Disease"
pattern="[A-Za-z ]+"
title="Enter characters only"
required>

<!-- Doctor -->
<select name="doctor_id" required>

<option value="">Select Doctor</option>

<?php
$query = "SELECT id,doctor_name FROM doctors";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result)){
?>

<option value="<?php echo $row['id']; ?>">
<?php echo $row['doctor_name']; ?>
</option>

<?php } ?>

</select>

<!-- Admission Date -->
<input type="date" name="admission_date" required>

<button type="submit" class="btn">Add Patient</button>

</form>
</div>  <!-- form-container -->

</div>  <!-- center-wrapper -->

</div>  <!-- main -->
</body>
</html>

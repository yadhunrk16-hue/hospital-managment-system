```php
<?php
include "db_connect.php";

$query = "SELECT patients.*, doctors.doctor_name
FROM patients
LEFT JOIN doctors
ON patients.doctor_id = doctors.id";

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Patient List</title>
<link rel="stylesheet" href="style_backup.css">
</head>

<body>

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

<div class="header">Patient List</div>

<a href="admin_dashboard.php" class="btn">⬅ Back to Dashboard</a>

<br><br>

<table>

<tr>
<th>ID</th>
<th>Patient Name</th>
<th>Phone</th>
<th>Room</th>
<th>Disease</th>
<th>Doctor</th>
<th>Admission Date</th>
<th>Discharge</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['patient_name']; ?></td>
<td><?php echo $row['phone_number']; ?></td>
<td><?php echo $row['room_number']; ?></td>
<td><?php echo $row['disease']; ?></td>
<td><?php echo $row['doctor_name']; ?></td>
<td><?php echo $row['admission_date']; ?></td>

<td>
<a class="btn" href="discharge_patient.php?id=<?php echo $row['id']; ?>">
Discharge
</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
```

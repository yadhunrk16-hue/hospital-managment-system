<?php
include "db_connect.php";

$result = mysqli_query($conn,"SELECT * FROM appointments");
?>

<!DOCTYPE html>
<html>
<head>
<title>Appointments</title>
<link rel="stylesheet" href="style_backup.css">
</head>

<body>

<div class="main-container">

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

<div class="header">Appointments</div>

<a href="admin_dashboard.php" class="btn">⬅ Back to Dashboard</a>

<br><br>

<!-- TABLE BOX START -->
<div class="table-box">

<table>

<tr>
<th>ID</th>
<th>Patient Name</th>
<th>Phone</th>
<th>Doctor</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['patient_name']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['doctor']; ?></td>
<td><?php echo $row['appointment_date']; ?></td>

<td>

<?php
$status = $row['status'];

if($status == "Pending"){
echo "<span style='color:#f9a825;font-weight:bold;'>Pending</span>";
}
elseif($status == "Approved"){
echo "<span style='color:#43a047;font-weight:bold;'>Approved</span>";
}
else{
echo "<span style='color:#e53935;font-weight:bold;'>Cancelled</span>";
}
?>

</td>

<td>

<a class="btn" style="background:#4caf50;" href="approve_appointment.php?id=<?php echo $row['id']; ?>">
Approve
</a>

<a class="btn" style="background:#e53935;" href="cancel_appointment.php?id=<?php echo $row['id']; ?>">
Cancel
</a>

<a class="btn" style="background:#1e88e5;" href="admit_from_appointment.php?id=<?php echo $row['id']; ?>">
Admit
</a>

</td>

</tr>

<?php } ?>

</table>

</div>
<!-- TABLE BOX END -->

</div>

</div>

</body>
</html>
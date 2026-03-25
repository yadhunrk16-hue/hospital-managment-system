<?php
include "db_connect.php";

/* FIXED QUERY WITH PATIENT JOIN */
$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$query = "
SELECT visitors.*, 
patients.patient_name, 
patients.room_number
FROM visitors
LEFT JOIN patients 
ON visitors.patient_id = patients.id
WHERE 
visitors.visitor_name LIKE '%$search%'
OR visitors.phone_number LIKE '%$search%'
OR visitors.whom_to_meet LIKE '%$search%'
OR patients.patient_name LIKE '%$search%'";


$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Visitor List</title>
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

<a href="logout.php">Logout</a>

</div>

<div class="main">

<div class="header">
Visitor List
</div>

<a href="admin_dashboard.php" class="btn">← Back to Dashboard</a>

<br><br>
<br>

<form method="GET">

<input type="text" 
name="search" 
placeholder="Search by name or phone"
style="padding:8px; width:250px;">

<button type="submit" class="btn">
Search
</button>

</form>

<br>

<div class="table-box">

<table>

<tr>
<th>ID</th>
<th>Visitor Name</th>
<th>Phone Number</th>
<th>Whom To Meet</th>
<th>Purpose</th>
<th>Visit Date</th>
<th>check-in</th>
<th>check-out</th>
<th>Duration</th>
<th>Check</th>
<th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)) {
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td class="visitor-name">
<?php echo $row['visitor_name']; ?>
</td>

<td><?php echo $row['phone_number']; ?></td>

<td>
<?php
/* SHOW PATIENT ROOM IF EXISTS */
if(!empty($row['patient_name'])){
    echo $row['patient_name'] . " — Room " . $row['room_number'];
}
else{
    echo $row['whom_to_meet'];
}
?>
</td>

<td><?php echo $row['purpose_of_visit']; ?></td>
<td><?php echo $row['visit_date']; ?></td>

<!-- Check-In -->
<td>
<?php
echo date("h:i A", strtotime($row['check_in_time']));
?>
</td>

<!-- Check-Out TIME -->
<td>
<?php
if($row['check_out_time'] != NULL){
    echo date("h:i A", strtotime($row['check_out_time']));
}
else{
    echo "Still Inside";
}
?>
</td>
<td>
<?php
if($row['check_out_time'] != NULL){

$checkin = strtotime($row['check_in_time']);
$checkout = strtotime($row['check_out_time']);

$diff = $checkout - $checkin;
$days = floor($diff / 86400);
$hours = floor(($diff % 86400) / 3600);
$minutes = floor(($diff % 3600) / 60);

if($days > 0){
    echo $days . " day ";
}

if($hours > 0){
    echo $hours . " hour ";
}

if($minutes > 0){
    echo $minutes . " minute";
}

}
else{

echo "Still Visiting";

}
?>
</td>

<!-- Checkout BUTTON -->
<td>
<?php
if($row['check_out_time'] == NULL){
?>
<a class="btn btn-checkout" href="checkout.php?id=<?php echo $row['id']; ?>">
Checkout
</a>

<?php
}else{
echo "Checked Out";
}
?>
</td>

<td>

<a class="btn" href="edit_visitor.php?id=<?php echo $row['id']; ?>">
Edit
</a>
<a class="btn btn-delete" href="delete.php?id=<?php echo $row['id']; ?>">
Delete

</a>

</td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>
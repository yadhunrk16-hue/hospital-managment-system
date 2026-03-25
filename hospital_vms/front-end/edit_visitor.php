<?php
include "db_connect.php";
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM visitors WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<html>
<head>
<title>Edit Visitor</title>
<link rel="stylesheet" href="style.css">
</head>

<body class="view-page">

<h2>Edit Visitor</h2>

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<label>Visitor Name</label><br>
<input type="text" name="visitor_name" value="<?php echo $row['visitor_name']; ?>"><br><br>

<label>Phone Number</label><br>
<input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>"><br><br>

<button type="submit">Update</button>

</form>

</body>
</html>
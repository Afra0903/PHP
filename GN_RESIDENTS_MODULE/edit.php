<?php
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query($mysqli,
"SELECT * FROM residents WHERE id=$id");

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Resident</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Edit Resident</h2>

<form method="POST" action="update.php">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<div class="mb-3">
<label>Full Name</label>

<input type="text"
name="full_name"
class="form-control"
value="<?php echo $row['full_name']; ?>">
</div>

<div class="mb-3">
<label>Address</label>

<input type="text"
name="address"
class="form-control"
value="<?php echo $row['address']; ?>">
</div>

<div class="mb-3">
<label>Phone</label>

<input type="text"
name="phone"
class="form-control"
value="<?php echo $row['phone']; ?>">
</div>

<button class="btn btn-primary">
Update Resident
</button>

</form>

</div>
</body>
</html>
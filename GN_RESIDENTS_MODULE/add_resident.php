<?php
include 'db.php';

$message = "";

if(isset($_POST['submit'])){

    $full_name = trim($_POST['full_name']);
    $dob = $_POST['dob'];
    $nic = trim($_POST['nic']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $occupation = trim($_POST['occupation']);
    $gender = $_POST['gender'];

    // Validation
    if(empty($full_name) || empty($dob) || empty($nic) ||
       empty($address) || empty($phone) ||
       empty($email) || empty($gender)){

        $message = "All required fields must be filled.";

    } else {

        $sql = "INSERT INTO residents
        (full_name,dob,nic,address,phone,email,occupation,gender)

        VALUES
        ('$full_name','$dob','$nic','$address',
        '$phone','$email','$occupation','$gender')";

        if(mysqli_query($mysqli,$sql)){
            $message = "Resident added successfully.";
        } else {
            $message = "Error: " . mysqli_error($mysqli);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Resident</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="mb-4">Resident Registration Form</h2>

<?php
if($message != ""){
    echo "<div class='alert alert-info'>$message</div>";
}
?>

<form method="POST">

<div class="mb-3">
<label>Full Name</label>
<input type="text" name="full_name" class="form-control" required>
</div>

<div class="mb-3">
<label>Date of Birth</label>
<input type="date" name="dob" class="form-control" required>
</div>

<div class="mb-3">
<label>NIC</label>
<input type="text" name="nic" class="form-control" required>
</div>

<div class="mb-3">
<label>Address</label>
<textarea name="address" class="form-control" required></textarea>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Occupation</label>
<input type="text" name="occupation" class="form-control">
</div>

<div class="mb-3">
<label>Gender</label>

<select name="gender" class="form-control" required>
    <option value="">Select</option>
    <option>Male</option>
    <option>Female</option>
    <option>Other</option>
</select>

</div>

<button type="submit" name="submit" class="btn btn-primary">
    Save Resident
</button>

</form>

</div>
</body>
</html>
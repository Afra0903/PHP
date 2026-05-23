<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Search Residents</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Search Residents</h2>

<form method="GET">

<div class="input-group mb-4">

<input type="text"
name="keyword"
class="form-control"
placeholder="Search by Name, Address or NIC">

<button class="btn btn-success">
Search
</button>

</div>

</form>

<?php

if(isset($_GET['keyword'])){

    $keyword = $_GET['keyword'];

    $sql = "SELECT * FROM residents
            WHERE full_name LIKE '%$keyword%'
            OR address LIKE '%$keyword%'
            OR nic LIKE '%$keyword%'";

    $result = mysqli_query($mysqli,$sql);

    echo "<table class='table table-bordered bg-white'>";

    echo "
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>NIC</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>";

    while($row = mysqli_fetch_assoc($result)){

        echo "<tr>";

        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['full_name']."</td>";
        echo "<td>".$row['nic']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['phone']."</td>";

        echo "
        <td>
            <a href='edit.php?id=".$row['id']."' class='btn btn-warning btn-sm'>Edit</a>

            <a href='delete.php?id=".$row['id']."' class='btn btn-danger btn-sm'>Delete</a>
        </td>";

        echo "</tr>";
    }

    echo "</table>";
}
?>

</div>
</body>
</html>
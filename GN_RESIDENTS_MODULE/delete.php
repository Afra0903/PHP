<?php

include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM residents WHERE id=$id";

if(mysqli_query($mysqli,$sql)){
    echo "
    <script>
        alert('Resident Deleted Successfully');
        window.location='search.php';
    </script>";
}

?>
<?php

include 'db.php';

$id = $_POST['id'];
$full_name = $_POST['full_name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$sql = "UPDATE residents
        SET full_name='$full_name',
        address='$address',
        phone='$phone'
        WHERE id=$id";

if(mysqli_query($mysqli,$sql)){
    header("Location: search.php");
}

?>
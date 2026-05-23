<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "resident_database";

$mysqli= mysqli_connect($host, $user, $password, $database );

if($mysqli === false){
    echo "Connection failed";
    die("Error: could not connect". mysqli_connect_error() );

}



?>
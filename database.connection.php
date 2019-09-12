<?php 

$host = "localhost";
$user = "root";
$password = "*******";
$database = "*******";
$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection)
{
    die("Connection Failed: " . mysqli_conenct_error());
    echo "No connection.";
}



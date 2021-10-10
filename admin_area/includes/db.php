<?php 

$serverName = "localhost";
$userName = "marymart_admin";
$password = "marymart@2021";
$dbName = "marymart_mary_mart";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>
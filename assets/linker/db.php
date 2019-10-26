<?php 

$hostName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'intern_project';

$conn = mysqli_connect($hostName, $userName, $password , $databaseName);



// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}







?>
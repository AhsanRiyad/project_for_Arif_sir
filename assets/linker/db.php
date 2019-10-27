<?php 

$hostName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'intern_project';

// Create connection
$conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



/*try {
    $conn = new PDO("mysql:host=$hostName;dbname=$databaseName", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
*/



?>
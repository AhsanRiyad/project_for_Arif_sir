<?php 

$hostName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'webtech';

$conn = mysqli_connect($hostName, $userName, $password , $databaseName);


$sql = "SELECT * FROM `user`";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$data;
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
$data[$i]= $row;
$i++;
}
//echo $data[0]['email'];
print_r($data);

// $myArr = array("John", "Mary", "Peter", "Sally");

$myJSON = json_encode($data);

$obj = json_decode($myJSON, false);


echo $obj[0]->email;

?>
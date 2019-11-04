<?php 


$conn = get_mysqli_connection();

$sql = "CALL REGISTRATION( ?, ?, ?, ?, ?, @result)";
$stmt = $conn->prepare($sql);
$email =  'riyad298@gmail.com';
$full_name = 'Ahsan Riyad';
$mobile = '01919448787';
$institution_id = '01919448787';
$password = '1';

$stmt->bind_param('sssss' , $email, $full_name, $mobile, $institution_id, $password);
$stmt->execute();   

$stmt->close();
$sql = 'select @result as st'; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$conn->close();
print_r($row);







 ?>
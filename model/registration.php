<?php 

include "../address.php";

include $APP_ROOT.'assets/linker/db.php' ; 




$data =  file_get_contents('php://input');

$d1 = json_decode($data);


$email = $d1->email;
$full_name = $d1->full_name;
$mobile = $d1->mobile;
$institution_id = $d1->institution_id;
$password1 = $d1->password;
$otp = rand(1000,9999);

// echo $password;


 
// echo $password;

//echo $full_name;




$conn = get_mysqli_connection();

$sql = "CALL REGISTRATION( ?, ?, ?, ?, ?, ?, @result)";
$stmt = $conn->prepare($sql);
// $email =  'riyad298@afhorfooefoe.com';
// $full_name = 'Ahsan Riyad';
// $mobile = '01919448787';
// $institution_id = '01919448787';
// $password = '1';
 // $otp = 'aofhoerf';

$stmt->bind_param('ssssss' , $email, $full_name, $mobile, $institution_id, $password1, $otp);
$stmt->execute();   

$stmt->close();
$sql = 'select @result as st'; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$conn->close();
//print_r($row);
echo $row['st'];



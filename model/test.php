<?php 
include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 


//print_r($_REQUEST);

//echo 'hellow';

//echo json_encode($_REQUEST['term']);
//echo file_get_contents('php://input');


// $data = json_decode(file_get_contents('php://input'), true);

// echo $data;
// print_r($data);
//echo $data["purpose"];

// header("Content-Type: application/json; charset=UTF-8");

/*$data =  file_get_contents('php://input');*/
// echo $data->purpose;

//print_r($_REQUEST['purpose']);

//$data = '{"purpose":"get_data"}';

/*$d2 = json_decode($data);

echo $d2->purpose;*/

// echo 'hellow';

// echo $data;

// print_r($_FILES);


$conn = get_mysqli_connection();

$sql = "CALL REGISTRATION( ?, ?, ?, ?, ?, ?, @result)";
$stmt = $conn->prepare($sql);
$email =  'riyad298@afhorfooefoe.com';
$full_name = 'Ahsan Riyad';
$mobile = '01919448787';
$institution_id = '01919448787';
$password = '1';
$otp = 'aofhoerf';

$stmt->bind_param('ssssss' , $email, $full_name, $mobile, $institution_id, $password, $otp);
$stmt->execute();   

$stmt->close();
$sql = 'select @result as st'; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$conn->close();
print_r($row);











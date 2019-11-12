
<?php 
include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 



// echo 'you are in gallery';

// $data =  file_get_contents('php://input');
// $d2 = json_decode($data);
// echo $d2->purpose;



$email = 'riyad298@gmail.com';
$conn = get_mysqli_connection();
$sql = "select * from user_uploads uu where  uu.email = (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s' , $email);
$stmt->execute();
	//print_r($row);


//echo json_encode($row);
$array2d ;

$result = $stmt->get_result();

if($result->num_rows === 0) exit('No rows');
$row = $result->fetch_assoc();

$recent_photo = $row['recent_photo'];
$old_photo = $row['old_photo'];

$arrayPhoto = array( 'recent_photo' => $recent_photo , 'old_photo' => $old_photo );


$sql = "select * from user_photos up where up.email = (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s' , $email);
$stmt->execute();
$result = $stmt->get_result();
// $row = $result->fetch_assoc();



$i = 0;
// echo json_encode(var_dump($row));
while($row = $result->fetch_assoc()) {
	
	$arrayPhoto['group_photo'][$i] = $row['group_photo']; 
	$i++;
}

$stmt->close();
$conn->close();

echo json_encode($arrayPhoto);












?>
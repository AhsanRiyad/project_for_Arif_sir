
<?php 
include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 



// echo 'you are in gallery';

$data =  file_get_contents('php://input');
$d2 = json_decode($data);
// echo $d2->purpose;

// echo $d2->purpose;

$email = 'riyad298@gmail.com';






function getPhotos(){




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


	return json_encode($arrayPhoto);




}












if($d2->purpose == 'getPhotos'){




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




}else if($d2->purpose=='deletePhoto'){

	// $basename = trim($d2->basename)


	$bs = trim($d2->basename);
	//echo 'inside delete photo';
	$conn = get_mysqli_connection();
	//$sql = "delete FROM user_photos WHERE group_photo='$bs' and email='$email'";
	$sql = "delete FROM user_photos WHERE group_photo=(?) and email=(?)";
	$stmt = $conn->prepare($sql);
	// echo $sql;
	//mysqli_query($conn , $sql);
	//mysqli_close($conn);

	//echo trim($d2->basename);
	$stmt->bind_param('ss' ,  $bs , $email);
	$stmt->execute();

	$target_dir = $APP_ROOT."assets/img/uploads/group_photos/";
	$target_file = $target_dir . $bs;
	if (file_exists($target_file)){
		unlink($target_file);
	}

	$stmt->close();
	$conn->close();



	
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






















}











?>
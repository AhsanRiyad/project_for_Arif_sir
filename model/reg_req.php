<?php 
include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 


header("Content-Type: application/json; charset=UTF-8");


//print_r(json_encode($_REQUEST));
//print_r($_REQUEST['title']);

$data =  file_get_contents('php://input');
$d2 = json_decode($data);
//echo $d2->purpose;

if($d2->purpose=='get_data'){
	$conn = get_mysqli_connection();
	$sql = 'select * from users where status = "not_verified"';
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

//echo json_encode($row);

	mysqli_close($conn);
//print_r($row);
	$i = 0 ;

//echo json_encode($row);
	$array2d ;

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$GLOBALS['array2d'][$i++] = $row;
    	// $array2d[$i++][$row];
		}
	} else {
		echo "0 results";
	}

	echo json_encode($array2d);
//echo 'hi';
}
else if($d2->purpose=='reject_user'){

	//echo 'hi';

	$id = $d2->id;
	echo $id;
	// mysqli_close($conn);
	$conn = get_mysqli_connection();
	//mysqli_close($conn);

	$sql = "UPDATE users SET status ='rejected' WHERE id=(?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i' , $id);
	$stmt->execute();
	//mysqli_close($conn);

	$stmt->close();
	$conn->close();
}
else if($d2->purpose=='approve_user'){

	//echo 'hi';

	$id = $d2->id;
	echo $id;
	// mysqli_close($conn);
	$conn = get_mysqli_connection();
	//mysqli_close($conn);

	$sql = "UPDATE users SET status ='approved' WHERE id=(?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i' , $id);
	$stmt->execute();
	//mysqli_close($conn);

	$stmt->close();
	$conn->close();
}
else if($d2->purpose=='get_user_details'){
	//echo 'hi';
	

	$id = $d2->id;
	//echo $id;
	
	$conn = get_mysqli_connection();
	$sql = "select * from users WHERE id=(?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i' , $id);
	$stmt->execute();
	//print_r($row);
	$i = 0 ;

//echo json_encode($row);
	$array2d ;

	$result = $stmt->get_result();
	if($result->num_rows === 0) exit('No rows');
	while($row = $result->fetch_assoc()) {
		$GLOBALS['array2d'][$i++] = $row;
	}


	$stmt->close();
	$conn->close();

	echo json_encode($array2d);
}

else{
	echo $d2->purpose;
	echo $d2->id;
}



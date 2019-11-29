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


/*$conn = get_mysqli_connection();

$sql = "CALL current_photo( ?, ?, @result)";
$stmt = $conn->prepare($sql);*/
// $email =  'riyad298@afhorfooefoe.com';
// $full_name = 'Ahsan Riyad';
// $mobile = '01919448787';
// $institution_id = '01919448787';
// $password = '1';
 // $otp = 'aofhoerf';
/*
$email = 'riyad298@gmail.com';
$basename = 'faerfojrferfoajf';
$stmt->bind_param('ss' , $basename, $email);
$stmt->execute();   

$stmt->close();
$sql = 'select @result as st'; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$conn->close();
//print_r($row);
echo $row['st'];
*/


/*

				$conn = get_mysqli_connection();
				$sql = "call current_photo( ? , ? , @result )";
				$stmt = $conn->prepare($sql);
				$email = 'riyad298@gmail.com';
				$basename = 'jtogstgjoigjsogogosjgiotgoisr';
				$stmt->bind_param('ss' , $basename , $email );
				$stmt->execute();
				$stmt->close();
				$sql = 'select @result as st';
				$result = mysqli_query($conn , $sql);
				$row = mysqli_fetch_assoc($result);
				$conn->close();
				echo $row['st'];*/





/*
				//echo $_GET['hellow'];



				$conn = get_mysqli_connection();
				$sql = 'select * from verification_info where email = "riyad298@gmail.com"';
				$result = mysqli_query($conn , $sql);
				$row_verification_info = mysqli_fetch_assoc($result);
				//echo $row_verification_info['visibility'];
				$arrayE =  explode(',', $row_verification_info['visibility']);
				//print_r($arrayE);
				
				//echo '<br>';


				$sql = 'select * from users_registration where email = "riyad298@gmail.com"';
				$result = mysqli_query($conn , $sql);
				$row_users_registration = mysqli_fetch_assoc($result);
				

				//print_r($row_users_registration);
				$privacyArray;
				$arrayInfo;
				$i = 0;
				foreach ($arrayE as $key => $value) {

					

					$arrayInfo[$value] = $row_users_registration[$value];
					//echo $x;
				}
				//echo '<br>' ; 
				foreach ($row_users_registration as $key => $value) {
					# code...
					//echo $value;
					in_array($key, $arrayE) ? $privacyArray[$i++]= array($key , $value , 'public') : $privacyArray[$i++]= array($key , $value , 'private');
					//echo $key .'<br>'. $value;
				}


				// echo json_encode($arrayInfo);
				echo json_encode($privacyArray);


				$conn->close();


*/



/*
$cars = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );


  echo json_encode($cars);*/




/*  $conn = get_mysqli_connection();
  //var_dump($conn) ;

    //$sql = "select * from users_registration where email = 'riyad209@gmail.com'";
    //$stmt = $conn->prepare($sql);
    //$stmt->bind_param('ss' , $email, $password1);
    //$stmt->execute();   
  $conn = get_mysqli_connection();
  $email = 'riyad298@gmail.com';
  $email1 = mysqli_real_escape_string($conn, $email);
  $sql = 'select * from users_registration where email= '.'"'.$email1.'"'; 
  
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $_SESSION['users_info'] = $row;

echo $_SESSION['users_info']['email'];
$conn->close();*/


$conn = get_mysqli_connection();
	$sql = "call count_request(@verification_request, @change_request)";
	$result = mysqli_query($conn , $sql);
	// $stmt = $conn->prepare($sql);
	// $stmt->execute();
	$sql = "select @verification_request as vr , @change_request as cr";
	$result = mysqli_query($conn , $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
	}
	$conn->close();
	echo json_encode($row);
	echo '<br>';

	echo $row['vr'];
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

$email = 'riyad298@gmail.com';


$conn = get_mysqli_connection();








$sql = "select `full_name`, `mobile`, `institution_id`,`nid_or_passport`, `fathers_name`, `mother_name`, `spouse_name`, `number_of_children`, `profession`, `designation`, `institution`, `blood_group`, `date_of_birth`, `present_line1`, `present_district`, `present_post_code`, `present_country`, `parmanent_line1`,  `parmanent_district`, `parmanent_post_code`, `parmanent_country` from all_info_together where  email = (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s' , $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
// print_r($row);

echo '<br>';
echo '<br>';

echo implode(',' ,$row);
$arrayValueString =  implode(',' ,$row);

echo '<br>';
echo '<br>';

// print_r(array_keys($row));

$arrayKeyString =  implode(',' , array_keys($row));
echo   implode(',' , array_keys($row));

echo '<br>';
echo '<br>';

echo 'desired string';
echo '<br>';
$newArrayString = $arrayKeyString .'@#$'.$arrayValueString;

echo $newArrayString;

echo '<br>';
echo '<br>';

print_r(explode('@#$' , $newArrayString));












$arrayTogether = explode('@#$' , $newArrayString);

echo '<br>';
echo '<br>';


$array1keyString = $arrayTogether[0];
echo $array1keyString;

echo '<br>';
echo '<br>';

$array2ValueString = $arrayTogether[1];
echo $array2ValueString;

//final pair1
$arrayKey_tobeUpdated =  $stringToArrayKey = explode(',' , $array1keyString);
$arrayValue_tobeUpdated = $stringToArrayValue = explode(',' , $array2ValueString);


$arrayAssoc;
$i = 0;

for($i =0; $i<count($stringToArrayKey); $i++){
	 // $arrayAssoc = array($stringToArrayKey[$i]=>$stringToArrayValue[$i]);
	 $arrayAssoc[$stringToArrayKey[$i]] = $stringToArrayValue[$i];
}


echo '<br>';
echo '<br>';

// echo $stringToArrayKey[0];
print_r($arrayAssoc);




echo '<br>';
echo '<br>';


echo json_encode($arrayAssoc);
// $last_verified_info = json_encode($row);

// $sql = "update all_info_together set last_verified_info = (?) where email = (?)";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param('ss' , $last_verified_info ,$email);
// $stmt->execute();



// $sql = "select last_verified_info from all_info_together where  email = (?)";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param('s' , $email);
// $stmt->execute();
// $result = $stmt->get_result();
// $row = $result->fetch_assoc(); 
// echo  $row['last_verified_info'];
// print_r($row);


// echo $count = $row['count'];



echo '<br>';
echo '<br>';




$sql = "select last_verified_info from all_info_together where  email = (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s' , $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();


// print_r($row['last']);
echo $row['last_verified_info'];

echo '<br>';
echo '<br>';


$array =  explode('@#$' , $row['last_verified_info']);

//desired array
$arrayKey_from_database =  $stringToArrayKey_from_verified_info = explode(',' , $array[0] );
$arrayValue_from_database = $stringToArrayValue_from_verified_info = explode(',' , $array[1] );

echo $array[0];

// echo $stringToArrayKey_from_verified_info[0];

echo '<br>';
echo '<br>';


print_r($stringToArrayKey_from_verified_info);
// echo $stringToArrayKey_from_verified_info[1];

echo '<br>';
echo '<br>';


print_r($stringToArrayValue_from_verified_info);



echo '<br>';
echo '<br>';


$arrayNew = [];
for($i=0; $i<count($arrayValue_from_database) ; $i++){

	if($arrayValue_from_database[$i] != $arrayValue_tobeUpdated[$i]){


		$arrayNew[$arrayKey_from_database[$i]] = [$arrayValue_tobeUpdated[$i], $arrayValue_from_database[$i]] ; 



	}


}


print_r($arrayNew);

echo '<br>';
echo '<br>';


echo json_encode($arrayNew);



$stmt->close();
echo '<br>';
echo '<br>';


//$update_sql = "update all_info_together set `full_name`=(?), `mobile`=(?), `institution_id`=(?),`nid_or_passport`=(?), `fathers_name`=(?), `mother_name`=(?), `spouse_name`=(?), `number_of_children`=(?), `profession`=(?), `designation`=(?), `institution`=(?), `blood_group`=(?), `date_of_birth`=(?), `present_line1`=(?), `present_district`=(?), `present_post_code`=(?), `present_country`=(?), `parmanent_line1`=(?),  `parmanent_district`=(?), `parmanent_post_code`=(?), `parmanent_country`=(?)  where  email = (?)";

$update_sql1 = "update all_info_together set `full_name`='".$arrayValue_from_database[0]."', `mobile`='".$arrayValue_from_database[1]."', `institution_id`='".$arrayValue_from_database[2]."',`nid_or_passport`='".$arrayValue_from_database[3]."', `fathers_name`='".$arrayValue_from_database[4]."', `mother_name`='".$arrayValue_from_database[5]."', `spouse_name`='".$arrayValue_from_database[6]."', `number_of_children`=".$arrayValue_from_database[7].", `profession`='".$arrayValue_from_database[8]."', `designation`='".$arrayValue_from_database[9]."', `institution`='".$arrayValue_from_database[10]."', `blood_group`='".$arrayValue_from_database[11]."', `date_of_birth`='".$arrayValue_from_database[12]."', `present_line1`='".$arrayValue_from_database[13]."', `present_district`='".$arrayValue_from_database[14]."', `present_post_code`='".$arrayValue_from_database[15]."', `present_country`='".$arrayValue_from_database[16]."', `parmanent_line1`='".$arrayValue_from_database[17]."',  `parmanent_district`='".$arrayValue_from_database[18]."', `parmanent_post_code`='".$arrayValue_from_database[19]."', `parmanent_country`='".$arrayValue_from_database[20]."'  where  email = '".$email."'";


$update_sql_users_registration = "update all_info_together set `full_name`='".$arrayValue_from_database[0]."', `mobile`='".$arrayValue_from_database[1]."', `institution_id`='".$arrayValue_from_database[2]."'  where  email = '".$email."'";
mysqli_query($conn , $update_sql_users_registration);

$update_sql_users_info = "update all_info_together set `nid_or_passport`='".$arrayValue_from_database[3]."', `fathers_name`='".$arrayValue_from_database[4]."', `mother_name`='".$arrayValue_from_database[5]."', `spouse_name`='".$arrayValue_from_database[6]."', `number_of_children`=".$arrayValue_from_database[7].", `profession`='".$arrayValue_from_database[8]."', `designation`='".$arrayValue_from_database[9]."', `institution`='".$arrayValue_from_database[10]."', `blood_group`='".$arrayValue_from_database[11]."', `date_of_birth`='".$arrayValue_from_database[12]."'  where  email = '".$email."'";
mysqli_query($conn , $update_sql_users_info);


$update_sql_users_address = "update all_info_together set `present_line1`='".$arrayValue_from_database[13]."', `present_district`='".$arrayValue_from_database[14]."', `present_post_code`='".$arrayValue_from_database[15]."', `present_country`='".$arrayValue_from_database[16]."', `parmanent_line1`='".$arrayValue_from_database[17]."',  `parmanent_district`='".$arrayValue_from_database[18]."', `parmanent_post_code`='".$arrayValue_from_database[19]."', `parmanent_country`='".$arrayValue_from_database[20]."'  where  email = '".$email."'";
mysqli_query($conn , $update_sql_users_info);






echo $update_sql1;

echo '<br>';
echo '<br>';

// $stmt = $conn->prepare($update_sql);
//$stmt->bind_param('ssssssssisssssssssssss' , $email, $arrayValue_from_database[0], $arrayValue_from_database[1] , $arrayValue_from_database[2], $arrayValue_from_database[3] , $arrayValue_from_database[4] , $arrayValue_from_database[5] , $arrayValue_from_database[6], $arrayValue_from_database[7] , $arrayValue_from_database[8], $arrayValue_from_database[9], $arrayValue_from_database[10], $arrayValue_from_database[11], $arrayValue_from_database[12] , $arrayValue_from_database[13], $arrayValue_from_database[14], $arrayValue_from_database[15], $arrayValue_from_database[16], $arrayValue_from_database[17], $arrayValue_from_database[18], $arrayValue_from_database[19], $arrayValue_from_database[20] );
//$stmt->execute();
//$result = $stmt->get_result();
//$row = $result->fetch_assoc();


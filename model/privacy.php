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


				$email = $email__;
				$user_id = $id__ ;

				function getPrivacyData($email , $user_id){
					$conn = get_mysqli_connection();

					$user_id_fresh = mysqli_real_escape_string($conn, $user_id);
					$email_fresh = mysqli_real_escape_string($conn, $email);

					$sql = 'select * from all_info_together where id ='.$user_id_fresh;
					//echo $sql;
					$result = mysqli_query($conn , $sql);
					$row_verification_info = mysqli_fetch_assoc($result);
				//echo $row_verification_info['visibility'];
					$arrayE =  explode(',', $row_verification_info['visibility']);
				//print_r($arrayE);

				//echo '<br>';
					//$hello = 'select ui.email'

					// select ua.parmanent_district , ua.parmanent_country , ua.present_district , ua.present_country ,  ui.email , ui.nid_or_passport, ui.fathers_name , ui.mother_name , ui.spouse_name , ui.number_of_children , ui.profession , ui.designation , ui.institution , ui.blood_group , ui.date_of_birth , ur.mobile , ur.institution_id , ur.registration_date from users_info ui , users_registration ur , users_address ua WHERE ui.email  = ur.email = ua.email and ur.email = "riyad298@gmail.com"


					$sql ='select full_name, email , mobile , institution_id, nid_or_passport, fathers_name , mother_name , spouse_name , number_of_children , profession , designation , institution , blood_group , date_of_birth  , present_line1 , present_post_code , present_district, present_post_code, parmanent_line1, parmanent_post_code, parmanent_district, parmanent_country, membership_number , status , email_verification_status, change_request , type , registration_date from all_info_together WHERE  id = '.$user_id_fresh;
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
				}


				//echo $_GET['hellow'];


				$data =  file_get_contents('php://input');
				$d2 = json_decode($data);

				if($d2->purpose == 'getPrivacy'){
					echo getPrivacyData($email , $user_id);
					

				}if($d2->purpose == 'get_profile_details_for_all'){
					
					$email = $d2->email;
					$user_id = $d2->user_id;
					echo getPrivacyData($email , $user_id);
					

				}else if($d2->purpose == 'updatePrivacy'){

					//print_r($d2->users_info[0][0]);
					//echo sizeof($d2->users_info);
					// foreach (  $d2->users_info as $value) {
					// 	print_r($value);
					// }
					$arrayTobeUpdated;
					$j = 0 ; 
					for($i=0 ; $i<sizeof($d2->users_info); $i++){

						$d2->users_info[$i][2]=='public' ? $arrayTobeUpdated[$j++] = $d2->users_info[$i][0] : '' ;  
					}
					$privacyArrayInString =  implode(',', $arrayTobeUpdated);
					//print_r($arrayTobeUpdated);
					//$email = 'riyad298@gmail.com';
					$conn = get_mysqli_connection();
					$sql = "UPDATE `all_info_together` SET visibility = (?) WHERE id = (?)";
					$stmt = $conn->prepare($sql);
					$stmt->bind_param('si' , $privacyArrayInString ,  $user_id);
					$stmt->execute();   

					//echo $privacyArrayInString;

					echo getPrivacyData($email , $user_id);
					
					//echo 'hi hellow';

				}







/*
$cars = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );


  echo json_encode($cars);*/
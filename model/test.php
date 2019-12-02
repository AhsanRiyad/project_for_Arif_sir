<?php 
include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 
header("Content-Type: application/json; charset=UTF-8");
$data =  file_get_contents('php://input');
$d2 = json_decode($data);




	
	$email = 'riyad.for.test@gmail.com';
	$user_id = 7;
	$conn = get_mysqli_connection();
	$sql = "select last_verified_info from all_info_together where  id = ".$user_id." ";

$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
	}

$array =  explode('@#$' , $row['last_verified_info']);
$arrayValue_from_database = $stringToArrayValue_from_verified_info = explode(',' , $array[1] );

$arrayKey_from_database = $stringToArrayValue_from_verified_info = explode(',' , $array[0] );


print_r($arrayKey_from_database);
echo '<br>';
print_r($arrayValue_from_database);





$update_sql_users_registration = "update users_registration set `full_name`='".$arrayValue_from_database[0]."', `mobile`='".$arrayValue_from_database[1]."', `institution_id`='".$arrayValue_from_database[2]."'  where  email = '".$email."'";
mysqli_query($conn , $update_sql_users_registration);



if($arrayValue_from_database[7] == NULL || $arrayValue_from_database[7] == ''){
	$arrayValue_from_database[7] = 0;
}



$update_sql_users_info = "update users_info set `nid_or_passport`='".$arrayValue_from_database[3]."', `fathers_name`='".$arrayValue_from_database[4]."', `mother_name`='".$arrayValue_from_database[5]."', `spouse_name`='".$arrayValue_from_database[6]."', `number_of_children`=".$arrayValue_from_database[7].", `profession`='".$arrayValue_from_database[8]."', `designation`='".$arrayValue_from_database[9]."', `institution`='".$arrayValue_from_database[10]."', `blood_group`='".$arrayValue_from_database[11]."', `date_of_birth`='".$arrayValue_from_database[12]."'  where  email = '".$email."'";
mysqli_query($conn , $update_sql_users_info);



if($arrayValue_from_database[15] == NULL or $arrayValue_from_database[15] == ''){
	$arrayValue_from_database[15] = 0000;
}
if($arrayValue_from_database[19] == NULL or $arrayValue_from_database[19] == ''){
	$arrayValue_from_database[19] = 0000;
}





$update_sql_users_address = "update users_address set `present_line1`='".$arrayValue_from_database[13]."', `present_district`='".$arrayValue_from_database[14]."', `present_post_code`='".$arrayValue_from_database[15]."', `present_country`='".$arrayValue_from_database[16]."', `parmanent_line1`='".$arrayValue_from_database[17]."',  `parmanent_district`='".$arrayValue_from_database[18]."', `parmanent_post_code`='".$arrayValue_from_database[19]."', `parmanent_country`='".$arrayValue_from_database[20]."'  where  email = '".$email."'";
mysqli_query($conn , $update_sql_users_address);


$update_rejected_sql = "update all_info_together set change_request = 'rejected' where id = ".$user_id."";
mysqli_query($conn , $update_rejected_sql);
$conn->close();



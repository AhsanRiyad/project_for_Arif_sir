<?php 
include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 

//echo 'get data';

$data =  file_get_contents('php://input');
$d2 = json_decode($data);

$sql = '';
$name = $d2->search_text;
$conn = get_mysqli_connection();
$name1 =  mysqli_real_escape_string($conn , $name);



if($d2->purpose == 'full_name'){
	$sql = "select * from users_registration ur , users_info ui , users_address ua , verification_info  vi ,  user_uploads uu where uu.email = ur.email and ui.email = ur.email and  ua.email = ur.email and vi.email = ur.email and vi.status = 'approved' and  ur.full_name  REGEXP '$name'  limit 20 ";
}else if($d2->purpose == 'membership_number'){

	$sql = "select * from users_registration ur , users_info ui , users_address ua , verification_info  vi ,  user_uploads uu where uu.email = ur.email and ui.email = ur.email and  ua.email = ur.email and vi.email = ur.email and vi.status = 'approved' and   ur.membership_number  REGEXP '$name' limit 20 ";

}else if($d2->purpose == 'permanent_district'){


	$sql = "select * from users_registration ur , users_info ui , users_address ua , verification_info  vi ,  user_uploads uu where uu.email = ur.email and ui.email = ur.email and  ua.email = ur.email and vi.email = ur.email and vi.status = 'approved' and  ua.parmanent_district  REGEXP '$name' limit 20 ";


}else if($d2->purpose == 'institution_id'){
$sql = "select * from users_registration ur , users_info ui , users_address ua , verification_info  vi ,  user_uploads uu where uu.email = ur.email and ui.email = ur.email and  ua.email = ur.email and vi.email = ur.email and vi.status = 'approved' and  ur.institution_id  REGEXP '$name' limit 20 ";
}
else if($d2->purpose == 'rejected_user'){
$sql = "select * from users_registration ur , users_info ui , users_address ua , verification_info  vi ,  user_uploads uu where uu.email = ur.email and ui.email = ur.email and  ua.email = ur.email and vi.email = ur.email and vi.status = 'rejected' and  ur.full_name  REGEXP '$name' limit 20 ";
}




$result = mysqli_query($conn, $sql);
	//$row = mysqli_fetch_assoc($result);
	//$array2d[0] = json_encode($row);
	//echo json_encode($array2d);

mysqli_close($conn);
//print_r($row);
$i = 0 ;

//echo json_encode($row);


	//echo mysqli_num_rows($result);
	//print_r(mysqli_fetch_assoc($result));

if (mysqli_num_rows($result) > 1) {
    // output data of each row
	$array2d ;
	while($row = mysqli_fetch_assoc($result)) {
			//$GLOBALS['array2d'][$i++] = $row;
		$array2d[$i++] = $row;
    	// $array2d[$i++][$row];
			//echo $row['status'];
	}
		//echo 'get_>1';
	echo json_encode($array2d);

} else if (mysqli_num_rows($result) == 1) {
		// echo 'get_=1';

	$row = mysqli_fetch_assoc($result);
	$array2d[0] = json_encode($row);
	echo json_encode($array2d);
}else{
	echo mysqli_num_rows($result);

}

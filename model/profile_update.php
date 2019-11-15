<?php 
include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 


$data =  file_get_contents('php://input');
$d1 = json_decode($data);
$email = 'riyad298@gmail.com';

//echo $d1->purpose;


if($d1->purpose == 'basic'){
	$full_name= $d1->full_name;
	$mobile= $d1->mobile;
	$institution_id= $d1->institution_id;
	$nid_or_passport= $d1->nid_or_passport;
	$blood_group= $d1->blood_group;
	$dob= $d1->dob;

	$conn = get_mysqli_connection();
	$sql = "call update_profile_basic(?,?,?,?,?,?,?,@result)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sssssss' , $email , $full_name, $mobile , $institution_id , $blood_group , $nid_or_passport , $dob );
	$stmt->execute();
	$stmt->close();

	$sql = 'select @result as st'; 
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	echo $row['st'];



}else if($d1->purpose == 'personal'){
	$fathers_name= $d1->fathers_name;
	$mothers_name= $d1->mothers_name;
	$spouse_name= $d1->spouse_name;
	$number_of_children= $d1->number_of_children;
	$workplace_or_institution= $d1->workplace_or_institution;
	$designation= $d1->designation;

	$conn = get_mysqli_connection();
	$sql = "call update_profile_personal(?,?,?,?,?,?,?,@result)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ssssiss' , $email , $fathers_name , $mothers_name, $spouse_name , $number_of_children , $workplace_or_institution , $designation  );
	$stmt->execute();
	$stmt->close();

	$sql = 'select @result as st'; 
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	echo $row['st'];



}else if($d1->purpose == 'address1'){
	$present_line1= $d1->present_line1;
	$present_district= $d1->present_district;
	$present_post_code= $d1->present_post_code;
	$present_country= $d1->present_country;
	$permanent_line1= $d1->permanent_line1;
	$permanent_district= $d1->permanent_district;
	$permanent_post_code= $d1->permanent_post_code;
	$permanent_country= $d1->permanent_country;
	

	$conn = get_mysqli_connection();
	$sql = "call update_profile_address(?,?,?,?,?,?,?,?,?,@result)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sssssssss' , $email , $present_line1 , $present_district , $present_post_code , $present_country , $permanent_line1 , $permanent_district , $permanent_post_code , $permanent_country );
	$stmt->execute();
	$stmt->close();

	$sql = 'select @result as st'; 
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	echo $row['st'];



}
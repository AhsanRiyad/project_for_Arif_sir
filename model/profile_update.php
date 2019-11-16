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
	$profession = $d1->profession;
	$workplace_or_institution= $d1->workplace_or_institution;
	$designation= $d1->designation;

	$conn = get_mysqli_connection();
	$sql = "call update_profile_personal(?,?,?,?,?,?,?,?,@result)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ssssisss' , $email , $fathers_name , $mothers_name, $spouse_name , $number_of_children , $profession , $workplace_or_institution , $designation  );

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



}else if($d1->purpose == 'password'){
	

	$password1= md5($d1->password);

	//echo $password1;

	$conn = get_mysqli_connection();
	$sql = "call update_profile_password( ? , ? , @result)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ss' , $email , $password1 );

	$stmt->execute();
	$stmt->close();
	$sql = 'select @result as st'; 
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	echo $row['st'];



}else if($d1->purpose == 'email'){
	

	$email1 = $d1->email;

	//echo $email1;

	$conn = get_mysqli_connection();
	$sql = "call update_profile_email( ? , ? , @result)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ss' , $email , $email1 );

	$stmt->execute();
	$stmt->close();
	$sql = 'select @result as st'; 
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	echo $row['st'];



}else if($d1->purpose == 'forgot_password'){
	

	$email1 = $d1->email;

	//echo $email1;

	$randomNumber = md5(rand(10,1000));
	$purpose = 'generate_crypto';

	$conn = get_mysqli_connection();
	$sql = "call update_profile_forgot_password( ? , ? , ? , @result)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sss' , $email1 , $randomNumber , $purpose );

	$stmt->execute();
	$stmt->close();
	$sql = 'select @result as st'; 
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if($row['st']=='no_email_found'){
		echo $row['st'];
	}else if($row['st']=='crypto_added'){

		$mailto = 'riyad298@gmail.com';
		$mailSub = 'Password recovery , friends Forever';
		$mailMsg = 'Click to recover your password <br>'. $rootAdress.'pages/forgot.php?e='.$email.'&c='.$randomNumber;
		require 'PHPMailer-master/PHPMailerAutoload.php';
		$mail = new PHPMailer();
		$mail ->IsSmtp();
		$mail ->SMTPDebug = 0;
		$mail ->SMTPAuth = true;
		$mail ->SMTPSecure = 'ssl';
		$mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "riyad.for.test@gmail.com";
   $mail ->Password = "01919448787";
   $mail ->SetFrom("riyad.for.test@gmail.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
   	echo 'server_problem';
   }
   else
   {
   	echo $row['st'];
   }

}



}else if($d1->purpose == 'getProfileBasicInfo'){

	$conn = get_mysqli_connection();
	$sql = "select * from users_registration ur , users_info ui , users_address ua , verification_info  vi ,  user_uploads uu where uu.email = ur.email and ui.email = ur.email and  ua.email = ur.email and vi.email = ur.email and  ur.email = (?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s' , $email);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$stmt->close();
	$conn->close();

	echo json_encode($row);


	// $i = 0;
// echo json_encode(var_dump($row));
}else if($d1->purpose == 'forgot_password_recovery'){

	$email1 = $d1->email;
	$forgot_password_crypto = $d1->forgot_password_crypto;
	$purpose = 'crypto_check';

	//echo $email1;

	$conn = get_mysqli_connection();
	$sql = "call update_profile_forgot_password( ? , ? , ? , @result)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sss' , $email1 , $forgot_password_crypto , $purpose );

	$stmt->execute();
	$stmt->close();
	$sql = 'select @result as st'; 
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	echo $row['st'];

	// $i = 0;
// echo json_encode(var_dump($row));
}else if($d1->purpose == 'verify_email_otp'){

	
	$verify_email_otp = $d1->verify_email_otp;
	$purpose = $d1->purpose;
	// $otp = $d1->verify_email_otp;
	// $otp = rand(1000,9999);

	//echo $email1;
	$conn = get_mysqli_connection();
	$sql = "call email_verification_otp( ? , ? , ? , @result)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sss' , $email , $verify_email_otp , $purpose );

	$stmt->execute();
	$stmt->close();
	$sql = 'select @result as st'; 
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	

	echo $row['st'];

	// $i = 0;
// echo json_encode(var_dump($row));
}else if($d1->purpose == 'send_otp'){

	
	//$verify_email_otp = $d1->verify_email_otp;
	$purpose = $d1->purpose;
	// $otp = $d1->verify_email_otp;
	$otp = rand(1000,9999);

	//echo $email1;
	$conn = get_mysqli_connection();
	$sql = "call email_verification_otp( ? , ? , ? , @result)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sss' , $email , $otp , $purpose );

	$stmt->execute();
	$stmt->close();
	$sql = 'select @result as st'; 
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	

	if($row['st']=='otp_sent'){
		$mailto = $email;
		$mailSub = 'OTP for email verification';
		$mailMsg = 'OTP '. $otp;
		require 'PHPMailer-master/PHPMailerAutoload.php';
		$mail = new PHPMailer();
		$mail ->IsSmtp();
		$mail ->SMTPDebug = 0;
		$mail ->SMTPAuth = true;
		$mail ->SMTPSecure = 'ssl';
		$mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "riyad.for.test@gmail.com";
   $mail ->Password = "01919448787";
   $mail ->SetFrom("riyad.for.test@gmail.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
   	echo 'server_problem';
   }
   else
   {
   	echo $row['st'];
   }
};

	// $i = 0;
// echo json_encode(var_dump($row));
}
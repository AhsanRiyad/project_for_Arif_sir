<?php 
include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require $APP_ROOT.'vendor/autoload.php';




$mail = new PHPMailer();
$mail ->IsSmtp();
$mail ->SMTPDebug = 0;
$mail ->SMTPAuth = true;
$mail ->SMTPSecure = 'ssl';
$mail ->Host = "server165.web-hosting.com";
$mail ->Port = 465; // or 587
$mail ->IsHTML(true);
$mail ->Username = "riyad298@riyad.friendsbd.website";
$mail ->Password = "Ahsan111";
$mail ->SetFrom("riyad298@riyad.friendsbd.website");



$data =  file_get_contents('php://input');
$d1 = json_decode($data);
// $email = 'riyad298@gmail.com';

//echo $d1->purpose;


if($d1->purpose == 'basic'){
  $full_name= $d1->full_name;
  $mobile= $d1->mobile;
  $institution_id= $d1->institution_id;
  $nid_or_passport= $d1->nid_or_passport;
  $blood_group= $d1->blood_group;
  $dob= $d1->dob;

  $conn = get_mysqli_connection();


  $sql = "select `full_name`, `mobile`, `institution_id`,  `nid_or_passport`, `fathers_name`, `mother_name`, `spouse_name`, `number_of_children`, `profession`, `designation`, `institution`, `blood_group`, `date_of_birth`, `present_line1`, `present_district`, `present_post_code`, `present_country`, `parmanent_line1`,  `parmanent_district`, `parmanent_post_code`, `parmanent_country` from all_info_together where  id = ".$id__."";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
 }

 $arrayValueString =  implode(',' ,$row);
 $arrayKeyString =  implode(',' , array_keys($row));
 $verified_info = $arrayKeyString .'@#$'.$arrayValueString;


 $sql = "call update_profile_basic(?,?,?,?,?,?,?,?,@result)";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param('isssssss' , $id__ , $verified_info , $full_name, $mobile , $institution_id , $blood_group , $nid_or_passport , $dob );
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
  $sql = "select `full_name`, `mobile`, `institution_id`,  `nid_or_passport`, `fathers_name`, `mother_name`, `spouse_name`, `number_of_children`, `profession`, `designation`, `institution`, `blood_group`, `date_of_birth`, `present_line1`, `present_district`, `present_post_code`, `present_country`, `parmanent_line1`,  `parmanent_district`, `parmanent_post_code`, `parmanent_country` from all_info_together where  id = ".$id__."";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
 }

 $arrayValueString =  implode(',' ,$row);
 $arrayKeyString =  implode(',' , array_keys($row));
 $verified_info = $arrayKeyString .'@#$'.$arrayValueString;




 $sql = "call update_profile_personal(?,?,?,?,?,?,?,?,?,@result)";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param('issssisss' , $id__ , $verified_info , $fathers_name , $mothers_name, $spouse_name , $number_of_children , $profession , $workplace_or_institution , $designation  );

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


  $sql = "select `full_name`, `mobile`, `institution_id`,  `nid_or_passport`, `fathers_name`, `mother_name`, `spouse_name`, `number_of_children`, `profession`, `designation`, `institution`, `blood_group`, `date_of_birth`, `present_line1`, `present_district`, `present_post_code`, `present_country`, `parmanent_line1`,  `parmanent_district`, `parmanent_post_code`, `parmanent_country` from all_info_together where  id = ".$id__." ";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
 }

 $arrayValueString =  implode(',' ,$row);
 $arrayKeyString =  implode(',' , array_keys($row));
 $verified_info = $arrayKeyString .'@#$'.$arrayValueString;


 $sql = "call update_profile_address(?,?,?,?,?,?,?,?,?,?,@result)";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param('isssssssss' , $id__ , $verified_info ,$present_line1 , $present_district , $present_post_code , $present_country , $permanent_line1 , $permanent_district , $permanent_post_code , $permanent_country );
 $stmt->execute();
 $stmt->close();

 $sql = 'select @result as st'; 
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);

 $conn->close();
 echo $row['st'];



}else if($d1->purpose == 'password'){


  $password1= md5($d1->password);

	//echo $password1;

  $conn = get_mysqli_connection();
  $sql = "call update_profile_password( ? , ? , @result)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('is' , $id__ , $password1 );

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
  $sql = "select count(*) as count from all_info_together where email='".$email1."' ";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
   $row = mysqli_fetch_assoc($result);
}

if($row['count'] > 0){
   echo 'email already exists';
}else{
   $otp = rand(1000,9999);
   $mailto = $email1;
   $mailSub = 'OTP for Changine Email';
   $mailMsg = 'OTP '. $otp;


   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
      echo 'server_problem';
   }else{

      $sql = "update all_info_together set otp = '".$otp."'  where id='".$id__."' ";
      $result = mysqli_query($conn, $sql);
      echo 'success';

   }

}

}else if($d1->purpose == 'changeEmail'){




  $email = $d1->email;
  $otp = $d1->otp;
  $conn = get_mysqli_connection();
  $sql = "call update_profile_email(".$id__.", '".$email__."', '".$email."' , '".$otp."' , @result)";

   // echo $sql;
   $result = mysqli_query($conn, $sql);

   $sql = "select @result as rs";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row['rs'];
 }

   
  //$result = mysqli_query($conn, $sql);
  //$sql = "select @result as rs";
 //  if (mysqli_num_rows($result) > 0) {
 //    $row = mysqli_fetch_assoc($result);
 //    echo $row['rs'];
 // }
 // mysqli_close($conn);


   // $i = 0;
// echo json_encode(var_dump($row));
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


    $mailto = $email1;
    $mailSub = 'Password recovery , friends Forever';
    $mailMsg = 'Click to recover your password <br>'. $rootAdress.'pages/forgot.php?e='.$email1.'&c='.$randomNumber;


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
  $sql = "select * from all_info_together where id = ".$id__."";

  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
 } else {
    echo "0 results";
 }
 mysqli_close($conn);


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
  $stmt->bind_param('sss' , $email__ , $verify_email_otp , $purpose );

  $stmt->execute();
  $stmt->close();
  $sql = 'select @result as st'; 
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);


  echo $row['st'];

	// $i = 0;
// echo json_encode(var_dump($row));
}else if($d1->purpose == 'profile_completeness_100'){

  $user_type = $d1->user_type;
  $conn = get_mysqli_connection();
  $sql = '';
  if($user_type == 'admin'){
    $sql = "call user_request(? , @result)";
 }else if($user_type == 'user'){
    $sql = "update all_info_together set completeness = 100 where id = (?)";
 }

 $stmt = $conn->prepare($sql);
 $stmt->bind_param('i' , $id__ );

 $stmt->execute();
 $stmt->close();
 $conn->close();

}else if($d1->purpose == 'send_otp'){


	//$verify_email_otp = $d1->verify_email_otp;
  $purpose = $d1->purpose;
	// $otp = $d1->verify_email_otp;
  $otp = rand(1000,9999);

	//echo $email1;
  $conn = get_mysqli_connection();
  $sql = "call email_verification_otp( ? , ? , ? , @result)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('sss' , $email__ , $otp , $purpose );

  $stmt->execute();
  $stmt->close();
  $sql = 'select @result as st'; 
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);


  if($row['st']=='otp_sent'){
    $mailto = $email__;
    $mailSub = 'OTP for email verification';
    $mailMsg = 'OTP '. $otp;


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
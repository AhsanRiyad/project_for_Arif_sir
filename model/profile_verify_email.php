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
// $email__ = 'riyad298@gmail.com';


if($d1->purpose == 'verify_email_otp'){


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
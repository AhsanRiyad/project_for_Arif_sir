<?php 



/*
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
$mail ->Host = "mdahsanr.sgedu.site";
$mail ->Port = 465; // or 587
$mail ->IsHTML(true);
$mail ->Username = "ndc92@mdahsanr.sgedu.site";
// $mail ->Username = "registration@ndc92.cyberideaz.com";
// $mail ->Password = "ndc92";
$mail ->Password = "01919448787";
$mail ->SetFrom("ndc92@mdahsanr.sgedu.site");



*/



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

$mail ->Host = "ndc92.forumspace.xyz";

$mail ->Port = 465; // or 587

$mail ->IsHTML(true);

$mail ->Username = "info@ndc92.forumspace.xyz";

// $mail ->Username = "registration@ndc92.cyberideaz.com";

// $mail ->Password = "ndc92";

$mail ->Password = "nopass12ndc92";

$mail ->SetFrom("info@ndc92.forumspace.xyz");











 ?>
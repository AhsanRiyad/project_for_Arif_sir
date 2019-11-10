<?php 
//define('$rootAdress', "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/");
session_start();

$APP_ROOT = $_SERVER['DOCUMENT_ROOT']."/project_for_Arif_sir/";




$rootAdress = 'http://localhost/project_for_Arif_sir/';

// assets
$bootstrap_grid = $rootAdress."assets/css/bootstrap-grid.css" ; 
$bootstrap_reboot = $rootAdress."assets/css/bootstrap-reboot.css" ; 
$bootstrap = $rootAdress."assets/css/bootstrap.css" ; 
$jquery_ui_structure = $rootAdress."assets/css/jquery-ui.structure.css" ; 
$jquery_ui_theme = $rootAdress."assets/css/jquery-ui.theme.css" ; 
$style = $rootAdress."assets/css/style.php" ; 



// images
$logoSrc = $rootAdress."assets/img/logo.jpg";
$fev_icon = $rootAdress."assets/img/fev_icon.jpg";
$recent_photo = $rootAdress."assets/img/uploads/default.jpg";


// pages
$reg_for_admin = $APP_ROOT.'pages/reg_for_admin.php';
$dashboard_head = $APP_ROOT.'pages/dashboard_head.php';
$dashboard_foot = $APP_ROOT.'pages/dashboard_foot.php';
$linkerCss = $APP_ROOT.'assets/linker/linkerCss.php';
$linkerJs = $APP_ROOT.'assets/linker/linkerJs.php';



// address
$registationPage =  $rootAdress."pages/registration.php" ;
$loginPage = $rootAdress.'pages/login.php';
$forgotPage = $rootAdress.'pages/forgot.php';
$dashboardPage = $rootAdress.'pages/add_user.php';
$add_user = $rootAdress.'pages/add_user.php';
$reg_req = $rootAdress.'pages/reg_req.php';
$profilePage = $rootAdress.'pages/profile.php?pn=basic';








//model
$modelRegirstration = $rootAdress."model/registration.php" ; 
$modelLogin = $rootAdress."model/login.php" ; 
$modelReg_req = $rootAdress."model/reg_req.php" ; 
$modeltest = $rootAdress."model/test.php" ; 
$modelUploadPhotos = $rootAdress."model/upload_photos.php";
$modelPrivacy = $rootAdress."model/privacy.php";




// database
$hostName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'intern_project';



//CSRF_TOKEN token securty session
//$_SESSION['csrf_token1'] = bin2hex(random_bytes(32));


?>

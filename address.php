<?php 
//define('$rootAdress', "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

$APP_ROOT = $_SERVER['DOCUMENT_ROOT']."/project_for_Arif_sir/";

$rootAdress = 'http://localhost/project_for_Arif_sir/';

//hosting
//$rootAdress = 'http://riyad.friendsbd.website/project_for_Arif_sir/';




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
$profile_photo = $rootAdress."assets/img/uploads/default.jpg";
$default_photo = $rootAdress."assets/img/uploads/default.jpg";


// pages
$reg_for_admin = $APP_ROOT.'pages/reg_for_admin.php';
$dashboard_head = $APP_ROOT.'pages/dashboard_head.php';
$dashboard_foot = $APP_ROOT.'pages/dashboard_foot.php';
$linkerCss = $APP_ROOT.'assets/linker/linkerCss.php';
$linkerJs = $APP_ROOT.'assets/linker/linkerJs.php';
$db = $APP_ROOT.'assets/linker/db.php' ; 



// address
$registationPage =  $rootAdress."pages/registration.php" ;
$loginPage = $rootAdress.'pages/login.php';
$forgotPage = $rootAdress.'pages/forgot.php';
$dashboardPage = $rootAdress.'pages/add_user.php';
$add_user = $rootAdress.'pages/add_user.php';
$reg_req = $rootAdress.'pages/reg_req.php';
$profilePage = $rootAdress.'pages/profile.php?pn=basic';
$privacyPage = $rootAdress.'pages/privacy.php';
$galleryPage = $rootAdress.'pages/gallery.php';
$searchPage = $rootAdress.'pages/search.php';
$not_authorisedPage = $rootAdress.'pages/not_authorised.php';








//model
$modelRegirstration = $rootAdress."model/registration.php" ; 
$modelLogin = $rootAdress."model/login.php" ; 
$modelReg_req = $rootAdress."model/reg_req.php" ; 
$modeltest = $rootAdress."model/test.php" ; 
$modelUploadPhotos = $rootAdress."model/upload_photos.php";
$modelPrivacy = $rootAdress."model/privacy.php";
$modelGallery = $rootAdress."model/gallery.php";
$modelProfile_update = $rootAdress."model/profile_update.php";
$modelSearch = $rootAdress."model/search.php";
$modelAdminChangeInfo = $rootAdress."model/admin_change_info.php";




// database
$hostName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'intern_project';


// database hosting
// $hostName = '127.0.0.1';
// $userName = 'frieomkc_riyad';
// $password = '01919448787';
// $databaseName = 'frieomkc_intern_project';








//CSRF_TOKEN token securty session
//$_SESSION['csrf_token1'] = bin2hex(random_bytes(32));



//session email
$session_info = $APP_ROOT.'assets/linker/session_info.php';
$admin__ = false;
$user__ = false;
$verified__ = false;
$login__ = false;
$id__ = '';
$email__='';
$name__ = '';



if(isset($_SESSION['users_info'])){
	$email__ = $_SESSION['users_info']['email'];
	$id__ = $_SESSION['users_info']['id'];
	$name__ = $_SESSION['users_info']['full_name'];
}


?>

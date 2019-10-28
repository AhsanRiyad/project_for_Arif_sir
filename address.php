<?php 
//define('$rootAdress', "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/");
session_start();

$APP_ROOT = "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/";



$rootAdress = 'http://localhost/project_for_Arif_sir/';

// assets
$bootstrap_grid = $rootAdress."assets/css/bootstrap-grid.css" ; 
$bootstrap_reboot = $rootAdress."assets/css/bootstrap-reboot.css" ; 
$bootstrap = $rootAdress."assets/css/bootstrap.css" ; 
$jquery_ui_structure = $rootAdress."assets/css/jquery-ui.structure.css" ; 
$jquery_ui_theme = $rootAdress."assets/css/jquery-ui.theme.css" ; 
$style = $rootAdress."assets/css/style.php" ; 



// images
$logoSrc = $rootAdress."assets/img/logo_dashboard.png";



// pages
$reg_for_admin = $APP_ROOT.'pages/reg_for_admin.php';

$dashboard_head = $APP_ROOT.'pages/dashboard_head.php';
$dashboard_foot = $APP_ROOT.'pages/dashboard_foot.php';




// address
$registationPage =  $rootAdress."pages/registration.php" ;
$loginPage = $rootAdress.'pages/login.php';
$forgotPage = $rootAdress.'pages/forgot.php';
$dashboardPage = $rootAdress.'pages/add_user.php';
$add_user = $rootAdress.'pages/add_user.php';
$reg_req = $rootAdress.'pages/reg_req.php';




//model
$modelRegirstration = $rootAdress."model/registration.php" ; 
$modelLogin = $rootAdress."model/login.php" ; 





// database
$hostName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'intern_project';


?>
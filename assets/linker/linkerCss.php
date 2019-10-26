<?php 
//define('$rootAdress', "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/");
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





?>

<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $pageName ;  ?>
	</title>
	
	<link rel="stylesheet" href="<?= $bootstrap_grid ?>">
	<link rel="stylesheet" href="<?= $bootstrap_reboot ?>">
	<link rel="stylesheet" href="<?= $bootstrap ?>">
	<link rel="stylesheet" href="<?= $jquery_ui_structure ?>">
	<link rel="stylesheet" href="<?= $jquery_ui_theme ?>">
	

	<?php 
	include $APP_ROOT."assets/css/style.php";
	?>

</head>
<body>














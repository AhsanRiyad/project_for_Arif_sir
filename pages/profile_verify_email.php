<?php 
$pageName = 'profile_verify_email';
include "../address.php"; 
include $db; 
include $session_info;


include $linkerCss;
?>


<?php 
include $dashboard_head;
?>

<div id="app">	
	
	<v-app>
		<profile_verify_email :profile_photo="profile_photo"></profile_verify_email>
		<buttons></buttons>
	</v-app>

</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

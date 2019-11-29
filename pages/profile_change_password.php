<?php 
$pageName = 'profile_change_password';
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
		<profile_change_password :profile_photo="profile_photo"></profile_change_password>
		<buttons></buttons>
	</v-app>

</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

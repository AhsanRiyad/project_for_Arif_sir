<?php 
$pageName = 'profile_change_email';
include "../address.php"; 
include $db; 
include $linkerCss;
?>


<?php 
include $dashboard_head;
?>

<div id="app">	
	
	<v-app>
		<profile_change_email :profile_photo="profile_photo"></profile_change_email>
		<buttons></buttons>
	</v-app>

</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

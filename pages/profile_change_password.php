<?php 
$pageName = 'profile_change_password';
include "../address.php"; 
include $db; 

include $linkerCss;
?>


<?php 
include $dashboard_head;
?>

<div id="app">	
	
	<v-app>
		<profile_change_password :profile_photo="profile_photo"></profile_change_password>
	</v-app>

</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

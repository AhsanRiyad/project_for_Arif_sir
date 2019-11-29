<?php 
$pageName = 'profile_address';
include "../address.php"; 
include $db; 

include $linkerCss;
?>


<?php 
include $dashboard_head;
?>

<div id="app">	
	
	<v-app>
		<profile_address :profile_photo="profile_photo"></profile_address>
		<buttons></buttons>
	</v-app>

</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

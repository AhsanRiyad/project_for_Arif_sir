<?php 
$pageName = 'profile_personal';
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
		<alert></alert>
		<profile_personal :profile_photo="profile_photo"></profile_personal>
		<buttons></buttons>
	</v-app>

</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

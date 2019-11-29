<?php 
$pageName = 'profile_basic';
include "../address.php"; 
include $db; 


include $linkerCss;
?>


<?php 
include $dashboard_head;
?>

<div id="app">	
	
	<v-app>
		<alert></alert>
		<profile_basic :profile_photo="profile_photo"></profile_basic>

		<buttons></buttons>

	</v-app>

</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

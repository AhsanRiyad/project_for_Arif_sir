<?php 
$pageName = 'profile';
include "../address.php"; 
include $db; 


include $linkerCss;
?>


<?php 
include $dashboard_head;
?>

<div id="app">	

	<v-app>
			<basic :profile_photo="profile_photo"></basic>
	</v-app>


</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

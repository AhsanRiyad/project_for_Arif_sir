<?php 
$pageName = 'profile_photo_upload';
include "../address.php"; 
include $db; 


include $linkerCss;
?>


<?php 
include $dashboard_head;
?>

<div id="app">	
	
	<v-app>
		<profile_photo_upload :profile_photo="profile_photo"></profile_photo_upload>
	</v-app>

</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

<?php 
$pageName = 'photo_gallery';
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
		<photo_gallery></photo_gallery>
	</v-app>

</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

<?php 
$pageName = 'new_user_request';
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
		<new_user_request></new_user_request>
	</v-app>

</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

<?php 
$pageName = 'data_privacy';
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
	<!-- <component v-bind:is="componet_name"> -->
		<data_privacy></data_privacy>
	</v-app>



</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

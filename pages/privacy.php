<?php 
$pageName = 'privacy';
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
		<privacy></privacy>
	</v-app>



</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

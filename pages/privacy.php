<?php 
$pageName = 'privacy';
include "../address.php"; 
include $db; 
include $session_info;
include $linkerCss;
?>


<div  id="privacy">	
	

<?php 
include $dashboard_head;
?>
	<v-app>
	<!-- <component v-bind:is="componet_name"> -->
		<privacy></privacy>
	</v-app>
<?php 
include $dashboard_foot ;
?>



</div>


<?php 
include $linkerJs;
?>

<?php 
$pageName = 'privacy';
include "../address.php"; 
include $linkerCss;
?>
<?php 
include $dashboard_head;
?>


<div  id="privacy">	
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

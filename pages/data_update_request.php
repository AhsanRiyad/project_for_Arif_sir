<?php 
$pageName = 'data_update_request';
include "../address.php"; 
include $db; 


include $linkerCss;
?>


<?php 
include $dashboard_head;
?>

<div id="app">	
	
	<v-app>
		<data_update_request></data_update_request>
	</v-app>

</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>

<?php 
$pageName = 'admin_options';
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
		

		<admin_options></admin_options>
		
	</v-app>
	
</div>

<?php 
include $dashboard_foot ;
?>


<?php 
include $linkerJs;
?>

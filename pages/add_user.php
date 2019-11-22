<?php 
$pageName = 'add_user';
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
		

		<add_user></add_user>
		
	</v-app>
	
</div>

<?php 
include $dashboard_foot ;
?>


<?php 
include $linkerJs;
?>

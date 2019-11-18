<?php 
$pageName = 'add_user';
include "../address.php"; 
include $db; 
include $session_info;

include $linkerCss;
?>


<div id="add_user">
		<?php 
		include $dashboard_head;
		?>
	<v-app>
		

		<add_user></add_user>
		
	</v-app>
		<?php 
		include $dashboard_foot ;
		?>
		
</div>



<?php 
include $linkerJs;
?>

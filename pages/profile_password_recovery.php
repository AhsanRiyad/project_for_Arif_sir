<?php 
$pageName = 'profile_password_recovery';
include "../address.php"; 
include $db; 
include $session_info;

include $linkerCss;
?>



<div id="app">	
	
	<v-app>
		<profile_password_recovery></profile_password_recovery>
	</v-app>

</div>



<?php 
include $linkerJs;
?>

<?php 
$pageName = 'search';
include "../address.php"; 
include $db; 
include $session_info;
include $linkerCss;
?>

<div id="search">
<?php 
include $dashboard_head;
?>
	<v-app>s
		<!-- <search></search> -->
		<search></search>
	</v-app>
<?php 
include $dashboard_foot ;
?>
</div>






<?php 
include $linkerJs;
?>
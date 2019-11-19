<?php 
$pageName = 'search';
include "../address.php"; 
include $db; 
include $session_info;
include $linkerCss;
?>

<?php 
include $dashboard_head;
?>
<div id="search">
	<v-app>s
		<!-- <search></search> -->
		<search></search>
	</v-app>
</div>

<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>
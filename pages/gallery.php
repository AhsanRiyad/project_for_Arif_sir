<?php 
$pageName = 'gallery';
include "../address.php"; 
include $db; 
include $session_info;
include $linkerCss;
?>
<?php 
include $dashboard_head;
?>



<div  id="gallery">
<v-app>
<gallery></gallery>
</v-app>
</div>




<?php 
include $dashboard_foot ;
?>
<?php 
include $linkerJs;
?>
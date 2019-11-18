<?php 
$pageName = 'reg_req';
include "../address.php"; 
include $db; 
include $session_info;
?>

<?php 
include $linkerCss;
include $dashboard_head;
?>



<div  id="reg_req">
<v-app>
<reg_req></reg_req>
</v-app>
</div>




<?php 
include $dashboard_foot ;
?>
<?php 
include $linkerJs;
?>
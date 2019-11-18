<?php 
$pageName = 'reg_req';
include "../address.php"; 
include $db; 
include $session_info;
include $linkerCss;
?>




<div  id="reg_req">
<?php 
include $dashboard_head;
?>
<v-app>


<reg_req></reg_req>

</v-app>
<?php 
include $dashboard_foot ;
?>


</div>




<?php 
include $linkerJs;
?>
<?php 
$pageName = 'reg_req';
include "../address.php"; 
include $db; 
include $session_info;
include $linkerCss;
?>



<?php 
include $dashboard_head;
?>

<div  id="reg_req">
<v-app>

<?php 
if(isset($_GET['pname']) && $_GET['pname'] == 'change_request'){
?>

<change_request></change_request>

<?php 
}else{
?>
<reg_req></reg_req>



<?php 
}
?>

</v-app>


</div>

<?php 
include $dashboard_foot ;
?>



<?php 
include $linkerJs;
?>
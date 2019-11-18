<?php 
$pageName = 'gallery';
include "../address.php"; 
include $db; 
include $session_info;
include $linkerCss;
?>



<div  id="gallery">

<?php 
include $dashboard_head;
?>


<v-app>
<gallery></gallery>


</v-app>
<?php 
include $dashboard_foot ;
?>

</div>




<?php 
include $linkerJs;
?>
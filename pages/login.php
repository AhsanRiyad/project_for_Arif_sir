<?php 
$pageName = 'login';
include "../address.php";
include $db; 
include $session_info;
//$APP_ROOT = "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/";
//include $APP_ROOT."assets\linker\linkerCss.php" ; 
$_SESSION['users_info'] = null;


include $linkerCss;


?>


<!-- login form starts -->

  <div id="login">
    <v-app>
    <login></login>
    </v-app>

  </div>
  

  <!-- body ends-->




  <?php 
  // include $APP_ROOT."assets/linker/linkerJs.php" ; 

  include $linkerJs;
  ?>
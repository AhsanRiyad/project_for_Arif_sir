<?php 
$pageName = 'login';
include "../address.php";
include $db; 
include $session_info;
//$APP_ROOT = "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/";
//include $APP_ROOT."assets\linker\linkerCss.php" ; 

include $linkerCss;
?>


<!-- login form starts -->

  <div id="app">
    <v-app>
    <login></login>
    </v-app>

  </div>
  

  <!-- body ends-->




  <?php 
  // include $APP_ROOT."assets/linker/linkerJs.php" ; 

  include $linkerJs;
  ?>
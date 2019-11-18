<?php 
$pageName = 'forgot_password';
include "../address.php";
include $db; 
include $session_info; 
include $linkerCss;
?>



<!-- login form starts -->
 <div id="forgot_password">
    <v-app>
    <!-- <forgot_password></forgot_password> -->
    <!-- <password_recovery></password_recovery> -->
    <component :invalid_link='invalid_link' v-bind:is="componet_name"></component>
    </v-app>
    
  


  </div>
  


<!-- body ends-->




<?php 
include $linkerJs;
?>
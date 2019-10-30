<?php 
$pageName = 'login';
//$APP_ROOT = "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/";
//include $APP_ROOT."assets\linker\linkerCss.php" ; 
include "../assets\linker\linkerCss.php";




?>

    

    <div id="vue-app">
      <h1>{{name}}</h1>
      <p>{{ job}} </p>
    
      <p> {{ greet() }} </p>
      <p>{{ time('morning') }}</p>

      <!-- tag bind in the date -->
      <a v-bind:href="website"> riyad facebook</a>

      <!-- html element bind in the field -->

      <p v-html="fullTag" ></p>


    </div>



    
  <?php 
  include $APP_ROOT."assets/linker/linkerJs.php" ; 
  ?>
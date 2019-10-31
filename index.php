<?php 
include "address.php" ; 


include $linkerCss;
?>

<!-- for basic vue -->
<div id=vue-app>
<h1>{{name}}</h1>
</div>





<!-- for vuetify with resouce or http request-->
<div id="app">
    <v-app>
      <v-content>
        <v-container>Hello world</v-container>
        <button v-on:click="post()" class="btn btn-primary">
         {{ name}}
        </button>

        <App></App>
      </v-content>
    </v-app>
  </div>





<?php 
include $linkerJs;

?>
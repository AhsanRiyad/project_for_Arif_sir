<?php 
$pageName = 'vue_test';
//$APP_ROOT = "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/";
//include $APP_ROOT."assets\linker\linkerCss.php" ; 
include "../address.php"; 
include $linkerCss;
?>

<div id="app">
  <v-app>
    <v-container>
      <v-layout row>
      <v-btn> hellwo </v-btn>
      </v-layout>
    </v-container>
  </v-app>

</div>


<?php 
  // include $APP_ROOT."assets/linker/linkerJs.php" ; 
include $linkerJs;

?>

<style>
	input[type="file"]{
		position: absolute;
		top: -500px;
	}

	div.file-listing{
		width: 200px;
	}

	span.remove-file{
		color: red;
		cursor: pointer;
		float: right;
	}
</style>
<script>
	
	var registration_page = new Vue({
		el: '#app' , 
    vuetify: new Vuetify(),
    data : {
     name: 'riyad---vue',

   } , 
   methods : {

   },
   beforeCreate(){

   },
   created(){

   },
   beforeMount(){

   },
   mounted(){

   },
   beforeUpdated(){

   },
   updated(){

   }
 })



</script>


<html>
  
<v-container>
   <v-row align="center" justify="center">
    <v-img
      src="https://picsum.photos/id/11/500/300"
      lazy-src="https://picsum.photos/id/11/10/6"
      aspect-ratio="1"
      class="grey lighten-2"
      max-width="500"
      max-height="300"
    ></v-img>
  </v-row>
</v-container>


</html>
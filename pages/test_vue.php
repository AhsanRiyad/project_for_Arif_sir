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

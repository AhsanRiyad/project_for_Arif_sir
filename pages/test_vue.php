<?php 
$pageName = 'vue_test';
//$APP_ROOT = "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/";
//include $APP_ROOT."assets\linker\linkerCss.php" ; 
include "../address.php"; 
include $linkerCss;
?>




<?php 
  // include $APP_ROOT."assets/linker/linkerJs.php" ; 
include $linkerJs;


?>


<script>
	axios.get('<?php echo $modeltest; ?>')
	.then(function (response) {
    // handle successconsole.log(response.data);
    /*console.log(response.status);
    console.log(response.statusText);
    console.log(response.headers);
    console.log(response.config);*/
    console.log(response.data);
    
})
	.catch(function (error) {
    // handle error
    console.log(error);
})
	.finally(function () {
    // always executed
});
</script>

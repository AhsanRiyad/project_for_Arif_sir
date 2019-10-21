<?php 
$rootAdress = 'http://localhost/webtech_project/Webtech_Project_MVC/';

$bootstrapLib = $rootAdress."lib/css/bootstrap.min.css";
$stylesheet =  $rootAdress."lib/css/main.css";
$fontAwesome = $rootAdress."lib/font-awesome/css/all.css";
$imageFevicon = $rootAdress."lib/img/fevicon.png";
?>

<!-- bootstrap cdn -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
  
  <!-- bootstrap on server -->
  <link href=<?php echo $bootstrapLib; ?> rel="stylesheet" type="text/css"/>
  
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">


  <!-- font awesome on server -->
  <link href=<?= $fontAwesome; ?> rel="stylesheet" type="text/css"/>
  
  <link rel="icon" href=<?php echo $imageFevicon; ?> type="image/gif" sizes="16x16">


   <!-- css custom stylesheet -->
  <link rel="stylesheet" href=<?php echo $stylesheet; ?>>
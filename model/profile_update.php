<?php 
include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 



$data =  file_get_contents('php://input');
$d1 = json_decode($data);



echo 'you are in profile_update model'; 





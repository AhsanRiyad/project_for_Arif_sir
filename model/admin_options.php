<?php 
include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 


$data =  file_get_contents('php://input');
$d2 = json_decode($data);

$sql = '';
$conn = get_mysqli_connection();
$purpose = $d2->purpose;



if($purpose == 'change_institution_id_label'){

$sql = "UPDATE admin_options SET institution_id_label= '".$d2->institution_id_label."'  WHERE admin_options_id = 1";

try {


    if (!mysqli_query($conn , $sql)) {
        throw new Exception('Data Server Problem');
    }else{
    echo 'success';

    }



} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}



}
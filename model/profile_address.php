<?php 
include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 


// $id__ = 1;

$data =  file_get_contents('php://input');
$d1 = json_decode($data);




if($d1->purpose == 'address1'){
  $present_line1= $d1->present_line1;
  $present_district= $d1->present_district;
  $present_post_code= $d1->present_post_code;
  $present_country= $d1->present_country;
  $permanent_line1= $d1->permanent_line1;
  $permanent_district= $d1->permanent_district;
  $permanent_post_code= $d1->permanent_post_code;
  $permanent_country= $d1->permanent_country;

  $conn = get_mysqli_connection();


  $sql = "select `full_name`, `mobile`, `institution_id`,  `nid_or_passport`, `fathers_name`, `mother_name`, `spouse_name`, `number_of_children`, `profession`, `designation`, `institution`, `blood_group`, `date_of_birth`, `present_line1`, `present_district`, `present_post_code`, `present_country`, `parmanent_line1`,  `parmanent_district`, `parmanent_post_code`, `parmanent_country` from all_info_together where  id = ".$id__." ";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  }

  $arrayValueString =  implode(',' ,$row);
  $arrayKeyString =  implode(',' , array_keys($row));
  $verified_info = $arrayKeyString .'@#$'.$arrayValueString;


  $sql = "call update_profile_address(?,?,?,?,?,?,?,?,?,?,@result)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('isssssssss' , $id__ , $verified_info ,$present_line1 , $present_district , $present_post_code , $present_country , $permanent_line1 , $permanent_district , $permanent_post_code , $permanent_country );
  $stmt->execute();
  $stmt->close();

  $sql = 'select @result as st'; 
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  verify_change_request($id__);


  $conn->close();
  echo $row['st'];



}
else if($d1->purpose == 'getProfileBasicInfo'){

  $conn = get_mysqli_connection();
  $sql = "select * from all_info_together where id = ".$id__."";

  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
  } else {
    echo "0 results";
  }
  mysqli_close($conn);


  // $i = 0;
// echo json_encode(var_dump($row));
}



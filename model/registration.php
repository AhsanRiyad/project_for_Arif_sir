<?php 

include "../address.php";


include $APP_ROOT.'assets/linker/db.php' ; 



$first_name = mysqli_real_escape_string( $conn , $_REQUEST['first_name']);
$middle_name = mysqli_real_escape_string( $conn ,$_REQUEST['middle_name']);
$last_name = mysqli_real_escape_string( $conn ,$_REQUEST['last_name']);
$gender = mysqli_real_escape_string( $conn ,$_REQUEST['gender']);
$membership_number = 'membership_number';
$institution_id = mysqli_real_escape_string( $conn ,$_REQUEST['institution_id']);
$nid_or_passport = mysqli_real_escape_string( $conn ,$_REQUEST['nid_or_passport']);
$fathers_name = mysqli_real_escape_string( $conn ,$_REQUEST['fathers_name']);
$mother_name = mysqli_real_escape_string( $conn ,$_REQUEST['mother_name']);
$spouse_name = mysqli_real_escape_string( $conn ,$_REQUEST['spouse_name']);
$number_of_children = mysqli_real_escape_string( $conn ,$_REQUEST['number_of_children']);
$present_line_1 = mysqli_real_escape_string( $conn ,$_REQUEST['present_line_1']);
$present_line_2 = mysqli_real_escape_string( $conn ,$_REQUEST['present_line_2']);
$present_city_or_district = mysqli_real_escape_string( $conn ,$_REQUEST['present_city_or_district']);
$present_post_code = mysqli_real_escape_string( $conn ,$_REQUEST['present_post_code']);
$present_country = mysqli_real_escape_string( $conn ,$_REQUEST['present_country']);
$parmanent_line_1 = mysqli_real_escape_string( $conn ,$_REQUEST['parmanent_line_1']);
$parmanent_line_2 = mysqli_real_escape_string( $conn ,$_REQUEST['parmanent_line_2']);
$parmanent_post_code = mysqli_real_escape_string( $conn ,$_REQUEST['parmanent_post_code']);
$parmanent_country = mysqli_real_escape_string( $conn ,$_REQUEST['parmanent_country']);
$parmanent_city_or_district = mysqli_real_escape_string( $conn ,$_REQUEST['parmanent_city_or_district']);
$profession = mysqli_real_escape_string( $conn ,$_REQUEST['profession']);
$designation = mysqli_real_escape_string( $conn ,$_REQUEST['designation']);
$institution = mysqli_real_escape_string( $conn ,$_REQUEST['institution']);
$mobile = mysqli_real_escape_string( $conn ,$_REQUEST['mobile']);
$email = mysqli_real_escape_string( $conn ,$_REQUEST['email']);
$blood_group = mysqli_real_escape_string( $conn ,$_REQUEST['blood_group']);
$date_of_birth = mysqli_real_escape_string( $conn ,$_REQUEST['date_of_birth']);
$type = 'type';
$password = mysqli_real_escape_string( $conn ,$_REQUEST['password']);

//echo print_r($_REQUEST);


// $sql =  "INSERT INTO `users`(`first_name`, `middle_name`, `last_name`, `gender`, `membership_number`,  `institution_id`, `nid_or_passport`, `fathers_name`, `mother_name`, `spouse_name`, `number_of_children`, `present_line_1`, `present_line_2`, `present_city_or_district`, `present_post_code`, `present_country`, `parmanent_line_1`, `parmanent_line_2`, `parmanent_post_code`, `parmanent_country`, `parmanent_city_or_district`, `profession`, `designation`, `institution` , `mobile`  `email`, `blood_group`, `date_of_birth` , `type` , `password`) VALUES ( first_name, middle_name, last_name, gender, membership_number,  institution_id, nid_or_passport, fathers_name, mother_name, spouse_name, number_of_children, present_line_1, present_line_2, present_city_or_district, present_post_code, present_country, parmanent_line_1, parmanent_line_2, parmanent_post_code, parmanent_country, parmanent_city_or_district, profession, designation, institution , mobile ,  email, blood_group, date_of_birth , type , password )" ; 

$stmt = $conn->prepare('INSERT INTO USERS (`FIRST_NAME` , `middle_name` , `last_name` , `gender`) VALUES (? , ? , ? , ?)');
$stmt->bind_param('sss', $first_name , $middle_name , $last_name ); // 's' specifies the variable type => 'string'

$stmt->execute();

/*$result = $stmt->get_result();*/
/*while ($row = $result->fetch_assoc()) {
    // Do something with $row
}*/

mysqli_close($conn);


?>
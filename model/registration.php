<?php 

include "../address.php";


include $APP_ROOT.'assets/linker/db.php' ; 



$first_name = $_REQUEST['first_name'];
$middle_name = $_REQUEST['middle_name'];
$middle_name = $_REQUEST['middle_name'];
$last_name = $_REQUEST['last_name'];
$gender = $_REQUEST['gender'];
$membership_number = 'membership_number';
$institution_id = $_REQUEST['institution_id'];
$nid_or_passport = $_REQUEST['nid_or_passport'];
$fathers_name = $_REQUEST['fathers_name'];
$mother_name = $_REQUEST['mother_name'];
$spouse_name = $_REQUEST['spouse_name'];
$number_of_children = $_REQUEST['number_of_children'];
$present_line_1 = $_REQUEST['present_line_1'];
$present_line_2 = $_REQUEST['present_line_2'];
$present_city_or_district = $_REQUEST['present_city_or_district'];
$present_post_code = $_REQUEST['present_post_code'];
$present_country = $_REQUEST['present_country'];
$parmanent_line_1 = $_REQUEST['parmanent_line_1'];
$parmanent_line_2 = $_REQUEST['parmanent_line_2'];
$parmanent_post_code = $_REQUEST['parmanent_post_code'];
$parmanent_country = $_REQUEST['parmanent_country'];
$parmanent_city_or_district = $_REQUEST['parmanent_city_or_district'];
$profession = $_REQUEST['profession'];
$designation = $_REQUEST['designation'];
$institution = $_REQUEST['institution'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$blood_group = $_REQUEST['blood_group'];
$date_of_birth = $_REQUEST['date_of_birth'];
$type = 'type';
$password = $_REQUEST['password'];

//echo print_r($_REQUEST);









// $sql =  "INSERT INTO `users`(`first_name`, `middle_name`, `last_name`, `gender`, `membership_number`,  `institution_id`, `nid_or_passport`, `fathers_name`, `mother_name`, `spouse_name`, `number_of_children`, `present_line_1`, `present_line_2`, `present_city_or_district`, `present_post_code`, `present_country`, `parmanent_line_1`, `parmanent_line_2`, `parmanent_post_code`, `parmanent_country`, `parmanent_city_or_district`, `profession`, `designation`, `institution` , `mobile`  `email`, `blood_group`, `date_of_birth` , `type` , `password`) VALUES ( first_name, middle_name, last_name, gender, membership_number,  institution_id, nid_or_passport, fathers_name, mother_name, spouse_name, number_of_children, present_line_1, present_line_2, present_city_or_district, present_post_code, present_country, parmanent_line_1, parmanent_line_2, parmanent_post_code, parmanent_country, parmanent_city_or_district, profession, designation, institution , mobile ,  email, blood_group, date_of_birth , type , password )" ; 



$sql = "insert into users (`first_name`) values (?)";

mysqli_stmt_init($conn);
$stmt =  mysqli_bind_param($conn , $first_name);




if (mysqli_query($stmt, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);















?>
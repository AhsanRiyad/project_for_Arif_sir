<?php 

include "../address.php";


include $APP_ROOT.'assets/linker/db.php' ; 


/*$first_name =  $_REQUEST['first_name'];
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
$type = 'users';
$password = $_REQUEST['password'];*/

$conn = get_mysqli_connection();

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
$type = 'user';
$password = mysqli_real_escape_string( $conn ,$_REQUEST['password']);

//echo print_r($_REQUEST);


// $sql =  "INSERT INTO `users`(`first_name`, `middle_name`, `last_name`, `gender`, `membership_number`,  `institution_id`, `nid_or_passport`, `fathers_name`, `mother_name`, `spouse_name`, `number_of_children`, `present_line_1`, `present_line_2`, `present_city_or_district`, `present_post_code`, `present_country`, `parmanent_line_1`, `parmanent_line_2`, `parmanent_post_code`, `parmanent_country`, `parmanent_city_or_district`, `profession`, `designation`, `institution` , `mobile`  `email`, `blood_group`, `date_of_birth` , `type` , `password`) VALUES ( first_name, middle_name, last_name, gender, membership_number,  institution_id, nid_or_passport, fathers_name, mother_name, spouse_name, number_of_children, present_line_1, present_line_2, present_city_or_district, present_post_code, present_country, parmanent_line_1, parmanent_line_2, parmanent_post_code, parmanent_country, parmanent_city_or_district, profession, designation, institution , mobile ,  email, blood_group, date_of_birth , type , password )" ; 

$stmt = $conn->prepare('INSERT INTO USERS (`FIRST_NAME` , `middle_name` , `last_name` , `gender` , `institution_id` , `nid_or_passport` , `fathers_name` , `mother_name` , `spouse_name` , `number_of_children` , `present_line_1` , `present_line_2` , present_city_or_district , present_post_code , present_country  , `parmanent_line_1` , `parmanent_line_2` , parmanent_city_or_district , parmanent_post_code , parmanent_country  ,  profession, designation, institution , mobile ,  email, blood_group, date_of_birth , type , password ) VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?  , ? , ? , ? , ? , ?  , ? , ? , ? , ? , ? , ? , ?  , ? , ? )');


$stmt->bind_param('sssssssssisssssssssssssisssss', $first_name , $middle_name , $last_name , $gender , $institution_id , $nid_or_passport ,  $fathers_name ,  $mother_name , $spouse_name , $number_of_children , $present_line_1 , $present_line_2 , $present_city_or_district , $present_post_code , $present_country , $parmanent_line_1 , $parmanent_line_2 , $parmanent_city_or_district , $parmanent_post_code , $parmanent_country ,  $profession, $designation, $institution , $mobile ,  $email, $blood_group, $date_of_birth  , $type , $password ); 

// 's' specifies the variable type => 'string'


/*$stmt = $conn->prepare('INSERT INTO USERS (`first_name` , `middle_name` , `last_name` , `gender` , `institution_id` , `nid_or_passport` , `fathers_name` , `mother_name` , `spouse_name` , `number_of_children` , `present_line_1` , `present_line_2` , present_city_or_district , present_post_code , present_country , `parmanent_line_1` , `parmanent_line_2` , parmanent_city_or_district , parmanent_post_code , parmanent_country , profession , designation , institution , mobile , email , blood_group , date_of_birth , type , password ) VALUES ( :first_name , :middle_name , :last_name , :gender , :institution_id , :nid_or_passport , :fathers_name , :mother_name , :spouse_name , :number_of_children , :present_line_1 , :present_line_2 ,   :present_city_or_district , :present_post_code , :present_country , :parmanent_line_1 , :parmanent_line_2 ,   :parmanent_city_or_district , :parmanent_post_code , :parmanent_country , :profession , :designation , :institution , :mobile , :email , :blood_group , :date_of_birth , :type , :password  )');



$stmt->bindValue( ':first_name' ,  $first_name );
$stmt->bindValue( ':last_name' ,  $last_name );
$stmt->bindValue( ':middle_name' ,  $middle_name );

$stmt->bindValue( ':gender' ,  $gender );
$stmt->bindValue( ':institution_id' ,  $institution_id );
$stmt->bindValue( ':nid_or_passport' ,  $nid_or_passport );

$stmt->bindValue( ':fathers_name' ,  $fathers_name );
$stmt->bindValue( ':mother_name' ,  $mother_name );
$stmt->bindValue( ':spouse_name' ,  $spouse_name );
$stmt->bindValue( ':number_of_children' ,  $number_of_children );

$stmt->bindValue( ':present_line_1' ,  $present_line_1 );
$stmt->bindValue( ':present_line_2' ,  $present_line_2 );
$stmt->bindValue( ':present_city_or_district' ,  $present_city_or_district );
$stmt->bindValue( ':present_post_code' ,  $present_post_code );
$stmt->bindValue( ':present_country' ,  $present_country );

$stmt->bindValue( ':parmanent_line_1' ,  $parmanent_line_1 );
$stmt->bindValue( ':parmanent_line_2' ,  $parmanent_line_2 );
$stmt->bindValue( ':parmanent_city_or_district' ,  $parmanent_city_or_district );
$stmt->bindValue( ':parmanent_post_code' ,  $parmanent_post_code );
$stmt->bindValue( ':parmanent_country' ,  $parmanent_country );

$stmt->bindValue( ':profession' ,  $profession );
$stmt->bindValue( ':designation' ,  $designation );
$stmt->bindValue( ':institution' ,  $institution );
$stmt->bindValue( ':mobile' ,  $mobile );
$stmt->bindValue( ':email' ,  $email );
$stmt->bindValue( ':blood_group' ,  $blood_group );

$stmt->bindValue( ':date_of_birth' ,  $date_of_birth );
$stmt->bindValue( ':type' ,  $type );
$stmt->bindValue( ':password' ,  $password );
*/


$stmt->execute();

/*$result = $stmt->get_result();*/
/*while ($row = $result->fetch_assoc()) {
    // Do something with $row
}*/


// $conn = null;
mysqli_close($conn);


?>
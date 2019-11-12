<?php 
$pageName = 'vue_test';
//$APP_ROOT = "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/";
//include $APP_ROOT."assets\linker\linkerCss.php" ; 
include "../address.php"; 
include $APP_ROOT.'assets/linker/db.php' ; 

include $linkerCss;
?>

<?php 




$email = 'riyad298@gmail.com';
$conn = get_mysqli_connection();
$sql = "select count(*) as count from user_photos where  email = (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s' , $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
print_r($row['count']);
$stmt->close();
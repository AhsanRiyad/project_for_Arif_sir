<?php 
include '../controller/controllerRootPath.php';
include APP_ROOT.'lib/linker_files/linkerForController.php';



header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
// echo $obj->email;
$sql = "UPDATE `user` SET `email`='$obj->email',`mobile`='$obj->mobileNumber',`dob`='$obj->dob', `password`='$obj->password'  WHERE id=$obj->id";


$statusResult = mysqli_query($conn, $sql);

// $result = mysqli_query($conn, $sql);
$sql = "SELECT * FROM `user` WHERE id=$obj->id";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$sArray = $row;
//echo json_encode($row);
$_SESSION['UserInfo'] = $row;
echo 'Profile Updated';
mysqli_close($conn);
?>

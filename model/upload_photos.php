<?php 

include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 


//echo bin2hex(random_bytes(32));
$target_dir = $APP_ROOT."assets/img/uploads/current_photos/";

$base_name = basename($_POST["purpose"].$_FILES["current_photo"]["name"]);

$target_file = $target_dir . basename($_POST["purpose"].$_FILES["current_photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

$email = $_POST['email'];
// Check if file already exists
if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	
	unlink($target_file);
	//$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["current_photo"]["tmp_name"], $target_file)) {

		$conn = get_mysqli_connection();
		$sql = "UPDATE `user_uploads` SET `recent_photo`=(?) WHERE email = (?)";
		$stmt = $conn->prepare($sql);




		$stmt->bind_param('ss' ,  $base_name , $email);
		$stmt->execute();   

		$stmt->close();
		$conn->close();



		echo "The file ". basename( $_FILES["current_photo"]["name"]). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}


//echo $target_file;


















?>
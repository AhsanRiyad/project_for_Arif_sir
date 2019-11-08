<?php 

include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 


if (!empty($_POST['csrf_token1'])) {
	if (hash_equals($_SESSION['csrf_token1'], $_POST['csrf_token1'])) {



		if($_POST['purpose']=='upload_current_photo'){
			$target_dir = $APP_ROOT."assets/img/uploads/current_photos/";
			$base_name = basename($_POST["email"].$_FILES["current_photo"]["name"]);
			$target_file = $target_dir . basename($_POST["email"].$_FILES["current_photo"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$email = $_POST['email'];
			if (file_exists($target_file)){ 
				unlink($target_file);
			}
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			} else {
				if (move_uploaded_file($_FILES["current_photo"]["tmp_name"], $target_file)) {

					$conn = get_mysqli_connection();
					$sql = "call current_photo( ? , ? , @result )";
					$stmt = $conn->prepare($sql);
					$stmt->bind_param('ss' , $base_name , $email );
					$stmt->execute();
					$stmt->close();
					$sql = 'select @result as st'; 
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);
					if (file_exists($target_dir.$row['st'])) {
						unlink($target_dir.$row['st']);
					}
					$conn->close();
					echo $row['st'];
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}	
		} else {
			trigger_error('You are not authorized');
		}
	}



}




?>
<?php 

include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 


if (!empty($_POST['csrf_token1'])) {
	if (hash_equals($_SESSION['csrf_token1'], $_POST['csrf_token1'])) {

		$purpose_type =  $_POST['purpose'];


		$target_dir = $APP_ROOT."assets/img/uploads/".$purpose_type."s/";
		$base_name = basename($_POST["email"].$_FILES[$purpose_type]["name"]);
		$target_file = $target_dir . basename($_POST["email"].$_FILES[$purpose_type]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$email = $_POST['email'];
		if (file_exists($target_file)){ 

			if($purpose_type == 'group_photo'){
				$target_file = $target_dir . basename($_POST["email"].'_1'.$_FILES[$purpose_type]["name"]);
			}else{
				unlink($target_file);
			}
			
		}
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES[$purpose_type]["tmp_name"], $target_file)) {

				$conn = get_mysqli_connection();
				$sql = "call upload_photo( ? , ? , ? , @result )";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('sss' , $purpose_type ,  $base_name , $email );
				$stmt->execute();
				$stmt->close();
				$sql = 'select @result as st'; 
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				if (file_exists($target_dir.$row['st'] && $purpose_type == 'group_photo')) {
					unlink($target_dir.$row['st']);
				}
				$conn->close();
				echo $row['st'];
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}	
		
	}else {
		trigger_error('You are not authorized');
	}



}




?>
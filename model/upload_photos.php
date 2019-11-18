<?php 

include "../address.php";
include $APP_ROOT.'assets/linker/db.php' ; 




		$purpose_type =  $_POST['purpose'];
		$conn = get_mysqli_connection();

		$target_dir = $APP_ROOT."assets/img/uploads/".$purpose_type."s/";
		$target_file1 = $target_dir . basename($_FILES[$purpose_type]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
		$target_file = $target_dir . basename($_POST["email"].'.'.$imageFileType);
		$base_name = basename($_POST["email"].'.'.$imageFileType);
		$email = $_POST['email'];
		if (file_exists($target_file)){ 

			//unlink($target_file);

				// $purpose_type == 'group_photo' ? $target_file = $target_dir . basename($_POST["email"].'_1'.$imageFileType)  : unlink($target_file); 

			if($purpose_type == 'group_photo'){
					// $target_file = $target_dir . basename($_POST["email"].'_1.'.$imageFileType);



				//$email = $email__;
				$conn = get_mysqli_connection();
				$sql = "select count(*) as count from user_photos where  email = (?)";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('s' , $email);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result>fetch_assoc();
				// print_r($row['count']);
				$count = $row['count'];
				$stmt->close();







				$newName = basename($_POST["email"].'_'.++$count.'.');
					// $base_name = basename($_POST["email"].'_1.'.$imageFileType);
				$base_name = $newName.$imageFileType;
				$target_file = $target_dir . $base_name;
			}else{
				unlink($target_file); 
			}

			
		}
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES[$purpose_type]["tmp_name"], $target_file)) {

				
				$sql = "call upload_photo( ? , ? , ? , @existing_file_name , @result )";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('sss' , $purpose_type ,  $base_name , $email );
				$stmt->execute();
				$stmt->close();
				$sql = 'select @existing_file_name as st , @result as rs'; 
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				if (file_exists($target_dir.$row['st']) && $purpose_type!='group_photo' && $row['st']!='not_set') {
					unlink($target_dir.$row['st']);
				}
				$conn->close();
				echo $row['rs'];
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}	
		
	



?>
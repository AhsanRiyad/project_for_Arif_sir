<?php 




function dbGetUserDetails($email){

	$conn = get_mysqli_connection();
	$sql = 'select * from users_registration ur , users_info ui , users_address ua , verification_info  vi ,  user_uploads uu where uu.email = ur.email and ui.email = ur.email and  ua.email = ur.email and vi.email = ur.email and  ur.email ='.'"'.$email.'"';  
	$result = mysqli_query($conn, $sql);
	$row1 = mysqli_fetch_assoc($result);
	$_SESSION['users_info'] = $row1;	
	$conn->close();


}




if(isset($_SESSION['users_info'])){

	dbGetUserDetails($_SESSION['users_info']['email']);

	$login__ = true;


	$profile_photo = $rootAdress."assets/img/uploads/recent_photos/".$_SESSION['users_info']['recent_photo'];

	if($_SESSION['users_info']['type'] =='user' ){
		/*if($pageName == 'add_user' || $pageName == 'reg_req' ){
		header('location:'.$not_authorisedPage);
			
	}*/

	$user__ = true;


	if($_SESSION['users_info']['status'] =='approved' ){

		$verified__ = true;
	}



}else if($_SESSION['users_info']['type'] =='admin'){
	$admin__ = true;
}

}else{

	$login__ = false;
	$admin__ = false;
	$user__ = false;
	$verified__ = false;

	/*if($pageName != 'login' || $pageName != 'registration' || $pageName != 'forgot_password' ){
		header('location:'.$not_authorisedPage);
	}*/

}



if($login__ == true){

	if($user__ == true){

		if($verified__ == true ){

			if($pageName == 'reg_req' || $pageName == 'add_user'){	
				header('location:'.$profilePage);
			}

		}else{

			if($pageName != 'profile'){	
				header('location:'.$profilePage);
			}

		}

	}else if($admin__ == true){

	}


}else if($login__ == false){

	if($pageName == 'profile' || $pageName == 'add_user' || $pageName == 'gallery' || $pageName == 'search' || $pageName == 'privacy' || $pageName == 'gallery'  || $pageName == 'reg_req' ){

		header('location:'.$loginPage);
	}

}



?>
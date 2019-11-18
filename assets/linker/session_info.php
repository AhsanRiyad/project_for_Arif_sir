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

	if($_SESSION['users_info']['type'] !='admin' ){
		if($pageName == 'add_user' || $pageName == 'reg_req' ){
		header('location:'.$not_authorisedPage);
			
		}

	}else{
		$admin__ = true;
	}

}else{

	if($pageName == 'profile' ){
		header('location:'.$not_authorisedPage);
	}

}


?>
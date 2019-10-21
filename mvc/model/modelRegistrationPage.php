<?php
$gender = "";
$first_name = "";
$last_name = "";
$email = "";
$countFirstName = 0;
$countLastName = 0;
$countEmail = 0;
$countMobile = 0;
$countPass = 0;
$countGender = 0;
$countDob = 0;
$countToc = 0;
$msg = '';

//    first name validation
function first_name_validation() {
	if (isset($_POST['submit'])) {
		$first_name = $_POST['first_name'];
		if ($first_name == "") {
			
			return 'name can not be empty';
			echo '<br>';
		} else {
			if (strlen($first_name) < 2) {
				
				return 'is too short';
				echo '<br>';
			} else {
				if (is_numeric(substr($first_name, 0, 1)) || substr($first_name, 0, 1) == '.' || substr($first_name, 0, 1) == '-') {
					$GLOBALS['countFirstName'] = 2;
					return 'First character can not be numeric or character';
					echo '<br>';
				} else {



					$first_name_array = str_split($first_name, 1);

					foreach ($first_name_array as $value) {

						if ($value == 'a' || $value == 'b' || $value == 'c' || $value == 'd' || $value == 'e' || $value == 'f' || $value == 'g' || $value == 'h' || $value == 'i' || $value == 'j' || $value == 'k' || $value == 'l' || $value == 'm' || $value == 'n' || $value == 'o' || $value == 'p' || $value == 'q' || $value == 'r' || $value == 's' || $value == 't' || $value == 'u' || $value == 'v' || $value == 'w' || $value == 'x' || $value == 'y' || $value == 'z' || $value == 'A' || $value == 'B' || $value == 'C' || $value == 'D' || $value == 'E' || $value == 'F' || $value == 'G' || $value == 'H' || $value == 'I' || $value == 'J' || $value == 'K' || $value == 'L' || $value == 'M' || $value == 'N' || $value == 'O' || $value == 'P' || $value == 'Q' || $value == 'R' || $value == 'S' || $value == 'T' || $value == 'U' || $value == 'V' || $value == 'W' || $value == 'X' || $value == 'Y' || $value == 'Z' || $value == '.' || $value == '-') {

						} else {
							
							return 'Invalid character';
							echo '<br>';
							break;
						}
					}
				}
			}
		}
	} else {
		
		return "";
	}
}

//    last name validation
function last_name_validation() {
	if (isset($_POST['submit'])) {
		$last_name = $_POST['last_name'];
		if ($last_name == "") {
			return 'name can not be empty';
			echo '<br>';
		} else {

			if (strlen($last_name) < 2) {
				return 'is too short';
				echo '<br>';
			} else {
				if (is_numeric(substr($last_name, 0, 1)) || substr($last_name, 0, 1) == '.' || substr($last_name, 0, 1) == '-') {
					return 'Last character can not be numeric or character';
					echo '<br>';
				} else {

					$last_name_array = str_split($last_name, 1);

					foreach ($last_name_array as $value) {

						if ($value == 'a' || $value == 'b' || $value == 'c' || $value == 'd' || $value == 'e' || $value == 'f' || $value == 'g' || $value == 'h' || $value == 'i' || $value == 'j' || $value == 'k' || $value == 'l' || $value == 'm' || $value == 'n' || $value == 'o' || $value == 'p' || $value == 'q' || $value == 'r' || $value == 's' || $value == 't' || $value == 'u' || $value == 'v' || $value == 'w' || $value == 'x' || $value == 'y' || $value == 'z' || $value == 'A' || $value == 'B' || $value == 'C' || $value == 'D' || $value == 'E' || $value == 'F' || $value == 'G' || $value == 'H' || $value == 'I' || $value == 'J' || $value == 'K' || $value == 'L' || $value == 'M' || $value == 'N' || $value == 'O' || $value == 'P' || $value == 'Q' || $value == 'R' || $value == 'S' || $value == 'T' || $value == 'U' || $value == 'V' || $value == 'W' || $value == 'X' || $value == 'Y' || $value == 'Z' || $value == '.' || $value == '-') {

						} else {
							return 'Invalid character';
							echo '<br>';
							break;
						}
					}
				}
			}
		}
	} else {
		return "";
	}
}

//    email validation
function email_validation() {
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		if ($email == "") {
			return 'can not be empty';
			echo '<br>';
		} else {
			$email_array = str_split($email, 1);
			$email_explode = explode('@', $email);
			if (strlen($email) < 10) {
				return 'is too short';
				echo '<br>';
			} elseif (!in_array('@', $email_array)) {
				return '@ symbol missing';
			} elseif (strlen($email_explode[0]) < 5) {
				return 'you must write smth before @ symbol';
				echo '<br>';
			} elseif (substr($email, -3, 1) == '.' || substr($email, -4, 1) == '.') {


				if (is_numeric(substr($email, 0, 1)) || substr($email, 0, 1) == '.' || substr($email, 0, 1) == '-') {
					return 'Last character can not be numeric or character';
					echo '<br>';
				} else {
					foreach ($email_array as $value) {

						if ($value == 'a' || $value == 'b' || $value == 'c' || $value == 'd' || $value == 'e' || $value == 'f' || $value == 'g' || $value == 'h' || $value == 'i' || $value == 'j' || $value == 'k' || $value == 'l' || $value == 'm' || $value == 'n' || $value == 'o' || $value == 'p' || $value == 'q' || $value == 'r' || $value == 's' || $value == 't' || $value == 'u' || $value == 'v' || $value == 'w' || $value == 'x' || $value == 'y' || $value == 'z' || $value == 'A' || $value == 'B' || $value == 'C' || $value == 'D' || $value == 'E' || $value == 'F' || $value == 'G' || $value == 'H' || $value == 'I' || $value == 'J' || $value == 'K' || $value == 'L' || $value == 'M' || $value == 'N' || $value == 'O' || $value == 'P' || $value == 'Q' || $value == 'R' || $value == 'S' || $value == 'T' || $value == 'U' || $value == 'V' || $value == 'W' || $value == 'X' || $value == 'Y' || $value == 'Z' || $value == '.' || $value == '-' || $value == '0' || $value == '1' || $value == '2' || $value == '3' || $value == '4' || $value == '5' || $value == '6' || $value == '7' || $value == '8' || $value == '9' || $value == '@' || $value == '_') {

						} else {
							return 'Invalid character';
							echo '<br>';
						}
					}
				}
			} else {
				return 'must be under a domain, for example .com or .net etc ';
				echo '<br>';
			}
		}
	}
}

//gender validation
function gender_validation() {
	if (isset($_POST['submit'])) {

		if (!isset($_POST['gender']) || $_POST['gender'] == 'Gender' ) {
			return 'Select one*';
			echo '<br>';
		} else {
			$GLOBALS['gender'] = $_POST['gender'];
		}
	} else {

		return "";
	}
}

//password validation
function password_validation() {
	if (isset($_POST['submit'])) {
		if ($_POST['password'] == "" || $_POST['confirm_password'] == "") {
			return 'You must enter and confirm password';
			echo '<br>';
		} else {
			if ($_POST['password'] != $_POST['confirm_password']) {
				return 'password does not match';
				echo '<br>';
			}
		}
	} else {
		return "";
	}
}

//phone number validation
function phone_validation() {
	if (isset($_POST['submit'])) {
		if ($_POST['phone'] == "") {
			return 'no. can not be empty';
			echo '<br>';
		} else {
			$phone_array = str_split($_POST['phone'], 1);
			foreach ($phone_array as $value) {
				if ($value == '+' || $value == '0' || $value == '1' || $value == '2' || $value == '3' || $value == '4' || $value == '5' || $value == '6' || $value == '7' || $value == '8' || $value == '9') {
					if (strlen($_POST['phone']) < 11) {
						return 'too short';
						echo '<br>';
						break;
					}
				} else {
					return 'invalid character used';
					echo '<br>';
					break;
				}
			}
		}
	}
}

//date validation
function date_validation() {
	if (isset($_POST['submit'])) {
		if ($_POST['day'] == 'Day') {
			return 'select day*';
			echo '<br>';
		} elseif ($_POST['month'] == 'Month') {
			return 'select month*';
			echo '<br>';
		} elseif ($_POST['year'] == 'Year') {
			return 'select year*';
			echo '<br>';
		}
	} else {
		return "";
	}
}


// toc validation
function toc_validation(){
	if (isset($_POST['submit'])) {
		if(!isset($_POST['toc']))
		{
			return "you must agree";
		}
		else {
			return "";
		}



	}
}

// check database function
function checkDB(){
	if ($GLOBALS['countFirstName']== 2 && $GLOBALS['countLastName'] == 2 && $GLOBALS['countMobile'] == 2 && $GLOBALS['countEmail'] == 2 && $GLOBALS['countDob'] == 2 && $GLOBALS['countGender'] == 2 && $GLOBALS['countToc'] == 2) {
		$month = 0;
		if(isset($_POST['submit']))
		{
			if($_POST['month']=='Jan')
			{
				$month = 1;

			}
			if($_POST['month']=='Feb')
			{
				$month = 2;

			}
			if($_POST['month']=='Mar')
			{
				$month = 3;

			}
			if($_POST['month']=='Apr')
			{
				$month = 4;

			}
			if($_POST['month']=='May')
			{
				$month = 5;

			}
			if($_POST['month']=='Jun')
			{
				$month = 6;

			}
			if($_POST['month']=='Jul')
			{
				$month = 7;

			}
			if($_POST['month']=='Aug')
			{
				$month = 8;

			}
			if($_POST['month']=='Sep')
			{
				$month = 9;

			}
			if($_POST['month']=='Oct')
			{
				$month = 10;

			}
			if($_POST['month']=='Nov')
			{
				$month = 11;

			}
			if($_POST['month']=='Dec')
			{
				$month = 12;

			}


			$firstName = $_POST['first_name'];
			$lastName = $_POST['last_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$gender = $_POST['gender'];
			$type = 'User';
			$mobile = $_POST['phone'];
			$date = $_POST['year'].'-'.$month.'-'.$_POST['day'];			

			$sql = "INSERT INTO `user`(`firstName`, `lastName`, `email`, `mobile`, `dob`, `gender`, `password`, `type`) VALUES ('$firstName','$lastName','$email','$mobile','$date','$gender','$password', '$type')";


			try{

				if(!mysqli_query($GLOBALS['conn'] , $sql))
				{
					throw new Exception("Duplicate Email");					
				}
				return 'successful';				
			}
			catch(Exception $e)
			{
				return $e->getMessage();
			}
			
			// if(mysqli_query($GLOBALS['conn'] , $sql))
			// {

			// 	mysqli_close($GLOBALS['conn']);
			// 	return 'successful';
			// }
			// else{
			// 	return 'failed';
			// }


		//echo $sql;


		}
		

		



	}
}


?>
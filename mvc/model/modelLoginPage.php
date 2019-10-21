<?php 

$countPass = 0;
$countEmail = 0;
$msg = '';

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


//password validation
function password_validation() {
	if (isset($_POST['submit'])) {
		if ($_POST['password'] == "") {
			return 'You must enter and confirm password';
			echo '<br>';

		} else {
			return "";
		}
	}
}


function checkDB()
{
	if(isset($_POST['submit']))
	{	
		if ($GLOBALS['countEmail'] == 2 && $GLOBALS['countPass']) {
			$email = $_POST['email'];
			$password = trim($_POST['password']);
			
			$sql = "SELECT `id`, `firstName`, `lastName`, `email`, `mobile`, `dob`, `gender`, `password`, `type` FROM `user` WHERE email = '$email' and  password = '$password'";

			$result = mysqli_query($GLOBALS['conn'], $sql);
			$row = mysqli_fetch_assoc($result);
			mysqli_close($GLOBALS['conn']);
			if($row['email'] == $email && $row['password'] == $password)
			{
				$_SESSION['UserInfo'] = $row;
				return 'successful';
			}
			else{
				return 'login failed';
			}			
		}else{
			return 'failed';
		}

	}
}


?>
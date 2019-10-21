
<?php 

session_start();

if (isset($_POST['submit'])) {
	
$conn = mysqli_connect($hostName, $userName, $password , $databaseName);

$sArray = $_SESSION[$SessionCheckUserInfo];	
$date = date("Y-m-d H:i:s");

$email = $sArray['email'];
$sql = "INSERT INTO `orderproduct`( `orderDate`, `orderStatus`, `userId`) VALUES ('$date','pending','$email')";

$result = mysqli_query($conn, $sql);
mysqli_close($conn);
$conn = mysqli_connect($hostName, $userName, $password , $databaseName);
$date = $date.'.000000';
$sql = "SELECT `orderId`, `orderDate`, `orderStatus`, `userId` FROM `orderproduct` WHERE userId='$email' and orderDate='$date'";
	//echo $sql;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
mysqli_close($conn);
$orderId = $row['orderId'];
	echo $orderId; //var1



	$conn = mysqli_connect($hostName, $userName, $password , $databaseName);

	$sql = "SELECT * FROM `cart` WHERE userId='$email'";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);

	$conn = mysqli_connect($hostName, $userName, $password , $databaseName);


	while($row = mysqli_fetch_assoc($result)){

		$productId=$row['productId'];
		$quantity = $row['quantity'];
		$sellerId = $row['sellerId'];
		$email=$sArray['email'];



		$sql = "INSERT INTO `contains`(`orderId`, `productId`, `perProductQuantity`, `sellerId`, `userId`) VALUES ($orderId,$productId,$quantity,'$sellerId','$email')";


		mysqli_query($conn, $sql);
	
	}

}
?>
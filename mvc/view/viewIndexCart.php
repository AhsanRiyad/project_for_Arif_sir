<?php 
$sArray = $_SESSION[$SessionCheckUserInfo];	
$email = $sArray['email'];
$sql = "SELECT * FROM `cart` WHERE userId='$email'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
$productCart = 0;
$totalPrice = 0;
?>
<?php 

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
	$conn = mysqli_connect($hostName, $userName, $password , $databaseName);
	$sql = "DELETE FROM `cart` WHERE `userId`='$email'";
	mysqli_query($conn, $sql);
}
?>

<div class="container">
	
	<?php 
	if(isset($_POST['submit']))
	{
		echo  "<h3 class='text-success'>Congratz! your order is confirmed! <br>
		nohting to display in the cart.
		</h3>";
	}
	?>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				
				<th scope="col">Name</th>
				<th scope="col">Short Description</th>
				<th scope="col">Quantity</th>
				<th scope="col">Price</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			while($row = mysqli_fetch_assoc($result)){
				$productCart++;
				$totalPrice += $row['price']*$row['quantity'];
				?>
				<tr>
					<th scope="row"><?php echo $productCart; ?></th>

					<td><?php echo $row['productName']; ?></td>
					<td><?php echo $row['descripition']; ?></td>
					<td><?php echo $row['quantity']; ?></td>
					<td><?php echo $row['price']*$row['quantity']; ?></td>
				</tr>
				<?php 

			}
			?>
				<tr>
					<th scope="row"></th>
					<td></td>
					<td></td>
					<td>Total Amount:</td>
					<td><?php echo $totalPrice; ?></td>


				</tr>
				
				

		</tbody>
	</table>

	<hr>
	<?php if($productCart<1){ echo  "<h6 class='text-danger'>please add some products to cart to buy.
		</h6>"; } ?>
	<form action="#" method="post">
		<input <?php if($productCart<1){ echo 'disabled'; } ?>
		 href="confirmOrder.php" class="text-dark btn btn-warning" type="submit" value="confirm order" name="submit">
	</form>
	<a href="<?php echo $indexUrl; ?>" class="btn btn-info">Continue Shopping</a>
</div>

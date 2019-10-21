<?php
	
	if( isset($_POST['submit'])){
		$isbn 	= trim($_POST['nameInputIsbnProductPageSeller']); 
		$name 	= trim($_POST['nameInputNameProductPageSeller']);
		$price 	= trim($_POST['nameInputPriceProductPageSeller']);
		$category = trim($_POST['nameInputCategoryProductPageSeller']);
		$quantity = trim($_POST['nameInputQuantityProductPageSeller']);
		$description = trim($_POST['nameInputDescriptionProductPageSeller']);

		$sellerId = "riyad123@gmail.com";
	
		if($isbn == "" || $name == "" || $price == "" || $category == "" || $quantity == "" || $description == ""){
			echo "Null found!";
		}else{
		 	$date = date("Y-m-d");


		 	$sql = "INSERT INTO `product`(`isbn`, `sellerId`, `name`, `price`, `category`, `total`, `description`, `date`) VALUES ('$isbn','$sellerId','$name',$price,'$category',$quantity,'$description','$date')";

		 	mysqli_query($conn,$sql);
		 	mysqli_close($conn);
		}
	}
	
?>
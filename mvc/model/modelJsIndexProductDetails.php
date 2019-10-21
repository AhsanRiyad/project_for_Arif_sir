<script>

	

	function jsFuntionAddToCart(event){

		var x = document.getElementsByName("productQuantity");
		var quantity = x[0].value;


		<?php 
		$sArray = $_SESSION[$SessionCheckUserInfo];	
		?>



		jsProfileInfo = {  email: '<?php echo $sArray['email']; ?>' , quantity: quantity , productId : <?php echo $id; ?> , price: <?php echo $row['price']; ?> , description : '<?php echo $row['description']; ?>' , productName : '<?php echo $row['name']; ?>' };

		jsonStringDbParam = JSON.stringify(jsProfileInfo);	

		console.log(jsonStringDbParam);


		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var myObj = JSON.parse(this.responseText);
				alert('Added to Cart');
				var obj = document.getElementById('idIndexCartQuantity');
				obj.innerHTML = myObj[0];

			}
		};

		<?php 
		$ajaxUrlProductCart = $rootAdress."mvc/model/modelAjaxIndexAddToCart.php";
		?>

		

		xhttp.open("POST", "<?php  echo $ajaxUrlProductCart; ?>", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send('x=' + jsonStringDbParam);




	}


</script>
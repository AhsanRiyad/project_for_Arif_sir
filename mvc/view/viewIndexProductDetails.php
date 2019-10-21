<div class="container">
	<div class="row justify-content-center">
		<div class="col-4">
			<img class="img-fluid" src=<?php echo $indexProductImageUrl; ?> alt="">
			<hr>
			<h3>Name: <?php echo $row['name']; ?></h3>
			<h4>Price: <?php echo $row['price']; ?></h4>
			<h5>Description: <?php echo $row['description']; ?></h5>

			<h6><?php if($loginStatus == false)
			{
				echo "<h6 class='text-danger'>Please log in to buy</h6>";
			} ?></h6>
			
			<b>Quantity:  </b>



			<select class="px-4 disabled" <?php if($loginStatus == false)
			{
				echo 'disabled bg-danger';
			} ?> name="productQuantity">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
		</select>

		<div>
			<a onclick="jsFuntionAddToCart(this)" href="#" class="btn btn-success mb-3 mt-2 <?php if($loginStatus == false)
			{
				echo 'disabled bg-danger';
			} ?>" >Add to Cart</a>
		</div>
	</div>
</div>
</div>



<!--product category added -->
<div class="container-fluid">
	<div class="row bg-light ">
		<div class="col">
			<div class="container">
				<div class="row">
					<a class="text-dark" href="#"><h3 class="pt-5">Categories</h3></a>
					<div class="w-100"></div>

					
					<?php 
					for($i=0; $i<16; $i++)
					{
					?>

					<div class="image_div text-info text-center text-info"
					onclick="location.href='category_detail.php';"

					><img class="imageOverlay2" src="lib/img/cat1.jpg" alt=""> <br> <p>Mobile</p> </div>
					
					<?php 
					}

					 ?>					
				</div>
			</div>
		</div>
	</div>
</div>
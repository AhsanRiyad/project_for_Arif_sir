<!--New product category added -->
<div class="container-fluid">
	<div class="row bg-light">
		<div class="col">
			<div class="container">
				<div class="row pt-5">
					<a class="text-dark" href="#"><h3>Just In</h3></a>
					<div class="w-100"></div>


					<?php 
					for($i = 0 ; $i<12 ; $i++)
					{
					?>

					<div class="col-xl-2 col-6  mt-xl-2 mt-3" >
						<div onclick="location.href='<?php echo $indexPageProductDetailsUrl; ?>';" class="w_p bg-white ">
							<img class="img-fluid" src="lib/img/cat1.jpg" alt="">

							<div class="w-100 pl-2">
								<h6>Mobile phones</h6>
								<h6 class="text-danger">$2490</h6>
								<p class="text-danger mb-0"> 
									<strike class="text-muted">$5000
									</strike>
									<small class="text-muted"> 39%</small>
								</p>
								<div class="w-100 mt-0 pb-3">
									
									<span class="fa fa-star text-warning"></span>
									<span class="fa fa-star text-warning"></span>
									<span class="fa fa-star text-warning"></span>
									<span class="fa fa-star text-warning"></span>
									<span class="fa fa-star"></span>
									
								</div>
								

							</div>

						</div>
						
					</div>

					<?php 
					}
					 ?>



				</div>
			</div>
		</div>
	</div>
</div>

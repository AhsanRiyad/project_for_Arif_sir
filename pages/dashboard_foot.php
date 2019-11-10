
		</div>




		<div class="col-2 order-1 dashboard_vertical_menu_height">
			<!-- fixed vertical -->
			<div class=" bg-dark ">
				<div class=" bg-light d-flex justify-content-center">
					<a href=><img class=" py-1" src="<?php echo $logoSrc; ?>" alt=""></a>

				</div>
				<a class="text-white" href=>
					<div class=" 
					<?php 

					if($pageName=='dashboardHome')
					{
						echo 'bg-info';
					}
					else{
						echo 'bg-secondary';
					}
					?> 

					py-2 text-center my-4">

					<i class="fas w_f fa-tachometer-alt"></i> View Users

				</div></a>

				<a class="text-white" href="<?php echo $add_user; ?>">
					<div class=" bg-secondary py-2 text-center my-4">

						<i class="fas w_f fa-chart-line"></i> Add Users

					</div></a>


					<a class="text-light" href="<?php echo $profilePage; ?>">
						<div class="  
						<?php 

						if($pageName=='dashboardProfile' || $pageName=='dashboardProfileUpdate')
						{
							echo 'bg-info';
						}
						else{
							echo 'bg-secondary';
						}
						?> 
						py-2 text-center my-4">

						<i class="fas w_f fa-user"></i> Profile

					</div></a>


					<a class="text-light" href="<?php echo $reg_req; ?>">
						<div class="  
						<?php 

						if($pageName=='addProductBySeller')
						{
							echo 'bg-info';
						}
						else{
							echo 'bg-secondary';
						}
						?> 
						py-2 text-center my-4">

						<i class="fas fa-shopping-cart"></i> User Request

					</div></a>


					<a class="text-white" href="<?php echo $privacyPage; ?>">
						<div class="  bg-secondary py-2 text-center my-4">

							<i class="fas w_f fa-envelope"></i> Privacy

						</div></a>


						<a class="text-white" href="#">
							<div class="  bg-secondary py-2 text-center my-4">

								<i class="fab fa-product-hunt"></i> New Product Request

							</div></a>

							<a class="text-white" href=>
								<div class="  bg-success py-2 text-center my-4">

									<i class="fas fa-shopping-cart"></i> Back to Shop Page

								</div></a>

								<a class="text-white" href="<?php echo $loginPage; ?>">
									<div class="  bg-danger py-2 text-center my-4">

										<i class="fas fa-sign-out-alt"></i>Sign Out

									</div></a>

						</div>		
						</div>
					</div>

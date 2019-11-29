







</div>




<div class="col-2 order-1 dashboard_vertical_menu_height">
	<!-- fixed vertical -->
	<div class=" bg-dark ">
		<div class=" bg-light d-flex justify-content-center">
			<a href="#"><img class=" py-1" src="<?php echo $logoSrc; ?>" alt=""></a>

		</div>
	

		<?php 

		if($admin__ == true){
			?>

			<a class="text-white" href="<?php echo $add_user; ?>">
				<div class=" 

				<?php 

				if($pageName=='add_user')
				{
					echo 'bg-info';
				}
				else{
					echo 'bg-secondary';
				}
				?>  

				py-2 text-center my-4">

				<i class="fas w_f fa-chart-line"></i> Add Users

			</div></a>

			<?php 
		}
		?>

		<?php 
		if($admin__ == true || $user__ == true){
			?>
			<a class="text-light" href="<?php echo $profile_basicPage; ?>">
				<div class="  
				<?php 

				if($pageName=='profile')
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
			<?php 
		}
		?>


		<a class="text-light" href="<?php echo $searchPage; ?>">
			<div class="  
			<?php 

			if($pageName=='search' )
			{
				echo 'bg-info';
			}
			else{
				echo 'bg-secondary';
			}
			?> 
			py-2 text-center my-4">

			<i class="fas w_f fa-user"></i> Search

		</div></a>


		<?php 
		if($admin__ == true  ){
			?>
			<a class="text-light" href="<?php echo $new_user_requestPage; ?>">
				<div class="  
				<?php 

				if( $pageName=='new_user_request')
				{
					echo 'bg-info';
				}
				else{
					echo 'bg-secondary';
				}
				?> 
				py-2 text-center my-4">

				<i class="fas fa-shopping-cart"></i> User Request 

				<span class="badge badge-primary" id="verification_request_badge">0</span>

			</div></a>
		<?php } ?>

		<?php 
		if($admin__ == true ){
			?>
			<a class="text-light" href="<?php echo $data_update_requestPage ?>">
				<div class="  
				<?php 

				if( $pageName=='data_update_request' )
				{
					echo 'bg-info';
				}
				else{
					echo 'bg-secondary';
				}
				?> 
				py-2 text-center my-4">

				<i class="fas fa-shopping-cart"></i> Change Request

				<span class="badge badge-primary" id="change_request_badge">0</span>
			</div></a>
		<?php } ?>
	

		<?php 
		if($admin__ == true || $user__ == true){
			?>

		<a class="text-white" href="<?php echo $data_privacyPage; ?>">
			<div class=" 


			<?php 

			if($pageName=='data_privacy')
			{
				echo 'bg-info';
			}
			else{
				echo 'bg-secondary';
			}
			?>  



			bg-secondary py-2 text-center my-4">

			<i class="fas w_f fa-envelope"></i> Privacy

		</div></a>

	<?php } ?>

	
		<?php 
		if($admin__ == true || $user__ == true){
			?>



		<a class="text-white" href="<?=  $photo_galleryPage; ?>">
			<div class=" 
			

			<?php 

			if($pageName=='photo_gallery')
			{
				echo 'bg-info';
			}
			else{
				echo 'bg-secondary';
			}
			?>  

			
			  py-2 text-center my-4">

				<i class="fab fa-product-hunt"></i> Gallery

			</div></a>

				<?php } ?>

			<a class="text-white" href="<?php echo $loginPage; ?>">
				<div class="  bg-danger py-2 text-center my-4">

					<i class="fas fa-sign-out-alt"></i>Sign Out

				</div></a>

			</div>		
		</div>
	</div>


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
			<a class="text-light" href="<?php echo $profilePage; ?>">
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
			<a class="text-light" href="<?php echo $reg_req; ?>">
				<div class="  
				<?php 

				if($pageName=='reg_req' &&  !isset($_GET['pname']))
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
		<?php } ?>

		<?php 
		if($admin__ == true ){
			?>
			<a class="text-light" href="<?php echo $reg_req.'?pname=change_request'; ?>">
				<div class="  
				<?php 

				if( isset($_GET['pname']) && $_GET['pname'] == 'change_request')
				{
					echo 'bg-info';
				}
				else{
					echo 'bg-secondary';
				}
				?> 
				py-2 text-center my-4">

				<i class="fas fa-shopping-cart"></i> Change Request

			</div></a>
		<?php } ?>
	

		<?php 
		if($admin__ == true || $user__ == true){
			?>

		<a class="text-white" href="<?php echo $privacyPage; ?>">
			<div class=" 


			<?php 

			if($pageName=='privacy')
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



		<a class="text-white" href="<?=  $galleryPage; ?>">
			<div class=" 
			

			<?php 

			if($pageName=='gallery')
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

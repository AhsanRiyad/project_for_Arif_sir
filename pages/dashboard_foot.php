







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

				<i class="fas fa-users"></i> Add Users

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

				if(	$pageName=='profile_basic' ||
					$pageName=='profile_personal' ||
					$pageName=='profile_address' ||
					$pageName=='profile_photo_upload' ||
					$pageName=='profile_change_email' ||
					$pageName=='profile_change_password'
				 )
				{
					echo 'bg-info';
				}
				else{
					echo 'bg-secondary';
				}
				?> 
				py-2 text-center my-4">

				<i class="fas fa-id-card-alt"></i> Profile

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

			<i class="fas fa-search"></i> Search

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

				<i class="fas fa-user-check"></i> User Request 

				<span class="badge badge-primary" id="verification_request_badge"><?php echo $vr__; ?></span>

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

				<i class="fas fa-users-cog"></i> Change Request

				<span class="badge badge-primary" id="change_request_badge"> <?php echo $cr__; ?></span>
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

			<i class="fas fa-user-secret"></i> Privacy

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

				<i class="fas fa-images"></i> Gallery

			</div></a>

				<?php } ?>


		<?php 
		if($admin__ == true ){
			?>



		<a class="text-white" href="<?=  $admin_optionsPage; ?>">
			<div class=" 
			

			<?php 

			if($pageName=='admin_options')
			{
				echo 'bg-info';
			}
			else{
				echo 'bg-secondary';
			}
			?>  

			
			  py-2 text-center my-4">

				<i class="fas fa-lock-open"></i> Admin Options

			</div></a>

				<?php } ?>

			<a class="text-white" href="<?php echo $loginPage; ?>">
				<div class="  bg-danger py-2 text-center my-4">

					<i class="fas fa-sign-out-alt"></i>Sign Out

				</div></a>

			</div>		
		</div>
	</div>
</div>
<?php 
$profilePic = $rootAdress."lib/img/face.jpg";
?>

<div class="container-fluid bg-light mt-0 position-fixed">
	<div class="row ">
		<div class="col-12 admin_margin ">
			<p class="h2 text-dark ">Admin Dashboard</p>
			<nav aria-label="breadcrumb ">
				<ol class="breadcrumb bg-light mt-0 pt-0 pl-0">
					<li class="breadcrumb-item "><a class="text-danger" href="admin_home.php">Home</a></li>
					<li class="breadcrumb-item "><a class="text-danger" href="admin_home.php">Dashboard</a></li>

					<li class="breadcrumb-item "><a class="text-danger" href="admin_profile.php">Profile</a></li>

					<li class="breadcrumb-item "><a class="text-muted" href="admin_profile_update.php">Update Profile</a></li>

					

				</ol>
			</nav>
			
			<div class="w-100"></div>
			
			<!-- update top part starts-->
			
			<div class="offset-3 col-4 admin_background px-0 py-1" style="box-shadow: 0 0 10px lightgrey; position: absolute; top:-10px;">

				
				<div class="row bg-white mx-1">

					<div class="col-3 mr-0 pr-0 my-2">
						<img class="rounded img-thumbnail img-fluid" src=<?php echo $profilePic; ?> alt="">
						<div class="w-100"></div>
						
						
						


					</div>
					<div class="col-9 align-self-center ml-0">
						<p class="h3 ">
							<?php 
							echo $sArray['firstName'].' '.$sArray['lastName'];
							?>

						</p>
						<p class="h4 ">System Adminstrator at <span class="font-weight-bold">Umart</span></p>
					</div>

					


				</div>

				<!-- update top part ends-->


				<!-- update field part starts -->
				<div class="row bg-white mt-4 justify-content-center mx-1">
					<div class="w-100 bg-info">
						<p class="h3 text-white pl-4 pt-2"> <i class="fas fa-info-circle mr-0"></i> About</p>
					</div>

					<!-- <div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
						<small class="text-danger ">Enter new Name or Keep it same <span onclick="removeDisabled(this)" id="changeNameSpan" class="small_button">Change</span></small>

						<input id="changeName" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Enter your name there" disabled="" type="text" value="Riyad Ahsan" >

					</div> -->

					<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
						<small id='idSmallEmailChangeDashboard'  class="text-danger "> <span>Enter new email or Keep it same</span> <span onclick="removeDisabled(this)" id="idSpanEmailChangeDashboard" class="small_button">Change</span></small>

						<input id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Email Here" disabled="" type="text" value="<?php 
							echo $sArray['email'];
							?>" >

					</div>

					<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
						<small id='idSmallPasswordChangeDashboard'  class="text-danger "> <span>Enter new Password or Keep it same</span> <span onclick="removeDisabled(this)" id="idSpanPasswordChangeDashboard" class="small_button">Change</span></small>

						<input id="idInputPasswordUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Password Here" disabled="" type="password" value="<?php 
							echo $sArray['password'];
							?>" >

					</div>


					<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
						<small class="text-danger ppp"><span>Enter new Number or Keep it same</span> <span id="changeMobileSpan" class="small_button" onclick="removeDisabled(this);">Change</span></small>

						<input id="idInputMobileUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Email Here" disabled="true" type="text" value="<?php 
							echo $sArray['mobile'];
							?>" >

					</div>


					<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0 mb-3"> 
						<small class="text-danger "><span>Enter new DOB or Keep it same</span> <span onclick="removeDisabled(this)" id="changeDOBSpan" class="small_button">Change</span></small>

						<input id="idInputDobUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 pl-2 mr-0" placeholder="20-12-1996" disabled="" type="date" value="<?php 
							echo $sArray['dob'];
							?>" >

					</div>


					<div class="col-10 mx-0 px-0 ">
						<button id="idButtonUpdateProfileDashboard" class="btn btn-danger btn-block mb-3 mx-0 rounded-0">
							Update Info
						</button>
					</div>
					
					<!-- update field part ends -->

				</div>






			</div>

			



			


		</div>
	</div>
</div>




<?php 
$pageName = 'registration';

include "../assets\linker\linkerCss.php";

?>



<!-- registration page starts now -->
<form action="<?php echo $modelRegirstration; ?>" method="post">
	
	<div class="container-fluid">
		<div class="row justify-content-xl-center reg_background no-gutters">
			<div class="col-12 col-xl-6 ">
				<div class="container">
					<div class="row pt-4 pb-1">
						
						<!-- @foreach($errors->all() as $e)
							{{ $e }}
							@endforeach -->




							<p class="text-dark  h4" id='msg'>
								Welcome, Create your Account

								<span class="text-danger">
									<?php 
									if(isset($_COOKIE['registration_email_error'])){
										echo $_COOKIE['registration_email_error'];
									}

									 ?>

									 </span>

									<span class="text-success">
									<?php 
									if(isset($_COOKIE['registration_status'])){
										echo $_COOKIE['registration_status'];
									}

									 ?>

									 </span>

							</p>		



							<span class="ml-auto mt-auto pt-3"><small >Alredy member? <a href="<?php echo $loginPage; ?>">Login</a> here</small></span>
						</div>

						<div class="row justify-content-xl-center bg-white py-5 mb-5">

							<!-- email input -->
							<div class="col-12 col-xl-5 ">

								<p class="text-danger h4 bg-white">

								</p>



								<!-- first name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">first Name*</small>
										<small class="text-danger">

										</small>
										<br>


									</label>
									<input name="first_name"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter first name" value="<?php if(isset($_COOKIE['first_name'])){
										echo $_COOKIE['first_name'];
									} ?>">
								</div>

								<!-- Middle name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Middle Name*</small>
										<small class="text-danger">

										</small>
										<br>


									</label>
									<input name="middle_name"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter Middle name" value="<?php if(isset($_COOKIE['middle_name'])){
										echo $_COOKIE['middle_name'];
									} ?>">
								</div>

								<!-- last name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Last Name*</small>
										<small class="text-danger">

										</small>
										<br>


									</label>
									<input name="last_name"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter Last name" value="<?php if(isset($_COOKIE['last_name'])){
										echo $_COOKIE['last_name'];
									} ?>">
								</div>
								

								<!-- gender -->
								<label for="exampleInputEmail1"><small id="lnLabel">gender*</small>
									<small class="text-danger">

									</small>
									<br>


								</label>
								

								<div class="input-group">

									<select  name="gender" class="custom-select rounded-0 pl-1 pl-lg-2 " id="inputGroupSelect01">
										<option  selected value="Gender">Gender</option>
										<option  value="Male">Male</option>
										<option  value="Female">Female</option>
										<option  value="Others">Others</option>
									</select>
								</div>


								<!-- institution_id input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">institution_id*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="institution_id"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter institution_id" value="<?php if(isset($_COOKIE['institution_id'])){
										echo $_COOKIE['institution_id'];
									} ?>">
								</div>


								<!-- nid/passport input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">nid/passport number*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nid_or_passport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter nid/passport number" value="<?php if(isset($_COOKIE['nid_or_passport'])){
										echo $_COOKIE['nid_or_passport'];
									} ?>">
								</div>


								<!-- father's name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">father's name*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="fathers_name"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter fathers name" value="<?php if(isset($_COOKIE['fathers_name'])){
										echo $_COOKIE['fathers_name'];
									} ?>">
								</div>

								<!-- mother's name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">mother's name*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="mother_name"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter mothers name" value="<?php if(isset($_COOKIE['mother_name'])){
										echo $_COOKIE['mother_name'];
									} ?>">
								</div>
								<!-- spouse's name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">spouse's name*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="spouse_name"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter spouses name" value="<?php if(isset($_COOKIE['spouse_name'])){
										echo $_COOKIE['spouse_name'];
									} ?>">
								</div>
								

								<!-- number of childen -->
								<label for="exampleInputEmail1"><small id="lnLabel">number of children*</small>
									<small class="text-danger">

									</small>
									<br>


								</label>
								

								<div class="input-group">

									<select  name="number_of_children" class="custom-select rounded-0 pl-1 pl-lg-2 " id="inputGroupSelect01">
										<option selected value="null">Number Of Children</option>
										<option  value="1">01</option>
										<option  value="2">02</option>
										<option  value="3">03</option>
									</select>
								</div>

								





								<!-- Present Address name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Present Adress ,  Line 1*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="present_line_1"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="enter line 1" value="<?php if(isset($_COOKIE['present_line_1'])){
										echo $_COOKIE['present_line_1'];
									} ?>">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Line 2*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="present_line_2"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter line 2" value="<?php if(isset($_COOKIE['present_line_2'])){
										echo $_COOKIE['present_line_2'];
									} ?>">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">City/District*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="present_city_or_district"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="enter city/district" value="<?php if(isset($_COOKIE['present_city_or_district'])){
										echo $_COOKIE['present_city_or_district'];
									} ?>">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Post Code*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="present_post_code"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="enter post code" value="<?php if(isset($_COOKIE['present_post_code'])){
										echo $_COOKIE['present_post_code'];
									} ?>">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Country*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="present_country"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter country" value="<?php if(isset($_COOKIE['present_country'])){
										echo $_COOKIE['present_country'];
									} ?>">
								</div>




							</div>

							<!-- Present Address name input -->
							<div class="col-12 col-xl-5 ">

								<!-- parmanent address input name -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Permanent Adress ,  Line 1*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="parmanent_line_1"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="enter line 1 " value="<?php if(isset($_COOKIE['parmanent_line_1'])){
										echo $_COOKIE['parmanent_line_1'];
									} ?>">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Line 2*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="parmanent_line_2"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter line 2" value="<?php if(isset($_COOKIE['parmanent_line_2'])){
										echo $_COOKIE['parmanent_line_2'];
									} ?>">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">City/District*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="parmanent_city_or_district"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="enter district/city" value="<?php if(isset($_COOKIE['parmanent_city_or_district'])){
										echo $_COOKIE['parmanent_city_or_district'];
									} ?>">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Post Code*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="parmanent_post_code"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="enter post code" value="<?php if(isset($_COOKIE['parmanent_post_code'])){
										echo $_COOKIE['parmanent_post_code'];
									} ?>">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Country*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="parmanent_country"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter country name" value="<?php if(isset($_COOKIE['parmanent_country'])){
										echo $_COOKIE['parmanent_country'];
									} ?>">
								</div>

								<!-- profession -->
								<div class="form-group mb-xl-3">
									<label for="exampleInputEmail1"><small id="exampleLabelMobile">Profession*</small>

										<small class="text-danger">

										</small>

										<br>

									</label>

									<input name="profession" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter profession"
									value="<?php if(isset($_COOKIE['profession'])){
										echo $_COOKIE['profession'];
									} ?>">
								</div>



								<!-- designation input -->
								<div class="form-group mb-xl-3">
									<label for="exampleInputEmail1"><small id="exampleLabelMobile">Designation*</small>

										<small class="text-danger">

										</small>

										<br>

									</label>

									<input name="designation" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter designation"
									value="<?php if(isset($_COOKIE['designation'])){
										echo $_COOKIE['designation'];
									} ?>">
								</div>

								<!-- institute input -->
								<div class="form-group mb-xl-3">
									<label for="exampleInputEmail1"><small id="exampleLabelMobile">Institute*</small>

										<small class="text-danger">

										</small>

										<br>

									</label>

									<input name="institution" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter institution"
									value="<?php if(isset($_COOKIE['institution'])){
										echo $_COOKIE['institution'];
									} ?>">
								</div>

								
								<!-- mobile number input -->
								<div class="form-group mb-xl-3">
									<label for="exampleInputEmail1"><small id="exampleLabelMobile">Mobile Number*</small>

										<small class="text-danger">

										</small>

										<br>

									</label>

									<input name="mobile" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter mobile number"
									value="<?php if(isset($_COOKIE['mobile'])){
										echo $_COOKIE['mobile'];
									} ?>">
								</div>



								<!-- Email input -->
								<div class="form-group mb-xl-3">
									<label for="exampleInputEmail1"><small id="exampleLabelMobile">Email*
									
									<span class="text-danger">
									<?php 
									if(isset($_COOKIE['registration_email_error'])){
										echo $_COOKIE['registration_email_error'];
									}

									 ?>

									 </span>

									</small>

										<small class="text-danger">

										</small>

										<br>

									</label>

									<input name="email" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter email address"
									value="<?php if(isset($_COOKIE['email'])){
										echo $_COOKIE['email'];
									} ?>">
								</div>


								<label for="exampleInputEmail1" ><small id="idExampleInputEmail1Small">Blood Group*

								</small>
								<small class="text-danger">

								</small>
								<br>

							</label>

							<div class="input-group mb-xl-3">
								<select  name="blood_group" class="custom-select rounded-0 pl-1 pl-lg-2 " id="inputGroupSelect01">
									<option selected value="bangladesh">BLOOD GROUP</option>
									<option  value="">A+</option>
									<option  value="">A-</option>
									<option  value="">B+</option>
									<option  value="">B-</option>
									<option  value="">AB+</option>
									<option  value="">AB-</option>
									<option  value="">O+</option>
									<option  value="">O-</option>

								</select>
							</div>
							


							<!-- DOB input -->
							<div class="form-group mb-xl-3">
								<label for="exampleInputEmail1"><small id="exampleLabelMobile">Date of Birth*</small>

									<small class="text-danger">

									</small>

									<br>

								</label>

								<input name="date_of_birth" type="text" class="form-control rounded-0" id="datepicker" aria-describedby="emailHelp" placeholder="Date of birth"
								value="<?php if(isset($_COOKIE['date_of_birth'])){
										echo $_COOKIE['date_of_birth'];
									} ?>">
							</div>






							<div class="form-group mb-xl-3">
								<label for="exampleInputPassword1"><small id='idexampleInputPassword1'>Password*</small>
									<br>
								</label>
								<input name="password" type="password" class="form-control rounded-0" id="exampleInputPassword1" placeholder="Password" value="{{ old('password') }}">
							</div>

							<!-- re-enter password input -->
							<div class="form-group mb-4">
								<label for="exampleInputPassword1"><small>Re-enter password*</small>


								</label>
								<input name="confirm_password" type="password" class="form-control rounded-0" id="exampleInputPassword2" placeholder="Password" value="" >
							</div>





							<!-- toc terms and condition input -->
							

							<!-- submit button -->
							<button type="submit" name="submit" value="submit" class="btn btn-success rounded-0 w-100 py-2  mt-xl-4">Register</button>

							<!-- <p class="text-danger h5 mt-4"><i>Already have an account?</i></p>

								<a href="reg.php"><button type="button" class="btn btn-primary rounded-0 w-100 py-2">Register Here</button></a> -->

							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</form>


	<?php 
	include $APP_ROOT."assets/linker/linkerJs.php" ; 
	?>
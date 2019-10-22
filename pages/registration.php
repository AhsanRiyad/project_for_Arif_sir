<?php 
$pageName = 'registration';
$APP_ROOT = "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/";
include $APP_ROOT."assets\linker\linkerCss.php" ; 
?>



<!-- registration page starts now -->
<form action="#" method="post">
	
	<div class="container-fluid">
		<div class="row justify-content-xl-center reg_background">
			<div class="col-12 col-xl-6 ">
				<div class="container">
					<div class="row pt-4 pb-1">
						
						<!-- @foreach($errors->all() as $e)
							{{ $e }}
							@endforeach -->




							<p class="text-dark  h4" id='msg'>
								Welcome, Create your Account
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
									<input name="first_name"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter first name" value="">
								</div>

								<!-- Middle name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Middle Name*</small>
										<small class="text-danger">

										</small>
										<br>


									</label>
									<input name="Middle_name"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter Middle name" value="">
								</div>

								<!-- last name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Last Name*</small>
										<small class="text-danger">

										</small>
										<br>


									</label>
									<input name="last_name"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter Last name" value="">
								</div>
								

								<!-- gender -->
								<label for="exampleInputEmail1"><small id="lnLabel">gender*</small>
									<small class="text-danger">

									</small>
									<br>


								</label>
								

								<div class="input-group">

									<select  name="country" class="custom-select rounded-0 pl-1 pl-lg-2 " id="inputGroupSelect01">
										<option selected value="bangladesh">Gender</option>
										<option  value="">Male</option>
										<option  value="">Female</option>
										<option  value="">Others</option>


									</select>
								</div>


								<!-- institution_id input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">institution_id*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="institution_id"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter institution_id" value="">
								</div>


								<!-- nid/passport input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">nid/passport number*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter nid/passport number" value="">
								</div>


								<!-- father's name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">father's name*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter fathers name" value="">
								</div>

								<!-- mother's name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">mother's name*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter mothers name" value="">
								</div>
								<!-- spouse's name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">spouse's name*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter spouses name" value="">
								</div>
								

								<!-- number of childen -->
								<label for="exampleInputEmail1"><small id="lnLabel">number of children*</small>
									<small class="text-danger">

									</small>
									<br>


								</label>
								

								<div class="input-group">

									<select  name="country" class="custom-select rounded-0 pl-1 pl-lg-2 " id="inputGroupSelect01">
										<option selected value="bangladesh">Number Of Children</option>
										<option  value="">01</option>
										<option  value="">02</option>
										<option  value="">03</option>
									</select>
								</div>

								





								<!-- Present Address name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Present Adress ,  Line 1*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="enter line 1" value="">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Line 2*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter line 2" value="">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">City/District*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="enter city/district" value="">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Post Code*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="enter post code" value="">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Country*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter country" value="">
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
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="enter line 1 " value="">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Line 2*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter line 2" value="">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">City/District*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="enter district/city" value="">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Post Code*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="enter post code" value="">
								</div>

								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">Country*</small>
										<small class="text-danger">

										</small>
										<br>
										

									</label>
									<input name="nidOrpassport"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter country name" value="">
								</div>

								<!-- profession -->
								<div class="form-group mb-xl-3">
									<label for="exampleInputEmail1"><small id="exampleLabelMobile">Profession*</small>

										<small class="text-danger">

										</small>

										<br>

									</label>

									<input name="phone" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter profession"
									value="">
								</div>



								<!-- designation input -->
								<div class="form-group mb-xl-3">
									<label for="exampleInputEmail1"><small id="exampleLabelMobile">Designation*</small>

										<small class="text-danger">

										</small>

										<br>

									</label>

									<input name="phone" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter designation"
									value="">
								</div>

								<!-- institute input -->
								<div class="form-group mb-xl-3">
									<label for="exampleInputEmail1"><small id="exampleLabelMobile">Institute*</small>

										<small class="text-danger">

										</small>

										<br>

									</label>

									<input name="phone" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter institution"
									value="">
								</div>

								
								<!-- mobile number input -->
								<div class="form-group mb-xl-3">
									<label for="exampleInputEmail1"><small id="exampleLabelMobile">Mobile Number*</small>

										<small class="text-danger">

										</small>

										<br>

									</label>

									<input name="phone" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter mobile number"
									value="">
								</div>



								<!-- Email input -->
								<div class="form-group mb-xl-3">
									<label for="exampleInputEmail1"><small id="exampleLabelMobile">Email*</small>

										<small class="text-danger">

										</small>

										<br>

									</label>

									<input name="phone" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter email address"
									value="">
								</div>


								<label for="exampleInputEmail1" ><small id="idExampleInputEmail1Small">Blood Group*

								</small>
								<small class="text-danger">

								</small>
								<br>

							</label>

							<div class="input-group mb-xl-3">
								<select  name="country" class="custom-select rounded-0 pl-1 pl-lg-2 " id="inputGroupSelect01">
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

								<input name="dob" type="text" class="form-control rounded-0" id="datepicker" aria-describedby="emailHelp" placeholder="Date of birth"
								value="">
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
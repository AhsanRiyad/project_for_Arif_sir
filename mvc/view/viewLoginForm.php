<!-- login form starts -->
<form action="#" method="post">
	<div class="container-fluid">
		<div class="row justify-content-xl-center admin_background">
			<div class="col-12 col-xl-6 ">
				<div class="container">
					<div class="row py-4">
						<p class="text-dark h4" id="login_id">Welcome to Umart! Please login</p>
					</div>

					<div class="row justify-content-xl-center bg-white py-5 mb-5">

						<div class="col-12 col-xl-6 ">
							<div class="form-group">
								<label for="exampleInputEmail1"><small>Email address*</small>
									<br>
									<?php
									$st2 = email_validation();
									if ($st2 != "") {
										echo "<span style='color: red'>" .'email '. $st2 . "</span>" . '<br>';
									}
									else{
										$countEmail = 2 ;
										$msg = checkDB();										
									}
									?>


								</label>
								<input name='email'  type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"
								value="<?php
								if (isset($_POST['email'])) {
									echo $_POST['email'];
								}
								?>"
								>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1"><small>Password*</small>
									<br>
									<?php
									$st = password_validation();
									if ($st != "") {
										echo "<span style='color: red;'>" . $st . "</span>" . '<br>';
									}
									else{
										$countPass = 2 ;
										$msg = checkDB();

									}
									?>



								</label>
								<input name="password" type="password" class="form-control rounded-0" id="exampleInputPassword1" placeholder="Password"
								value="<?php
								if (isset($_POST['password'])) {
									echo $_POST['password'];
								}
								?>"

								>
								<p class="text-right text-danger">
									<small><a href="">Forgot password?</a></small>
								</p>
							</div>

						</div>
						<div class="col-12 col-xl-5 align-self-xl-center">
							<button type="submit" name="submit" value="submit" class="btn btn-success rounded-0 w-100 py-2">Log In</button>

							<p class="text-danger h5 mt-2"><i>Not a member yet?</i></p>

							<a href=<?php echo $registrationUrl; ?>><button type="button" class="btn btn-primary rounded-0 w-100 py-2">Register Here</button></a>

						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- body ends-->
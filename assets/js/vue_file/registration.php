<script>

// registration page
// dob datepicker  
$( function() {
	$( "#datepicker" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
} );



var code = `<!-- registration page starts now -->
	<form action="" method="post">

		<div class="container-fluid">
			<div style="height: 100vh;" class="row justify-content-xl-center align-items-center reg_background no-gutters">
				<div class="col-12 col-xl-5 ">
					<div class="container">
						<div class="row pt-4 pb-1">

						<!-- @foreach($errors->all() as $e)
							{{ $e }}
							@endforeach -->
							<p class="text-dark  h4" id='msg'>
								Welcome, Create your Account 

								<span class="text-danger">
									
								</span>

								<span class="text-success">
									<?php 
									if(isset($_COOKIE['registration_status'])){
										echo $_COOKIE['registration_status'];
									}

									?>

								</span>

							</p>		



							<span class="ml-auto mt-auto pt-3"><small >Alredy member? <a href="">Login</a> here</small></span>
						</div>

						<div class="row justify-content-xl-center bg-white py-5 mb-5">

							<!-- email input -->
							<div class="col-12 col-xl-5 ">

								<p class="text-danger h4 bg-white">

								</p>



								<!-- first name input -->
								<div class="form-group mt-3">
									<label for="exampleInputEmail1"><small id="lnLabel">first Name*</small>
										<small v-bind:style="{ color : first_name_color }" >
											{{ name_result }}
										</small>
										<br>


									</label>
									<input name="first_name"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter first name" value="<?php if(isset($_COOKIE['first_name'])){
										echo $_COOKIE['first_name'];
									} ?>" ref='first_name' v-on:change='first_name_change()'>
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



								
								<!-- mobile number input -->
								<div class="form-group mb-xl-3">
									<label for="exampleInputEmail1"><small id="exampleLabelMobile">Mobile Number*</small>

										<small class="text-danger">

										</small>

										<br>

									</label>

									<input name="mobile" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter mobile number"
									value="">
								</div>







							<!-- <p class="text-danger h5 mt-4"><i>Already have an account?</i></p>

								<a href="reg.php"><button type="button" class="btn btn-primary rounded-0 w-100 py-2">Register Here</button></a> -->

							</div>


							<div class="col-12 col-xl-5 ">
								


								<!-- Email input -->
								<div class="form-group mb-xl-3 mt-3">
									<label for="exampleInputEmail1"><small id="exampleLabelMobile">Email*

										<span class="text-danger">

										</span>

									</small>

									<small class="text-danger">

									</small>

									<br>

								</label>

								<input name="email" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter email address"
								value="">
							</div>


							<div class="form-group mb-xl-3">
								<label for="exampleInputPassword1"><small id='idexampleInputPassword1'>Password*</small>
									<br>
								</label>
								<input name="password" type="password" class="form-control rounded-0" id="exampleInputPassword1" placeholder="Password" value="">
							</div>
							<!-- toc terms and condition input -->


							<!-- submit button -->
							<small>By registering, I agree with the TOC</small>
							<button type="submit" name="submit" value="submit" class="btn btn-success rounded-0 w-100 py-2  mt-xl-2">Register</button>

							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</form>`;



Vue.component('registration' , {
	template: code, 
	data(){
		return {
		name: 'riyad---vue',
		name_result: '' , 
		first_name_color : 'green'
		}
	},
	methods:{
		first_name_change : function(){
			//alert(this.$refs.first_name.value);
			//alert('hi');
			var patt = /(^[A-Za-z\s\.]{3,}$)/g;
			var result = patt.test(this.$refs.first_name.value);
			//var result = true ;
			if(result){
				//alert('name change');
				this.name_result = 'Name is accepeted' ; 
				this.first_name_color = 'green' ; 

			}else{
				//alert('name_result');
				this.name_result = 'Name is not accepeted' ; 

				this.first_name_color = 'red' ;								
			}
		}
	},
	beforeCreate(){

	},
	created(){

	},
	beforeMount(){

	},
	mounted(){

	},
	beforeUpdated(){

	},
	updated(){

	}


})












var registration_page = new Vue({
	el: '#reg_vue' , 
	data : {
		name: 'riyad---vue',
		name_result: '' , 
		first_name_color : 'green'
	} , 
	methods : {
		first_name_change : function(){
			//alert(this.$refs.first_name.value);
			//alert('hi');
			var patt = /(^[A-Za-z\s\.]{3,}$)/g;
			var result = patt.test(this.$refs.first_name.value);
			//var result = true ;
			if(result){
				//alert('name change');
				this.name_result = 'Name is accepeted' ; 
				this.first_name_color = 'green' ; 

			}else{
				//alert('name_result');
				this.name_result = 'Name is not accepeted' ; 

				this.first_name_color = 'red' ;								
			}
		}
	},
	beforeCreate(){

	},
	created(){

	},
	beforeMount(){

	},
	mounted(){

	},
	beforeUpdated(){

	},
	updated(){

	}
})












</script>
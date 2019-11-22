<script>
	// This is a global mixin, it is applied to every vue instance
	
	Vue.mixin({
		data: function() {
			return {
				csrf_token1: '<?php echo $_SESSION['csrf_token1'] = bin2hex(random_bytes(32)); ?>',
				forgot_password_crypto: '<?php if(isset($_GET['c'])){echo $_GET['c'];
				} ?>',
				email: '<?php if(isset($_GET['e'])){echo $_GET['e'];
				}else {
					echo 'not_set';
				} ?>',

			}
		}
	})



	



	var code = `<div class="container-fluid bg-light " style="margin-top: 150px;">
	<div class="row justify-content-center ">

	<!-- update top part starts-->

	<div class=" align-self-center col  col-4  px-0 py-0" style="box-shadow: 0 0 10px lightgrey; ">


	<div class="row bg-white mx-1">

	
	<div class="col-9 col  ml-0">
	<p class="h3 ">

	</p>
	
	</div>

	</div>

	<!-- update top part ends-->


	<!-- update field part starts -->
	<div class="row bg-white mt-4 justify-content-center mx-1">
	<div class="w-100 bg-info">
	<p class="h3 text-white pl-4 pt-2"> <i class="fas fa-info-circle mr-0"></i> Change Password</p>
	</div>

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.password.smallText ' > <span>New Password 


	<span v-show="password_validity == 'valid'" class="text-success"> {{ password_validity }} </span>
	<span v-show="password_validity == 'invalid'" class="text-danger"> {{ password_validity }} </span>
	
	


	</span> <span @click="enable_input('password')" id="idSpanEmailChangeDashboard" v-bind:style="changes.password.smallButton" class="small_button">Change</span></small>

	<input @keyup="validityCheckInput('password')" v-model="password" :disabled='password_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="password" value="" >

	</div>

	

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.repassword.smallText ' > <span>Re-enter repassword 


	<span v-show="repassword_validity == 'valid'" class="text-success"> {{ repassword_validity }} </span>
	<span v-show="repassword_validity == 'invalid'" class="text-danger"> {{ repassword_validity }} </span>
	
	


	</span> <span @click="enable_input('repassword')" id="idSpanEmailChangeDashboard" v-bind:style="changes.repassword.smallButton" class="small_button">Change</span></small>

	<input @keyup="validityCheckInput('repassword')" v-model="repassword" :disabled='repassword_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="password" value="" >

	</div>

	


	<div class="col-10 mx-0 px-0 ">
	<v-btn color="error" @click="submit()" id="idButtonUpdateProfileDashboard" class=" btn-block mb-3 mx-0 rounded-0">
	Update Info
	</v-btn>
	</div>

	<!-- update field part ends -->

	</div>
	</div>
	</div>
	
	<v-row justify="center">


	<v-dialog
	v-model="dialog"
	max-width="290"
	>
	<v-card>
	<v-card-title class="headline">Status</v-card-title>

	<v-card-text class="black--text">
	{{ status_text }}
	</v-card-text>

	<v-card-actions>
	<v-spacer></v-spacer>



	<v-btn
	color="green darken-1"
	text
	@click="dialog = false"
	>
	Okay
	</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>



	</div>`;

	Vue.component('password_recovery' , {
		template: code,
		data(){
			return {
				name: 'riyad---vue',
				dialog: false,
				status_text: '',
				password_input: true,
				password: '',
				password_validity: '',
				repassword_input: true,
				repassword: '',
				repassword_validity: '',
				changes:{
					password:{
						smallText: {
							color: '#2196f3'					
						},
						smallButton: {
							color: 'white',
							backgroundColor: '#2196f3' 
						}
					},
					repassword:{
						smallText: {
							color: '#2196f3'					
						},
						smallButton: {
							color: 'white',
							backgroundColor: '#2196f3' 
						}
					},
					
				} 
			}
		},
		methods: {
			enable_input: function(name){
				if(name=='password'){
					this.password_input = false;
					this.changes.password.smallText.color = 'red';
					this.changes.password.smallButton.color = 'white';
					this.changes.password.smallButton.backgroundColor = 'red';
					//alert(this.password_input);
				}
				if(name=='repassword'){
					this.repassword_input = false;
					this.changes.repassword.smallText.color = 'red';
					this.changes.repassword.smallButton.color = 'white';
					this.changes.repassword.smallButton.backgroundColor = 'red';
					//alert(this.password_input);
				}
			},
			validityCheckInput( inputName  ){
				if(inputName == 'password'){
					console.log(this.password);
					var patt= /[\S]{6,}/g;
					var result = patt.test(this.password);

					result == false ? this.password_validity = 'invalid' : this.password_validity = 'valid';
				}else if(inputName == 'repassword'){
					console.log(this.repassword);
					var patt= /[\S]{6,}/g;
					var result = patt.test(this.repassword);

					result == false ? this.repassword_validity = 'invalid' : this.repassword_validity = 'valid';
				}
			},
			submit(){
				//alert(this.blood_group);
				this.validityCheckInput('password');
				this.validityCheckInput('repassword');

				if(this.password_validity == 'valid' && this.password == this.repassword){

					axios.post( this.model.modelProfile_update ,
					{
						purpose: 'password',
						password: this.password,
						email: this.email ,

					}
					).then(function(response){

						console.log(response);

						this.status_text = 'Password Updated successfully';
						this.dialog = true;

					}.bind(this))
					.catch(function(error){

        //console.log(error);
    }.bind(this));

				}else{
					this.status_text = 'password doesnt match';
					this.dialog = true;
					//alert('all filed are not valid');
				}



			}

		},
		created(){}
	})










	var code = `
	
	<div class="container-fluid">
	<div class="row justify-content-xl-center justify-content-md-center _background ">
	<div class="col-12 col-xl-4 col-md-4 align-self-center ">
	<div class="container margin_">
	<div class="row py-4 ">





	<p class="text-dark h4" id="login_id">
	Forgot Password?
	<br>
	Please enter your email to recover..
	<br>
	<span v-show="login_status=='no_email_found'" class="red--text"> Account not found </span>
	<span v-show="login_status=='invalid_email'" class="red--text"> {{ login_status }} </span>
	<span v-show="login_status== 'crypto_added' " class="green--text"> recovery link sent to your email </span>

	<span v-show="invalid_link=='invalid_link'" class="red--text"> link expired/invalid, try again </span>

	<span v-show="login_status=='link_sent_successfully'" class="red--text"> link expired/invalid, try again </span>
	</p>
	<span v-show="login_status=='server_problem'" class="red--text"> Email server problem , try later. </span>
	</p>



	</div>

	<div class="row justify-content-xl-center bg-white py-5 mb-5">

	<div class="col-12 col-xl-9 ">

	<div class="form-group">
	<label for="exampleInputEmail1" ><small id="idExampleInputEmail1Small">Email address*

	<span v-show="email_validity == 'valid'" class="text-success"> {{ email_validity }} </span>
	<span v-show="email_validity == 'invalid'" class="text-danger"> {{ email_validity }}  </span>



	

	</small>
	<br>



	</label>
	<input @keyup="onChangeValidity('email')" v-model='email' type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"
	value=""
	>
	</div>

	<v-btn color="success" :loading = 'loading' @click="submit" type="submit" name="submit" value="submit" class="btn btn-success rounded-0 mb-1 w-100 py-2">Recover Password</v-btn >

	<!-- <button type="submit" name="submit" value="submit" class="btn btn-info rounded-0 mb-1 w-100 py-2">Back to Login</button> -->

	<br>

	<div class="row justify-content-end">
	<div class="col-lg-auto">
	<a href="<?php echo $loginPage; ?>" class="">Go Back to Login</a>
	</div>
	</div>





	</div>



	</div>
	</div>
	</div>
	</div>


	

	</div>
	
	`;
	

	Vue.component('forgot_password' , {
		template: code,
		props: ['invalid_link'],
		data(){
			return{
				loading: false,
				status_text: '',
				email: '',
				email_validity: '',
				login_status: '',
			}
		},
		methods: {
			submit: function(){
				//alert('submit clicked');
				this.invalid_link = '';

				this.loading = true;
				if(this.email_validity == 'valid'){

					axios.post( this.model.modelProfile_update , {
						purpose: 'forgot_password',
						email: this.email,
						
					})
					.then( function(response){
						this.loading = false;
					//window.location.href = 'http://google.com';
					// response.data == 'YES' ? window.location.href = this.address.profilePage : this.login_status = 'email/password doesnt match';  
					this.login_status = response.data;


					console.log(response);	
				}.bind(this))
					.catch(function (error) {
						console.log(error);
						this.loading = false;
                //return 'hi';
            }.bind(this)); 

				}else{
					this.loading = false;
					this.login_status = 'invalid_email';

				}

				
			},
			onChangeValidity(inputName){

				console.log(this.password);

				if(inputName == 'email'){
					console.log(this.email);
					var patt= /^[a-zA-Z]{1}[a-zA-Z1-9._]{3,15}@[a-zA-Z]{1}[a-zA-Z1-9]{3,15}\.[a-zA-Z]{2,10}(\.[a-zA-Z]{2})*$/g;
					var result = patt.test(this.email);

					result == false ? this.email_validity = 'invalid' : this.email_validity = 'valid';

				}





			},

		},
		created(){

		},
		updated(){

		}
	})









	var forgot = new Vue({
		el: '#app' ,
		vuetify: new Vuetify(), 
		data : {
			componet_name: 'forgot_password',
			invalid_link: '',
			
		} , 
		methods : {
			

		},
		beforeCreate(){
			
		},
		created(){

			if(this.email.trim() != 'not_set' ){
				


			axios.post( this.model.modelProfile_update ,
			{
				purpose: 'forgot_password_recovery',
				email: this.email.trim(),
				forgot_password_crypto: this.forgot_password_crypto.trim(),

			}
			).then(function(response){
				console.log(response);
				
				

				if(response.data == 'allow'){
					
					this.componet_name = 'password_recovery';

				}else{
					this.invalid_link = response.data;
					this.componet_name = 'forgot_password' ;
				}


			}.bind(this))
			.catch(function(error){

        //console.log(error);
    }.bind(this));

		}

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
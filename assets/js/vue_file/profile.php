


<script type="text/javascript">
	
	Vue.mixin({
		data: function() {
			return {
				componet_name: '<?php echo $_GET['pn']; ?>',
				csrf_token1: '<?php echo $_SESSION['csrf_token1'] = bin2hex(random_bytes(32)); ?>',

			}
		}
	})



	



	const bus = new Vue();


	var code = `	
	<div class="container ">
	<div class="row justify-content-center no-gutters">
	<div class="col col-md-4">
	<a>
	<v-alert type="error">
	Your email is not verified , click to solve
	</v-alert></a>
	<a>
	<v-alert type="warning">
	Your account is not complete, click to solve 
	</v-alert></a>
	</div>
	</div>
	</div>
	`;

	Vue.component('alert' , {
		template: code , 
		data(){
			return {

			}
		},
		methods: {

		},
		created(){

		}
	})




	var code = `
	<div class="container-fluid bg-light mt-1 mb-5">
	<div class="row justify-content-center align-items-center">
	

	<v-btn :disabled="componet_name == 'basic'" @click="changeComponent('basic')" large class="ml-1" color="success">Basic</v-btn>
	<v-btn :disabled="componet_name == 'personal'" @click="changeComponent('personal')" large class="ml-1" color="success">Personal</v-btn>
	<v-btn :disabled="componet_name == 'address1'" @click="changeComponent('address1')" large class="ml-1" color="success">address</v-btn>
	<v-btn :disabled="componet_name == 'photos'" @click="changeComponent('photos')" large class="ml-1" color="success">photo</v-btn>
	<div class="w-100"></div>
	<v-btn :disabled="componet_name == 'password'" @click="changeComponent('password')" large class="ml-1 mt-2" color="success">change Password</v-btn>
	<v-btn :disabled="componet_name == 'email'" @click="changeComponent('email')" large class="ml-1 mt-2" color="success">change Email</v-btn>

	</div>

	</div>
	
	`;


	Vue.component('buttons' , {
		props: ['profile_photo' , 'CSRF_TOKEN'  ],
		template: code,
		data(){
			return {
				name: 'Riyad',
				//input_disabled: 'basic'
			}
		},
		methods: {
			changeComponent: function(comp_type){
				//this.input_disabled = comp_type;
				this.componet_name = comp_type;
				bus.$emit('changeComponent' , comp_type );
				
			}

		}
	})







	var code = `<div class="container-fluid bg-light mt-5 ">
	<div class="row justify-content-center align-items-center">

	<!-- update top part starts-->

	<div class="  col-4  px-0 py-1" style="box-shadow: 0 0 10px lightgrey; ">


	<div class="row bg-white mx-1">

	<div class="col-3 mr-0 pr-0 my-2">
	<img class="rounded img-thumbnail img-fluid" v-bind:src="profile_photo" alt="">
	<div class="w-100"></div>
	</div>
	<div class="col-9  ml-0">
	<p class="h3 ">

	</p>
	<p class="h4 ">System Adminstrator at <span class="font-weight-bold">Umart</span></p>
	</div>

	</div>

	<!-- update top part ends-->


	<!-- update field part starts -->
	<div class="row bg-white mt-4 justify-content-center mx-1">
	<div class="w-100 bg-info">
	<p class="h3 text-white pl-4 pt-2"> <i class="fas fa-info-circle mr-0"></i> Change email</p>
	</div>

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.email.smallText ' > <span>New email 


	<span v-show="email_validity == 'valid'" class="text-success"> {{ email_validity }} </span>
	<span v-show="email_validity == 'invalid'" class="text-danger"> {{ email_validity }} </span>
	
	


	</span> <span @click="enable_input('email')" id="idSpanEmailChangeDashboard" v-bind:style="changes.email.smallButton" class="small_button">Change</span></small>

	<input @keyup="validityCheckInput('email')" v-model="email" :disabled='email_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="email" value="" >

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

	Vue.component('email' , {
		props: ['profile_photo' , 'CSRF_TOKEN'],
		template: code,
		data(){
			return {
				name: 'riyad---vue',
				dialog: false,
				status_text: '',
				email_input: true,
				email: '',
				email_validity: '',
				changes:{
					email:{
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
				if(name=='email'){
					this.email_input = false;
					this.changes.email.smallText.color = 'red';
					this.changes.email.smallButton.color = 'white';
					this.changes.email.smallButton.backgroundColor = 'red';
					//alert(this.email_input);
				}
			},
			validityCheckInput( inputName  ){
				if(inputName == 'email'){
					console.log(this.email);
					var patt= /^[a-zA-Z]{1}[a-zA-Z1-9._]{3,15}@[a-zA-Z]{1}[a-zA-Z1-9]{3,15}\.[a-zA-Z]{2,10}(\.[a-zA-Z]{2})*$/g;
					var result = patt.test(this.email);

					result == false ? this.email_validity = 'invalid' : this.email_validity = 'valid';
				}
			},
			submit(){
				//alert(this.blood_group);
				this.validityCheckInput('email');
				

				if(this.email_validity == 'valid' ){

					axios.post( this.model.modelProfile_update ,
					{
						purpose: 'email',
						email: this.email,

					}
					).then(function(response){

						console.log(response);

						this.status_text = 'email Updated successfully';
						this.dialog = true;


					}.bind(this))
					.catch(function(error){



        //console.log(error);
    }.bind(this));

				}else{
					this.status_text = 'email is not valid';
					this.dialog = true;
					//alert('all filed are not valid');
				}



			}

		},
		created(){
			axios.post( this.model.modelProfile_update ,
			{
				purpose: 'getProfileBasicInfo',
				
			}
			).then(function(response){
				
				//console.log(response);
				//this.email = response.data.full_name;

			}.bind(this))
			.catch(function(error){
        //console.log(error);
    }.bind(this));
		}
	})




	var code = `<div class="container-fluid bg-light mt-5 ">
	<div class="row justify-content-center align-items-center">

	<!-- update top part starts-->

	<div class="  col-4  px-0 py-1" style="box-shadow: 0 0 10px lightgrey; ">


	<div class="row bg-white mx-1">

	<div class="col-3 mr-0 pr-0 my-2">
	<img class="rounded img-thumbnail img-fluid" v-bind:src="profile_photo" alt="">
	<div class="w-100"></div>
	</div>
	<div class="col-9  ml-0">
	<p class="h3 ">

	</p>
	<p class="h4 ">System Adminstrator at <span class="font-weight-bold">Umart</span></p>
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

	Vue.component('password' , {
		props: ['profile_photo' , 'CSRF_TOKEN'],
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
		created(){
			axios.post( this.model.modelProfile_update ,
			{
				purpose: 'getProfileBasicInfo',
				
			}
			).then(function(response){
				
				//console.log(response);
				//this.password = response.data.full_name;

			}.bind(this))
			.catch(function(error){
        //console.log(error);
    }.bind(this));
		}
	})









	var code = `<div class="container-fluid bg-light mt-5 ">
	<div class="row justify-content-center align-items-center">

	<!-- update top part starts-->

	<div class="  col-4  px-0 py-1" style="box-shadow: 0 0 10px lightgrey; ">


	<div class="row bg-white mx-1">

	<div class="col-3 mr-0 pr-0 my-2">
	<img class="rounded img-thumbnail img-fluid" v-bind:src="profile_photo" alt="">
	<div class="w-100"></div>
	</div>
	<div class="col-9  ml-0">
	<p class="h3 ">

	</p>
	<p class="h4 ">System Adminstrator at <span class="font-weight-bold">Umart</span></p>
	</div>

	</div>

	<!-- update top part ends-->


	<!-- update field part starts -->
	<div class="row bg-white mt-4 justify-content-center mx-1">
	<div class="w-100 bg-info">
	<p class="h3 text-white pl-4 pt-2"> <i class="fas fa-info-circle mr-0"></i> Basic Info</p>
	</div>

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.full_name.smallText ' > <span>Name 


	<span v-show="full_name_validity == 'valid'" class="text-success"> {{ full_name_validity }} </span>
	<span v-show="full_name_validity == 'invalid'" class="text-danger"> {{ full_name_validity }} </span>
	
	


	</span> <span @click="enable_input('full_name')" id="idSpanEmailChangeDashboard" v-bind:style="changes.full_name.smallButton" class="small_button">Change</span></small>

	<input @keyup="validityCheckInput('full_name')" v-model="full_name" :disabled='full_name_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="text" value="" >

	</div>

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.mobile.smallText ' > <span>Mobile

	
	<span v-show="mobile_validity == 'valid'" class="text-success"> {{ mobile_validity }} </span>
	<span v-show="mobile_validity == 'invalid'" class="text-danger"> {{ mobile_validity }} </span>
	
	

	</span> <span @click="enable_input('mobile')" id="idSpanEmailChangeDashboard" v-bind:style="changes.mobile.smallButton" class="small_button">Change</span></small>

	<input @keyup="validityCheckInput('mobile')" v-model="mobile" :disabled='mobile_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="text" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.institution_id.smallText ' > <span>institution_id



	<span v-show="institution_id_validity == 'valid'" class="text-success"> {{ institution_id_validity }} </span>
	<span v-show="institution_id_validity == 'invalid'" class="text-danger"> {{ institution_id_validity }} </span>




	</span> <span @click="enable_input('institution_id')" id="idSpanEmailChangeDashboard" v-bind:style="changes.institution_id.smallButton" class="small_button">Change</span></small>

	<input  @keyup="validityCheckInput('institution_id')" v-model="institution_id" :disabled='institution_id_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="text" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.nid_or_passport.smallText ' > <span>nid_or_passport

	
	
	<span v-show="nid_or_passport_validity == 'valid'" class="text-success"> {{ nid_or_passport_validity }} </span>
	<span v-show="nid_or_passport_validity == 'invalid'" class="text-danger"> {{ nid_or_passport_validity }} </span>




	</span> <span @click="enable_input('nid_or_passport')" id="idSpanEmailChangeDashboard" v-bind:style="changes.nid_or_passport.smallButton" class="small_button">Change</span></small>

	<input @keyup="validityCheckInput('nid_or_passport')"  v-model="nid_or_passport" :disabled='nid_or_passport_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="text" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.blood_group.smallText ' > <span>blood_group


	<span v-show="blood_group_validity == 'valid'" class="text-success"> {{ blood_group_validity }} </span>
	<span v-show="blood_group_validity == 'invalid'" class="text-danger"> {{ blood_group_validity }} </span>



	


	</span> <span @click="enable_input('blood_group')" id="idSpanEmailChangeDashboard" v-bind:style="changes.blood_group.smallButton" class="small_button">Change</span></small>

	<select @change="onChangeValidity('blood_group')" v-model="blood_group" :disabled='blood_group_input == true' class="form-control border-0" id="exampleFormControlSelect1">
	<option >blood_group</option>
	<option >A+</option>
	<option >B+</option>
	<option ">AB+</option>
	<option >O+</option>
	<option >A-</option>
	<option >B-</option>
	<option >AB-</option>
	<option >O-</option>
	

	</select>

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.dob.smallText ' > <span>Date of Birth

	
	<span v-show="dob_validity == 'valid'" class="text-success"> {{ dob_validity }} </span>
	<span v-show="dob_validity == 'invalid'" class="text-danger"> {{ dob_validity }} </span>


	</span> <span @click="enable_input('dob')" id="idSpanEmailChangeDashboard" v-bind:style="changes.dob.smallButton" class="small_button">Change</span></small>

	<input @change="onChangeValidity('dob')"  v-model="dob" :disabled='dob_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="date" value="" >

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

	Vue.component('basic' , {
		props: ['profile_photo' , 'CSRF_TOKEN'],
		template: code,
		data(){
			return {
				name: 'riyad---vue',
				dialog: false,
				status_text: '',
				full_name_input: true,
				mobile_input: true,
				institution_id_input: true,
				nid_or_passport_input: true,
				blood_group_input: true,
				dob_input: '',
				full_name: '',
				mobile: '',
				institution_id: '',
				nid_or_passport: '',
				blood_group: '',
				dob: '',
				full_name_validity: '',
				mobile_validity: '',
				institution_id_validity: '',
				nid_or_passport_validity: '',
				blood_group_validity: '',
				dob_validity: '',
				changes:{
					full_name:{
						smallText: {
							color: '#2196f3'					
						},
						smallButton: {
							color: 'white',
							backgroundColor: '#2196f3' 
						}
					},
					mobile:{
						smallText: {
							color: '#2196f3'					
						},
						smallButton: {
							color: 'white',
							backgroundColor: '#2196f3' 
						}
					},
					institution_id:{
						smallText: {
							color: '#2196f3'					
						},
						smallButton: {
							color: 'white',
							backgroundColor: '#2196f3' 
						}
					},
					nid_or_passport:{
						smallText: {
							color: '#2196f3'					
						},
						smallButton: {
							color: 'white',
							backgroundColor: '#2196f3' 
						}
					},
					blood_group:{
						smallText: {
							color: '#2196f3'					
						},
						smallButton: {
							color: 'white',
							backgroundColor: '#2196f3' 
						}
					},
					dob:{
						smallText: {
							color: '#2196f3'					
						},
						smallButton: {
							color: 'white',
							backgroundColor: '#2196f3' 
						}
					}				
				} 
			}
		},
		methods: {



			enable_input: function(name){
				if(name=='full_name'){
					this.full_name_input = false;
					this.changes.full_name.smallText.color = 'red';
					this.changes.full_name.smallButton.color = 'white';
					this.changes.full_name.smallButton.backgroundColor = 'red';
					//alert(this.full_name_input);
				}else if(name=='mobile'){
					this.mobile_input = false;
					this.changes.mobile.smallText.color = 'red';
					this.changes.mobile.smallButton.color = 'white';
					this.changes.mobile.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='institution_id'){
					this.institution_id_input = false;
					this.changes.institution_id.smallText.color = 'red';
					this.changes.institution_id.smallButton.color = 'white';
					this.changes.institution_id.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='nid_or_passport'){
					this.nid_or_passport_input = false;
					this.changes.nid_or_passport.smallText.color = 'red';
					this.changes.nid_or_passport.smallButton.color = 'white';
					this.changes.nid_or_passport.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='blood_group'){
					this.blood_group_input = false;
					this.changes.blood_group.smallText.color = 'red';
					this.changes.blood_group.smallButton.color = 'white';
					this.changes.blood_group.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='dob'){
					this.dob_input = false;
					this.changes.dob.smallText.color = 'red';
					this.changes.dob.smallButton.color = 'white';
					this.changes.dob.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}
			},
			validityCheckInput( inputName  ){
				if(inputName == 'full_name'){
					console.log(this.full_name);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.full_name);

					result == false ? this.full_name_validity = 'invalid' : this.full_name_validity = 'valid';


				}else if(inputName == 'mobile'){
					console.log(this.mobile);
					var patt= /[\+]{0,1}[\d]{11,}/g;
					var result = patt.test(this.mobile);

					result == false ? this.mobile_validity = 'invalid' : this.mobile_validity = 'valid';


				}else if(inputName == 'institution_id'){
					console.log(this.institution_id);
					var patt= /[\S]{5,}/g;
					var result = patt.test(this.institution_id);

					result == false ? this.institution_id_validity = 'invalid' : this.institution_id_validity = 'valid';


				}else if(inputName == 'nid_or_passport'){
					console.log(this.nid_or_passport);
					var patt= /[\S]{10,}/g;
					var result = patt.test(this.nid_or_passport);

					result == false ? this.nid_or_passport_validity = 'invalid' : this.nid_or_passport_validity = 'valid';


				}
			},
			onChangeValidity(inputName){
				if(inputName == 'blood_group'){
					console.log(this.blood_group);
					var patt= /[\+-A-O]{1,3}/g;
					var result = patt.test(this.blood_group);

					result == false ? this.blood_group_validity = 'invalid' : this.blood_group_validity = 'valid';


				}else if(inputName == 'dob'){
					console.log(this.dob);
					var patt= /^([0-9]{4})([-]{1}[0-9]{2}[-]{1}[0-9]{2}$)/igm;
					var result = patt.test(this.dob);
					console.log(result);
					var patt = /^([0-9]{4})/g;
					const matches = this.dob.match(patt);
					console.log(matches[0]);


					if(result == true && matches[0]>1950 && matches[0] <2000){
						this.dob_validity = 'valid';
					}else{
						this.dob_validity = 'invalid';
					}

					//result == false ? this.dob_validity = 'invalid' : this.dob_validity = 'valid';
					




				}
			},
			submit(){
				//alert(this.blood_group);

				this.validityCheckInput('full_name');
				this.validityCheckInput('mobile');
				this.validityCheckInput('institution_id');
				this.validityCheckInput('nid_or_passport');

				this.onChangeValidity('blood_group');
				this.onChangeValidity('dob');

				if(this.full_name_validity == 'valid' && this.mobile_validity == 'valid' && this.institution_id_validity == 'valid' && this.nid_or_passport_validity == 'valid' && this.blood_group_validity == 'valid' && this.dob_validity == 'valid' ){

					axios.post( this.model.modelProfile_update ,
					{
						purpose: 'basic',
						full_name: this.full_name,
						mobile: this.mobile,
						institution_id: this.institution_id,
						nid_or_passport: this.nid_or_passport,
						blood_group: this.blood_group,
						dob: this.dob,
					}
					).then(function(response){

						console.log(response);

						this.status_text = 'Update requested successfully! wait for admin approval';
						this.dialog = true;


					}.bind(this))
					.catch(function(error){



        //console.log(error);
    }.bind(this));






				}else{
					this.status_text = 'all field are not valid';
					this.dialog = true;
					//alert('all filed are not valid');
				}



			}

		},
		created(){
			axios.post( this.model.modelProfile_update ,
			{
				purpose: 'getProfileBasicInfo',
				
			}
			).then(function(response){
				
				console.log(response);
				this.full_name = response.data.full_name;


				this.full_name = response.data.full_name;
				this.mobile = response.data.mobile;
				this.institution_id = response.data.institution_id;
				this.nid_or_passport = response.data.nid_or_passport;
				this.blood_group = response.data.blood_group;
				this.dob = response.data.date_of_birth;



			}.bind(this))
			.catch(function(error){

				

        //console.log(error);
    }.bind(this));
		}
	})









var code = `<div class="container-fluid bg-light mt-5 ">
<div class="row justify-content-center align-items-center">

<!-- update top part starts-->

<div class="  col-4  px-0 py-1" style="box-shadow: 0 0 10px lightgrey; ">


<div class="row bg-white mx-1">

<div class="col-3 mr-0 pr-0 my-2">
<img class="rounded img-thumbnail img-fluid" v-bind:src="profile_photo" alt="">
<div class="w-100"></div>
</div>
<div class="col-9  ml-0">
<p class="h3 ">

</p>
<p class="h4 ">System Adminstrator at <span class="font-weight-bold">Umart</span></p>
</div>

</div>

<!-- update top part ends-->


<!-- update field part starts -->
<div class="row bg-white mt-4 justify-content-center mx-1">
<div class="w-100 bg-info">
<p class="h3 text-white pl-4 pt-2"> <i class="fas fa-info-circle mr-0"></i> Upload Photos</p>
</div>

<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class=""  > <span>recent Photo</span></small>

<div class="custom-file">
<input type="file" ref="recent_photo" v-on:change="handleFileUpload_recent()" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
<label class="custom-file-label" for="inputGroupFile01">{{ recent_photo_name }}</label>
</div>

</div>

<div class="col-10 mx-0 px-0 ">
<v-btn :loading='loading_recent_photo' @click="uploadPhoto_recent()" block depressed color="blue-grey" id="idButtonUpdateProfileDashboard" class="white--text">
Upload <v-icon right dark>mdi-cloud-upload</v-icon>
</v-btn>
</div>

<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class=""  > <span>old Photo</span></small>


<div class="custom-file">
<input type="file" ref="old_photo" v-on:change="handleFileUpload_old()" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
<label class="custom-file-label" for="inputGroupFile01">{{ old_photo_name }}</label>
</div>

</div>

<div class="col-10 mx-0 px-0 ">
<v-btn :loading='loading_old_photo' @click="uploadPhoto_old()" block depressed color="blue-grey" id="idButtonUpdateProfileDashboard" class="white--text">
Upload <v-icon right dark>mdi-cloud-upload</v-icon>
</v-btn>
</div>

<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class=""  > <span>group Photo</span></small>


<div class="custom-file">
<input type="file" ref="group_photo" v-on:change="handleFileUpload_group()" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
<label class="custom-file-label" for="inputGroupFile01">{{ group_photo_name }}</label>
</div>

</div>

<div class="col-10 mx-0 px-0 ">
<v-btn :loading='loading_group_photo' @click="uploadPhoto_group()" block depressed color="blue-grey" id="idButtonUpdateProfileDashboard" class="white--text">
Upload <v-icon right dark>mdi-cloud-upload</v-icon>
</v-btn>
</div>


<!-- update field part ends -->

</div>
</div>
</div>



<v-dialog
v-model="dialog"
max-width="290"
>
<v-card>
<v-card-title class="headline">Photo Upload Status</v-card-title>

<v-card-text class="black--text">
{{ status }}
</v-card-text>

<v-card-actions>
<v-spacer></v-spacer>

<v-btn
color="green darken-1"
text
@click="dialog = false"
>
OK
</v-btn>
</v-card-actions>
</v-card>
</v-dialog>

</div>	`;

Vue.component('photos' , {
	props: ['profile_photo'],
	template: code,
	data(){
		return {
			name: 'riyad---vue',
			dialog: false,
			status: '',
			recent_photo: '',
			recent_photo_name: 'choose file',
			old_photo: '',
			old_photo_name: 'choose file',
			group_photo: '',
			group_photo_name: 'choose file',
			loading_recent_photo:false,
			loading_old_photo:false,
			loading_group_photo:false,
			file_type: false,

		}
	},
	methods: {
		uploadPhoto_recent: function(){

				//alert(this.csrf_token1);
				if(this.file_type == true){
					this.loading_recent_photo = true;

					let formData = new FormData();
					formData.append('recent_photo', this.recent_photo);
					formData.append('purpose', 'recent_photo');
					formData.append('email', 'riyad298@gmail.com');
					formData.append('csrf_token1', this.csrf_token1);
					axios.post( this.model.modelUploadPhotos ,
						formData,
						{	

							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}
						).then(function(response){
							this.loading_recent_photo = false;
							this.status = 'upload successful';
							this.dialog = true;
							this.recent_photo_name = 'choose file';
							console.log(response);
						}.bind(this))
						.catch(function(error){
							this.loading_recent_photo = false;
							this.status = 'You are not authorized';
							this.dialog = true;
							this.recent_photo_name = 'choose file';
							console.log(error);
						}.bind(this));
						

						this.file_type = false;

					}else{

						this.status = 'select right type of file first';
						this.dialog = true;

					}
				},
				handleFileUpload_recent: function(){
				//alert('uploading files');
				this.recent_photo = this.$refs.recent_photo.files[0];
				console.log(this.recent_photo.size/1024/1024);
				console.log(this.recent_photo);

				var patt = /^(image\/){1}[A-Za-z]*/g;
				var result = patt.test(this.recent_photo.type);


				if(!result){
					this.file_type = false;
					this.status = 'incorrect file type\n select again';
					this.dialog = true;
				}else{
					this.file_type = true;
					this.recent_photo_name = this.recent_photo.name.slice(0,15);
					this.recent_photo = this.$refs.recent_photo.files[0];
				}
				


			},
			uploadPhoto_old: function(){

				//alert(this.csrf_token1);
				if(this.file_type == true){
					this.loading_old_photo = true;

					let formData = new FormData();
					formData.append('old_photo', this.old_photo);
					formData.append('purpose', 'old_photo');
					formData.append('email', 'riyad298@gmail.com');
					formData.append('csrf_token1', this.csrf_token1);
					axios.post( this.model.modelUploadPhotos,
						formData,
						{	

							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}
						).then(function(response){
							this.loading_old_photo = false;
							this.status = 'upload successful';
							this.dialog = true;
							this.old_photo_name = 'choose file';

							console.log(response);
						}.bind(this))
						.catch(function(error){
							this.loading_old_photo = false;
							this.status = 'You are not authorized';
							this.dialog = true;
							this.old_photo_name = 'choose file';

							console.log(error);
						}.bind(this));
						

						this.file_type = false;

					}else{

						this.status = 'select right type of file first';
						this.dialog = true;

					}
				},
				handleFileUpload_old: function(){
				//alert('uploading files');
				this.old_photo = this.$refs.old_photo.files[0];
				console.log(this.old_photo.size/1024/1024);
				console.log(this.old_photo);

				var patt = /^(image\/){1}[A-Za-z]*/g;
				var result = patt.test(this.old_photo.type);


				if(!result){
					this.file_type = false;
					this.status = 'incorrect file type\n select again';
					this.dialog = true;
				}else{
					this.file_type = true;
					this.old_photo_name = this.old_photo.name.slice(0,15);
					this.old_photo = this.$refs.old_photo.files[0];
				}



			},
			uploadPhoto_group: function(){

				//alert(this.csrf_token1);
				if(this.file_type == true){
					this.loading_group_photo = true;

					let formData = new FormData();
					formData.append('group_photo', this.group_photo);
					formData.append('purpose', 'group_photo');
					formData.append('email', 'riyad298@gmail.com');
					formData.append('csrf_token1', this.csrf_token1);
					axios.post( this.model.modelUploadPhotos,
						formData,
						{	

							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}
						).then(function(response){
							this.loading_group_photo = false;
							this.status = 'upload successful';
							this.dialog = true;
							this.group_photo_name = 'choose file';

							console.log(response);
						}.bind(this))
						.catch(function(error){
							this.loading_group_photo = false;
							this.status = 'You are not authorized';
							this.dialog = true;
							this.group_photo_name = 'choose file';

							console.log(error);
						}.bind(this));
						

						this.file_type = false;

					}else{

						this.status = 'select right type of file first';
						this.dialog = true;

					}
				},
				handleFileUpload_group: function(){
				//alert('uploading files');
				this.group_photo = this.$refs.group_photo.files[0];
				console.log(this.group_photo.size/1024/1024);
				console.log(this.group_photo);

				var patt = /^(image\/){1}[A-Za-z]*/g;
				var result = patt.test(this.group_photo.type);


				if(!result){
					this.file_type = false;
					this.status = 'incorrect file type\n select again';
					this.dialog = true;
				}else{
					this.file_type = true;
					this.group_photo_name = this.group_photo.name.slice(0,15);
					this.group_photo = this.$refs.group_photo.files[0];
				}



			}

		}
	})










var code = `<div class="container-fluid bg-light mt-5 ">
<div class="row justify-content-center align-items-center">

<!-- update top part starts-->

<div class="  col-4  px-0 py-1" style="box-shadow: 0 0 10px lightgrey; ">


<div class="row bg-white mx-1">

<div class="col-3 mr-0 pr-0 my-2">
<img class="rounded img-thumbnail img-fluid" v-bind:src="profile_photo" alt="">
<div class="w-100"></div>
</div>
<div class="col-9  ml-0">
<p class="h3 ">

</p>
<p class="h4 ">System Adminstrator at <span class="font-weight-bold">Umart</span></p>
</div>

</div>

<!-- update top part ends-->


<!-- update field part starts -->
<div class="row bg-white mt-4 justify-content-center mx-1">
<div class="w-100 bg-info">
<p class="h3 text-white pl-4 pt-2"> <i class="fas fa-info-circle mr-0"></i> Personal Info</p>
</div>

<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.fathers_name.smallText ' > <span>fathers_name




<span v-show="fathers_name_validity == 'valid'" class="text-success"> {{ fathers_name_validity }} </span>
<span v-show="fathers_name_validity == 'invalid'" class="text-danger"> {{ fathers_name_validity }} </span>







</span> <span @click="enable_input('fathers_name')" id="idSpanEmailChangeDashboard" v-bind:style="changes.fathers_name.smallButton" class="small_button">Change</span></small>

<input v-model="fathers_name" @keyup="onChangeValidity('fathers_name')" :disabled='fathers_name_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your fathers_name Here" type="text" value="" >

</div>
<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.mothers_name.smallText ' > <span>mothers_name



<span v-show="mothers_name_validity == 'valid'" class="text-success"> {{ mothers_name_validity }} </span>
<span v-show="mothers_name_validity == 'invalid'" class="text-danger"> {{ mothers_name_validity }} </span>




</span> <span @click="enable_input('mothers_name')" id="idSpanEmailChangeDashboard" v-bind:style="changes.mothers_name.smallButton" class="small_button">Change</span></small>

<input v-model="mothers_name" @keyup="onChangeValidity('mothers_name')"  :disabled='mothers_name_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your mothers_name Here" type="text" value="" >

</div>


<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.spouse_name.smallText ' > <span>spouse_name




<span v-show="spouse_name_validity == 'valid'" class="text-success"> {{ spouse_name_validity }} </span>
<span v-show="spouse_name_validity == 'invalid'" class="text-danger"> {{ spouse_name_validity }} </span>







</span> <span @click="enable_input('spouse_name')" id="idSpanEmailChangeDashboard" v-bind:style="changes.spouse_name.smallButton" class="small_button">Change</span></small>

<input v-model="spouse_name" @keyup="onChangeValidity('spouse_name')" :disabled='spouse_name_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your spouse_name Here" type="text" value="" >

</div>

<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.number_of_children.smallText ' > <span>number_of_children




<span v-show="number_of_children_validity == 'valid'" class="text-success"> {{ number_of_children_validity }} </span>
<span v-show="number_of_children_validity == 'invalid'" class="text-danger"> {{ number_of_children_validity }} </span>







</span> <span @click="enable_input('number_of_children')" id="idSpanEmailChangeDashboard" v-bind:style="changes.number_of_children.smallButton" class="small_button">Change</span></small>

<input v-model="number_of_children" @keyup="onChangeValidity('number_of_children')"  :disabled='number_of_children_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your number_of_children Here" type="text" value="" >

</div>

<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.profession.smallText ' > <span>profession


<span v-show="profession_validity == 'valid'" class="text-success"> {{ profession_validity }} </span>
<span v-show="profession_validity == 'invalid'" class="text-danger"> {{ profession_validity }} </span>



</span> <span @click="enable_input('profession')" id="idSpanEmailChangeDashboard" v-bind:style="changes.profession.smallButton" class="small_button">Change</span></small>

<input v-model="profession" @keyup="onChangeValidity('profession')" 
:disabled='profession_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your profession Here" type="text" value="" >

</div>


<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.workplace_or_institution.smallText ' > <span>workplace_or_institution


<span v-show="workplace_or_institution_validity == 'valid'" class="text-success"> {{ workplace_or_institution_validity }} </span>
<span v-show="workplace_or_institution_validity == 'invalid'" class="text-danger"> {{ workplace_or_institution_validity }} </span>



</span> <span @click="enable_input('workplace_or_institution')" id="idSpanEmailChangeDashboard" v-bind:style="changes.workplace_or_institution.smallButton" class="small_button">Change</span></small>

<input v-model="workplace_or_institution" @keyup="onChangeValidity('workplace_or_institution')" 
:disabled='workplace_or_institution_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your workplace_or_institution Here" type="text" value="" >

</div>

<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.designation.smallText ' > <span>designation



<span v-show="designation_validity == 'valid'" class="text-success"> {{ designation_validity }} </span>
<span v-show="designation_validity == 'invalid'" class="text-danger"> {{ designation_validity }} </span>






</span> <span @click="enable_input('designation')" id="idSpanEmailChangeDashboard" v-bind:style="changes.designation.smallButton" class="small_button">Change</span></small>

<input v-model="designation" @keyup="onChangeValidity('designation')"  :disabled='designation_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your designation Here" type="text" value="" >

</div>


<div class="col-10 mx-0 px-0 ">
<button @click="submit()" id="idButtonUpdateProfileDashboard" class="btn btn-danger btn-block mb-3 mx-0 rounded-0">
Update Info
</button>
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

Vue.component('personal' , {
	props: ['profile_photo' , 'CSRF_TOKEN' ],
	template: code,
	data(){
		return {
			name: 'riyad---vue',
			dialog: '' , 
			status_text: '',
			fathers_name_input: true,
			mothers_name_input: true,
			spouse_name_input: true,
			number_of_children_input: true,
			dob_input: true,
			profession_input: true,
			workplace_or_institution_input: true,
			designation_input: true,
			fathers_name: '',
			mothers_name: '',
			spouse_name: '',
			number_of_children: '',
			dob: '',
			profession: '',
			workplace_or_institution: '',
			designation: '',
			designation_validity: false,
			fathers_name_validity: false,
			mothers_name_validity: false,
			spouse_name_validity: false,
			number_of_children_validity: false,
			dob_validity: false,
			profession_validity: false,
			workplace_or_institution_validity: false,
			designation_validity: false,
			changes:{
				fathers_name:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				mothers_name:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				spouse_name:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				number_of_children:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				profession:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				workplace_or_institution:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				designation:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				}				
			} 
		}
	},
	methods: {

		enable_input: function(name){
			if(name=='fathers_name'){
				this.fathers_name_input = false;
				this.changes.fathers_name.smallText.color = 'red';
				this.changes.fathers_name.smallButton.color = 'white';
				this.changes.fathers_name.smallButton.backgroundColor = 'red';
					//alert(this.fathers_name_input);
				}else if(name=='mothers_name'){
					this.mothers_name_input = false;
					this.changes.mothers_name.smallText.color = 'red';
					this.changes.mothers_name.smallButton.color = 'white';
					this.changes.mothers_name.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='spouse_name'){
					this.spouse_name_input = false;
					this.changes.spouse_name.smallText.color = 'red';
					this.changes.spouse_name.smallButton.color = 'white';
					this.changes.spouse_name.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='number_of_children'){
					this.number_of_children_input = false;
					this.changes.number_of_children.smallText.color = 'red';
					this.changes.number_of_children.smallButton.color = 'white';
					this.changes.number_of_children.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='profession'){
					this.profession_input = false;
					this.changes.profession.smallText.color = 'red';
					this.changes.profession.smallButton.color = 'white';
					this.changes.profession.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='workplace_or_institution'){
					this.workplace_or_institution_input = false;
					this.changes.workplace_or_institution.smallText.color = 'red';
					this.changes.workplace_or_institution.smallButton.color = 'white';
					this.changes.workplace_or_institution.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='designation'){
					this.designation_input = false;
					this.changes.designation.smallText.color = 'red';
					this.changes.designation.smallButton.color = 'white';
					this.changes.designation.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}
			},
			onChangeValidity(inputName){
				console.log(this.fathers_name);
				if(inputName == 'fathers_name'){
					console.log(this.fathers_name);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.fathers_name);

					result == false ? this.fathers_name_validity = 'invalid' : this.fathers_name_validity = 'valid';


				}else if(inputName == 'mothers_name'){
					console.log(this.mothers_name);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.mothers_name);

					result == false ? this.mothers_name_validity = 'invalid' : this.mothers_name_validity = 'valid';
				}else if(inputName == 'spouse_name'){
					console.log(this.spouse_name);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.spouse_name);

					result == false ? this.spouse_name_validity = 'invalid' : this.spouse_name_validity = 'valid';
				}else if(inputName == 'number_of_children'){
					console.log(this.number_of_children);
					var patt= /^[\d]{1,2}$/g;
					var result = patt.test(this.number_of_children);

					result == false ? this.number_of_children_validity = 'invalid' : this.number_of_children_validity = 'valid';
				}else if(inputName == 'profession'){
					console.log(this.profession);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.profession);

					result == false ? this.profession_validity = 'invalid' : this.profession_validity = 'valid';
				}else if(inputName == 'workplace_or_institution'){
					console.log(this.workplace_or_institution);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.workplace_or_institution);

					result == false ? this.workplace_or_institution_validity = 'invalid' : this.workplace_or_institution_validity = 'valid';
				}else if(inputName == 'designation'){
					console.log(this.designation);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.designation);

					result == false ? this.designation_validity = 'invalid' : this.designation_validity = 'valid';
				}

			},
			submit(){
				
				this.onChangeValidity('fathers_name');
				this.onChangeValidity('mothers_name');
				this.onChangeValidity('spouse_name');
				this.onChangeValidity('number_of_children');
				this.onChangeValidity('profession');
				this.onChangeValidity('workplace_or_institution');
				this.onChangeValidity('designation');


				if( this.fathers_name_validity == 'valid' &&  this.mothers_name_validity == 'valid' && this.spouse_name_validity == 'valid' && this.number_of_children_validity == 'valid' &&  this.profession_validity == 'valid' && this.workplace_or_institution_validity == 'valid' && this.designation_validity == 'valid' ){



					axios.post( this.model.modelProfile_update ,
					{
						purpose: 'personal',
						fathers_name: this.fathers_name,
						mothers_name: this.mothers_name,
						spouse_name: this.spouse_name,
						number_of_children: this.number_of_children,
						profession: this.profession,
						workplace_or_institution: this.workplace_or_institution,
						designation: this.designation,
					}
					).then(function(response){

						console.log(response);

						this.status_text = 'Update requested successfully! wait for admin approval';
						this.dialog = true;


					}.bind(this))
					.catch(function(error){



        //console.log(error);
    }.bind(this));

					this.status_text = 'All fields are valid';
					this.dialog = true ;

				}else{
					this.status_text = 'invalid fields detected';
					this.dialog = true ;
				}


			}


		},
		created(){


			axios.post( this.model.modelProfile_update ,
			{
				purpose: 'getProfileBasicInfo',
				
			}
			).then(function(response){
				
				console.log(response);
				this.full_name = response.data.full_name;


				this.fathers_name = response.data.fathers_name;
				this.mothers_name = response.data.mother_name;
				this.spouse_name = response.data.spouse_name;
				this.number_of_children = response.data.number_of_children;
				this.number_of_children = response.data.number_of_children;
				this.profession = response.data.profession;
				this.workplace_or_institution = response.data.institution;
				this.designation = response.data.designation;


			}.bind(this))
			.catch(function(error){

				

        //console.log(error);
    }.bind(this));




		}
	})









var code = `<div class="container-fluid bg-light mt-5 ">
<div class="row justify-content-center align-items-center">

<!-- update top part starts-->

<div class="  col-4  px-0 py-1" style="box-shadow: 0 0 10px lightgrey; ">


<div class="row bg-white mx-1">

<div class="col-3 mr-0 pr-0 my-2">
<img class="rounded img-thumbnail img-fluid" v-bind:src="profile_photo" alt="">
<div class="w-100"></div>
</div>
<div class="col-9  ml-0">
<p class="h3 ">

</p>
<p class="h4 ">System Adminstrator at <span class="font-weight-bold">Umart</span></p>
</div>

</div>

<!-- update top part ends-->


<!-- update field part starts -->
<div class="row bg-white mt-4 justify-content-center mx-1">
<div class="w-100 bg-info">
<p class="h3 text-white pl-4 pt-2"> <i class="fas fa-info-circle mr-0"></i> Adress Info</p>
</div>

<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.present_line1.smallText ' > <span>present_line1




<span v-show="present_line1_validity == 'valid'" class="text-success"> {{ present_line1_validity }} </span>
<span v-show="present_line1_validity == 'invalid'" class="text-danger"> {{ present_line1_validity }} </span>



</span> <span @click="enable_input('present_line1')" id="idSpanEmailChangeDashboard" v-bind:style="changes.present_line1.smallButton" class="small_button">Change</span></small>

<input  v-model="present_line1" @keyup="onChangeValidity('present_line1')" :disabled='present_line1_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your present_line1 Here" type="text" value="" >

</div>




<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.present_post_code.smallText ' > <span>present_post_code



<span v-show="present_post_code_validity == 'valid'" class="text-success"> {{ present_post_code_validity }} </span>
<span v-show="present_post_code_validity == 'invalid'" class="text-danger"> {{ present_post_code_validity }} </span>




</span> <span @click="enable_input('present_post_code')" id="idSpanEmailChangeDashboard" v-bind:style="changes.present_post_code.smallButton" class="small_button">Change</span></small>

<input v-model="present_post_code" @keyup="onChangeValidity('present_post_code')"  :disabled='present_post_code_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your present_post_code Here" type="text" value="" >

</div>




<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.present_district.smallText ' > <span>present_district




<span v-show="present_district_validity == 'valid'" class="text-success"> {{ present_district_validity }} </span>
<span v-show="present_district_validity == 'invalid'" class="text-danger"> {{ present_district_validity }} </span>






</span> <span @click="enable_input('present_district')" id="idSpanEmailChangeDashboard" v-bind:style="changes.present_district.smallButton" class="small_button">Change</span></small>

<input  v-model="present_district" @keyup="onChangeValidity('present_district')" 
:disabled='present_district_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your present_district Here" type="text" value="" >

</div>




<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.present_country.smallText ' > <span>present_country






<span v-show="present_country_validity == 'valid'" class="text-success"> {{ present_country_validity }} </span>
<span v-show="present_country_validity == 'invalid'" class="text-danger"> {{ present_country_validity }} </span>





</span> <span @click="enable_input('present_country')" id="idSpanEmailChangeDashboard" v-bind:style="changes.present_country.smallButton" class="small_button">Change</span></small>


<input  v-model="present_country" @keyup="onChangeValidity('present_country')"   :disabled='present_country_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your present_country Here" type="text" value="" >

</div>



<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.permanent_line1.smallText ' > <span>permanent_line1




<span v-show="permanent_line1_validity == 'valid'" class="text-success"> {{ permanent_line1_validity }} </span>
<span v-show="permanent_line1_validity == 'invalid'" class="text-danger"> {{ permanent_line1_validity }} </span>





</span> <span @click="enable_input('permanent_line1')" id="idSpanEmailChangeDashboard" v-bind:style="changes.permanent_line1.smallButton" class="small_button">Change</span></small>

<input v-model="permanent_line1" @keyup="onChangeValidity('permanent_line1')" :disabled='permanent_line1_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your permanent_line1 Here" type="text" value="" >

</div>




<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.permanent_post_code.smallText ' > <span>permanent_post_code




<span v-show="permanent_post_code_validity == 'valid'" class="text-success"> {{ permanent_post_code_validity }} </span>
<span v-show="permanent_post_code_validity == 'invalid'" class="text-danger"> {{ permanent_post_code_validity }} </span>





</span> <span @click="enable_input('permanent_post_code')" id="idSpanEmailChangeDashboard" v-bind:style="changes.permanent_post_code.smallButton" class="small_button">Change</span></small>

<input  v-model="permanent_post_code" @keyup="onChangeValidity('permanent_post_code')" 
:disabled='permanent_post_code_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your permanent_post_code Here" type="text" value="" >

</div>




<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.permanent_district.smallText ' > <span>permanent_district



<span v-show="permanent_district_validity == 'valid'" class="text-success"> {{ permanent_district_validity }} </span>
<span v-show="permanent_district_validity == 'invalid'" class="text-danger"> {{ permanent_district_validity }} </span>



</span> <span @click="enable_input('permanent_district')" id="idSpanEmailChangeDashboard" v-bind:style="changes.permanent_district.smallButton" class="small_button">Change</span></small>

<input v-model="permanent_district" @keyup="onChangeValidity('permanent_district')" 
:disabled='permanent_district_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your permanent_district Here" type="text" value="" >

</div>



<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.permanent_country.smallText ' > <span>permanent_country



<span v-show="permanent_country_validity == 'valid'" class="text-success"> {{ permanent_country_validity }} </span>
<span v-show="permanent_country_validity == 'invalid'" class="text-danger"> {{ permanent_country_validity }} </span>



</span> <span @click="enable_input('permanent_country')" id="idSpanEmailChangeDashboard" v-bind:style="changes.permanent_country.smallButton" class="small_button">Change</span></small>

<input  v-model="permanent_country" @keyup="onChangeValidity('permanent_country')" 
:disabled='permanent_country_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your permanent_country Here" type="text" value="" >

</div>



<div class="col-10 mx-0 px-0 ">
<button @click="submit()" id="idButtonUpdateProfileDashboard" class="btn btn-danger btn-block mb-3 mx-0 rounded-0">
Update Info
</button>
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

Vue.component('address1' , {
	props: ['profile_photo' , 'CSRF_TOKEN'],
	template: code,
	data(){
		return {
			name: 'riyad---vue',
			dialog: false,
			status_text: '' ,
			present_line1_input: true,
			present_line2_input: true,
			present_district_input: true,
			present_post_code_input: true,
			present_country_input: true,
			permanent_line1_input: true,
			permanent_line2_input: true,
			permanent_district_input: true,
			permanent_post_code_input: true,
			permanent_country_input: true,
			present_line1_validity: false,
			present_line2_validity: false,
			present_district_validity: false,
			present_post_code_validity: false,
			present_country_validity: false,
			permanent_line1_validity: false,
			permanent_line2_validity: false,
			permanent_district_validity: false,
			permanent_post_code_validity: false,
			permanent_country_validity: false,
			present_line1: '',
			present_line2: '',
			present_district: '',
			present_post_code: '',
			present_country: '',
			permanent_line1: '',
			permanent_line2: '',
			permanent_district: '',
			permanent_post_code: '',
			permanent_country: '',
			changes:{
				present_line1:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				present_line2:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				present_district:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				present_post_code:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				present_country:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				permanent_line1:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				permanent_line2:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				permanent_district:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				permanent_post_code:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				},
				permanent_country:{
					smallText: {
						color: '#2196f3'					
					},
					smallButton: {
						color: 'white',
						backgroundColor: '#2196f3' 
					}
				}			
			} 
		}
	},
	methods: {
		enable_input: function(name){
			if(name=='present_line1'){
				this.present_line1_input = false;
				this.changes.present_line1.smallText.color = 'red';
				this.changes.present_line1.smallButton.color = 'white';
				this.changes.present_line1.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='present_line2'){
					this.present_line2_input = false;
					this.changes.present_line2.smallText.color = 'red';
					this.changes.present_line2.smallButton.color = 'white';
					this.changes.present_line2.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='present_district'){
					this.present_district_input = false;
					this.changes.present_district.smallText.color = 'red';
					this.changes.present_district.smallButton.color = 'white';
					this.changes.present_district.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='present_post_code'){
					this.present_post_code_input = false;
					this.changes.present_post_code.smallText.color = 'red';
					this.changes.present_post_code.smallButton.color = 'white';
					this.changes.present_post_code.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='present_country'){
					this.present_country_input = false;
					this.changes.present_country.smallText.color = 'red';
					this.changes.present_country.smallButton.color = 'white';
					this.changes.present_country.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}
				else if(name=='permanent_line1'){
					this.permanent_line1_input = false;
					this.changes.permanent_line1.smallText.color = 'red';
					this.changes.permanent_line1.smallButton.color = 'white';
					this.changes.permanent_line1.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='permanent_line2'){
					this.permanent_line2_input = false;
					this.changes.permanent_line2.smallText.color = 'red';
					this.changes.permanent_line2.smallButton.color = 'white';
					this.changes.permanent_line2.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='permanent_district'){
					this.permanent_district_input = false;
					this.changes.permanent_district.smallText.color = 'red';
					this.changes.permanent_district.smallButton.color = 'white';
					this.changes.permanent_district.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='permanent_post_code'){
					this.permanent_post_code_input = false;
					this.changes.permanent_post_code.smallText.color = 'red';
					this.changes.permanent_post_code.smallButton.color = 'white';
					this.changes.permanent_post_code.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='permanent_country'){
					this.permanent_country_input = false;
					this.changes.permanent_country.smallText.color = 'red';
					this.changes.permanent_country.smallButton.color = 'white';
					this.changes.permanent_country.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}
			},
			onChangeValidity(inputName){
				// console.log(this.present_line1);
				// console.log(this.present_district);
				// console.log(this.present_country);
				// console.log(this.present_post_code);
				// console.log(this.permanent_line1);
				// console.log(this.permanent_district);
				// console.log(this.permanent_country);
				// console.log(this.permanent_post_code);

				if(inputName == 'present_line1'){
					console.log(this.present_line1);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.present_line1);

					result == false ? this.present_line1_validity = 'invalid' : this.present_line1_validity = 'valid';

				}else if(inputName == 'present_district'){
					console.log(this.present_district);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.present_district);

					result == false ? this.present_district_validity = 'invalid' : this.present_district_validity = 'valid';

				}else if(inputName == 'present_country'){
					console.log(this.present_country);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.present_country);

					result == false ? this.present_country_validity = 'invalid' : this.present_country_validity = 'valid';

				}else if(inputName == 'present_post_code'){
					console.log(this.present_post_code);
					var patt= /[\+]{0,1}[\d]{4,}/g;
					var result = patt.test(this.present_post_code);

					result == false ? this.present_post_code_validity = 'invalid' : this.present_post_code_validity = 'valid';

				}else if(inputName == 'permanent_line1'){
					console.log(this.permanent_line1);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.permanent_line1);

					result == false ? this.permanent_line1_validity = 'invalid' : this.permanent_line1_validity = 'valid';

				}else if(inputName == 'permanent_district'){
					console.log(this.permanent_district);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.permanent_district);

					result == false ? this.permanent_district_validity = 'invalid' : this.permanent_district_validity = 'valid';

				}else if(inputName == 'permanent_country'){
					console.log(this.permanent_country);
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.permanent_country);

					result == false ? this.permanent_country_validity = 'invalid' : this.permanent_country_validity = 'valid';

				}else if(inputName == 'permanent_post_code'){
					console.log(this.permanent_post_code);
					var patt= /[\+]{0,1}[\d]{4,}/g;
					var result = patt.test(this.permanent_post_code);

					result == false ? this.permanent_post_code_validity = 'invalid' : this.permanent_post_code_validity = 'valid';

				}



			},
			submit(){

				this.onChangeValidity('present_line1');
				this.onChangeValidity('present_district');
				this.onChangeValidity('present_post_code');
				this.onChangeValidity('present_country');
				this.onChangeValidity('permanent_line1');
				this.onChangeValidity('permanent_district');
				this.onChangeValidity('permanent_post_code');
				this.onChangeValidity('permanent_country');


				if(this.present_line1_validity == 'valid' && this.present_district_validity == 'valid' && this.present_country_validity == 'valid' && this.present_post_code_validity == 'valid' &&  this.permanent_line1_validity == 'valid' &&  this.permanent_district_validity == 'valid' &&  this.permanent_country_validity == 'valid' &&  this.permanent_post_code_validity == 'valid' ){

					
					axios.post( this.model.modelProfile_update ,
					{
						purpose: 'address1',
						present_line1: this.present_line1,
						present_district: this.present_district,
						present_post_code: this.present_post_code,
						present_country: this.present_country,
						permanent_line1: this.permanent_line1,
						permanent_district: this.permanent_district,
						permanent_post_code: this.permanent_post_code,
						permanent_country: this.permanent_country,
						
					}
					).then(function(response){

						console.log(response);

						this.status_text = 'Update requested successfully! wait for admin approval';
						this.dialog = true;


					}.bind(this))
					.catch(function(error){



        //console.log(error);
    }.bind(this));


					this.status_text = 'all fields are valid';
					this.dialog = true;




				}else {

					this.status_text = 'all fields are not valid';
					this.dialog = true;

				}


			},

		},
		created(){





			axios.post( this.model.modelProfile_update ,
			{
				purpose: 'getProfileBasicInfo',
				
			}
			).then(function(response){
				
				console.log(response);
				
				this.present_line1 = response.data.present_line1;
				this.present_district = response.data.present_district;
				this.present_post_code = response.data.present_post_code;
				this.present_district = response.data.present_district;
				
				this.permanent_line1 = response.data.parmanent_line1;
				this.permanent_district = response.data.parmanent_district;
				this.permanent_post_code = response.data.parmanent_post_code;
				this.permanent_district = response.data.parmanent_district;

			}.bind(this))
			.catch(function(error){

				

        //console.log(error);
    }.bind(this));








			
		}
	})


var reg_req = new Vue({
	el: '#app' ,
	vuetify: new Vuetify(), 
	data : {
		name: 'riyad---vue',
		full_name_input: true,
		mobile_input: true,
		institution_id_input: true,
		number_of_children_input: true,
		dob_input: true,
		profile_photo: '',
		
		
	}, 
	methods : {
		enable_input: function(name){
			
		}


	},
	beforeCreate(){

	},
	created(){
		bus.$on('changeComponent' , (data)=>{
			this.componet_name = data;
		})

		this.profile_photo = this.images.profile_photo;

	},
	beforeMount(){

	},
	mounted(){

	},
	beforeUpdated(){

	},
	updated(){
		//alert(this.CSRF_TOKEN);

		var dashboard_height = $('#dashboard_height').height();
		var windowHeight = $(document).height();
		console.log('dashboard height= '+dashboard_height);
		console.log('window height= '+windowHeight);
		var ht = dashboard_height+'px';
		$('.dashboard_vertical_menu_height').height(ht);
		
	}
})



</script>
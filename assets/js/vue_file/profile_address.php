<script>
	
	
	var address1 = `<div class="container-fluid bg-light mt-5 ">
	<div class="row justify-content-center align-items-center">
	<!-- update top part starts-->
	<div class="  col-12 col-xl-4 col-md-7  px-0 py-1" style="box-shadow: 0 0 10px lightgrey; ">
	<div class="row bg-white mx-1">
	<div class="col-3 mr-0 pr-0 my-2">
	<img class="rounded img-thumbnail img-fluid" v-bind:src="profile_photo" alt="">
	<div class="w-100"></div>
	</div>
	<div class="col-9  ml-0">
	<p class="h3 ">
	</p>
	<p class="h4 ">Profile <span class="font-weight-bold"></span></p>
	</div>
	</div>
	<!-- update top part ends-->
	<!-- update field part starts -->
	<div class="row bg-white mt-4 justify-content-center mx-1">
	<div class="w-100 bg-info">
	<p class="h3 text-white pl-4 pt-2"> <i class="fas fa-info-circle mr-0"></i> Adress Info</p>
	</div>
	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.present_line1.smallText ' > <span>Present Address Line1
	<span v-show="present_line1_validity == 'valid'" class="text-success"> {{ present_line1_validity }} </span>
	<span v-show="present_line1_validity == 'invalid'" class="text-danger"> {{ present_line1_validity }} </span>
	</span> <span @click="enable_input('present_line1')" id="idSpanEmailChangeDashboard" v-bind:style="changes.present_line1.smallButton" class="small_button">Change</span></small>
	<input  v-model="present_line1" @keyup="onChangeValidity('present_line1')" :disabled='present_line1_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your present_line1 Here" type="text" value="" >
	</div>
	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.present_post_code.smallText ' > <span>Present Post Code
	<span v-show="present_post_code_validity == 'valid'" class="text-success"> {{ present_post_code_validity }} </span>
	<span v-show="present_post_code_validity == 'invalid'" class="text-danger"> {{ present_post_code_validity }} </span>
	</span> <span @click="enable_input('present_post_code')" id="idSpanEmailChangeDashboard" v-bind:style="changes.present_post_code.smallButton" class="small_button">Change</span></small>
	<input v-model="present_post_code" @keyup="onChangeValidity('present_post_code')"  :disabled='present_post_code_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your present_post_code Here" type="text" value="" >
	</div>
	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.present_district.smallText ' > <span>Present District
	<span v-show="present_district_validity == 'valid'" class="text-success"> {{ present_district_validity }} </span>
	<span v-show="present_district_validity == 'invalid'" class="text-danger"> {{ present_district_validity }} </span>
	</span> <span @click="enable_input('present_district')" id="idSpanEmailChangeDashboard" v-bind:style="changes.present_district.smallButton" class="small_button">Change</span></small>
	<input  v-model="present_district" @keyup="onChangeValidity('present_district')" 
	:disabled='present_district_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your present_district Here" type="text" value="" >
	</div>
	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.present_country.smallText ' > <span>Present Country
	<span v-show="present_country_validity == 'valid'" class="text-success"> {{ present_country_validity }} </span>
	<span v-show="present_country_validity == 'invalid'" class="text-danger"> {{ present_country_validity }} </span>
	</span> <span @click="enable_input('present_country')" id="idSpanEmailChangeDashboard" v-bind:style="changes.present_country.smallButton" class="small_button">Change</span></small>
	<input  v-model="present_country" @keyup="onChangeValidity('present_country')"   :disabled='present_country_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your present_country Here" type="text" value="" >
	</div>
	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.permanent_line1.smallText ' > <span>Permanent Address Line1
	<span v-show="permanent_line1_validity == 'valid'" class="text-success"> {{ permanent_line1_validity }} </span>
	<span v-show="permanent_line1_validity == 'invalid'" class="text-danger"> {{ permanent_line1_validity }} </span>
	</span> <span @click="enable_input('permanent_line1')" id="idSpanEmailChangeDashboard" v-bind:style="changes.permanent_line1.smallButton" class="small_button">Change</span></small>
	<input v-model="permanent_line1" @keyup="onChangeValidity('permanent_line1')" :disabled='permanent_line1_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your permanent_line1 Here" type="text" value="" >
	</div>
	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.permanent_post_code.smallText ' > <span>Permanent Post Code
	<span v-show="permanent_post_code_validity == 'valid'" class="text-success"> {{ permanent_post_code_validity }} </span>
	<span v-show="permanent_post_code_validity == 'invalid'" class="text-danger"> {{ permanent_post_code_validity }} </span>
	</span> <span @click="enable_input('permanent_post_code')" id="idSpanEmailChangeDashboard" v-bind:style="changes.permanent_post_code.smallButton" class="small_button">Change</span></small>
	<input  v-model="permanent_post_code" @keyup="onChangeValidity('permanent_post_code')" 
	:disabled='permanent_post_code_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your permanent_post_code Here" type="text" value="" >
	</div>
	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.permanent_district.smallText ' > <span>Permanent District
	<span v-show="permanent_district_validity == 'valid'" class="text-success"> {{ permanent_district_validity }} </span>
	<span v-show="permanent_district_validity == 'invalid'" class="text-danger"> {{ permanent_district_validity }} </span>
	</span> <span @click="enable_input('permanent_district')" id="idSpanEmailChangeDashboard" v-bind:style="changes.permanent_district.smallButton" class="small_button">Change</span></small>
	<input v-model="permanent_district" @keyup="onChangeValidity('permanent_district')" 
	:disabled='permanent_district_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your permanent_district Here" type="text" value="" >
	</div>
	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.permanent_country.smallText ' > <span>Permanent Country
	<span v-show="permanent_country_validity == 'valid'" class="text-success"> {{ permanent_country_validity }} </span>
	<span v-show="permanent_country_validity == 'invalid'" class="text-danger"> {{ permanent_country_validity }} </span>
	</span> <span @click="enable_input('permanent_country')" id="idSpanEmailChangeDashboard" v-bind:style="changes.permanent_country.smallButton" class="small_button">Change</span></small>
	<input  v-model="permanent_country" @keyup="onChangeValidity('permanent_country')" 
	:disabled='permanent_country_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your permanent_country Here" type="text" value="" >
	</div>
	<div class="col-10 mx-0 px-0 ">
	<button :disabled='submit_disabled' @click="submit()" id="idButtonUpdateProfileDashboard" class="btn btn-danger btn-block mb-3 mx-0 rounded-0">
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









Vue.component('profile_address' , {
	props: ['profile_photo' ],
	template: address1,
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
			users_info: '',
			submit_disabled: false,
			type: '',
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
					//console.log(this.present_line1);
					var patt= /[A-Za-z.\S]{5,}/g;
					var result = patt.test(this.present_line1);
					result == false ? this.present_line1_validity = 'invalid' : this.present_line1_validity = 'valid';
				}else if(inputName == 'present_district'){
					//console.log(this.present_district);
					var patt= /[A-Za-z.\S]{5,}/g;
					var result = patt.test(this.present_district);
					result == false ? this.present_district_validity = 'invalid' : this.present_district_validity = 'valid';
				}else if(inputName == 'present_country'){
					//console.log(this.present_country);
					var patt= /[A-Za-z.\S]{5,}/g;
					var result = patt.test(this.present_country);
					result == false ? this.present_country_validity = 'invalid' : this.present_country_validity = 'valid';
				}else if(inputName == 'present_post_code'){
					//console.log(this.present_post_code);
					var patt= /[\+]{0,1}[\d]{4,}/g;
					var result = patt.test(this.present_post_code);
					result == false ? this.present_post_code_validity = 'invalid' : this.present_post_code_validity = 'valid';
				}else if(inputName == 'permanent_line1'){
					//console.log(this.permanent_line1);
					var patt= /[A-Za-z.\S]{5,}/g;
					var result = patt.test(this.permanent_line1);
					result == false ? this.permanent_line1_validity = 'invalid' : this.permanent_line1_validity = 'valid';
				}else if(inputName == 'permanent_district'){
					//console.log(this.permanent_district);
					var patt= /[A-Za-z.\S]{5,}/g;
					var result = patt.test(this.permanent_district);
					result == false ? this.permanent_district_validity = 'invalid' : this.permanent_district_validity = 'valid';
				}else if(inputName == 'permanent_country'){
					//console.log(this.permanent_country);
					var patt= /[A-Za-z.\S]{5,}/g;
					var result = patt.test(this.permanent_country);
					result == false ? this.permanent_country_validity = 'invalid' : this.permanent_country_validity = 'valid';
				}else if(inputName == 'permanent_post_code'){
					//console.log(this.permanent_post_code);
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
					
					axios.post( this.model.modelProfile_address ,
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
						
						this.type == 'admin' ? this.status_text = 'Updated, Thank You' : this.status_text = 'Update requested successfully! wait for admin approval';
						this.dialog = true;
						this.get_users_data();
						
					}.bind(this))
					.catch(function(error){
					}.bind(this));
					this.status_text = 'all fields are valid';
					this.dialog = true;
				}else {
					this.status_text = 'all fields are not valid';
					this.dialog = true;
				}
			},
			get_users_data(){
				axios.post( this.model.modelProfile_address ,
				{
					purpose: 'getProfileBasicInfo',
				}
				).then(function(response){
					
					this.present_line1 = response.data.present_line1;
					this.present_district = response.data.present_district;
					this.present_post_code = response.data.present_post_code;
					this.present_country = response.data.present_country;
					this.permanent_line1 = response.data.parmanent_line1;
					this.permanent_district = response.data.parmanent_district;
					this.permanent_post_code = response.data.parmanent_post_code;
					this.permanent_country = response.data.parmanent_country;
					
				}.bind(this))
				.catch(function(error){
        //console.log(error);
    }.bind(this));
			}
		},
		created(){
			axios.post( this.model.modelProfile_address ,
			{
				purpose: 'getProfileBasicInfo',
				
			}
			).then(function(response){
				
				
				console.log(response);
				this.present_line1 = response.data.present_line1;
				this.present_district = response.data.present_district;
				this.present_post_code = response.data.present_post_code;
				this.present_country = response.data.present_country;
				
				this.permanent_line1 = response.data.parmanent_line1;
				this.permanent_district = response.data.parmanent_district;
				this.permanent_post_code = response.data.parmanent_post_code;
				this.permanent_country = response.data.parmanent_country;
				this.type = response.data.type;
				this.users_info = response.data;
				
				if(this.users_info.completeness == 100 & this.users_info.status == 'not_verified'){
					this.submit_disabled = true;
				}
			}.bind(this))
			.catch(function(error){
				
				
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
		var ht = dashboard_height+'px';
		$('.dashboard_vertical_menu_height').height(ht);
		
	}
})




</script>
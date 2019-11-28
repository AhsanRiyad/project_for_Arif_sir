<script>
	


	var basic = `<div class="container-fluid bg-light mt-5 ">
	<div class="row justify-content-center align-items-center">

	<!-- update top part starts-->

	<div class=" col-12 col-xl-4 col-md-7  px-0 py-1" style="box-shadow: 0 0 10px lightgrey; ">


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
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.institution_id.smallText ' > <span>Institution Id



	<span v-show="institution_id_validity == 'valid'" class="text-success"> {{ institution_id_validity }} </span>
	<span v-show="institution_id_validity == 'invalid'" class="text-danger"> {{ institution_id_validity }} </span>




	</span> <span @click="enable_input('institution_id')" id="idSpanEmailChangeDashboard" v-bind:style="changes.institution_id.smallButton" class="small_button">Change</span></small>

	<input  @keyup="validityCheckInput('institution_id')" v-model="institution_id" :disabled='institution_id_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="text" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.nid_or_passport.smallText ' > <span>NID/Passport



	<span v-show="nid_or_passport_validity == 'valid'" class="text-success"> {{ nid_or_passport_validity }} </span>
	<span v-show="nid_or_passport_validity == 'invalid'" class="text-danger"> {{ nid_or_passport_validity }} </span>




	</span> <span @click="enable_input('nid_or_passport')" id="idSpanEmailChangeDashboard" v-bind:style="changes.nid_or_passport.smallButton" class="small_button">Change</span></small>

	<input @keyup="validityCheckInput('nid_or_passport')"  v-model="nid_or_passport" :disabled='nid_or_passport_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="text" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.blood_group.smallText ' > <span>Blood Group


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
	<v-btn :disabled = "submit_disabled" color="error" @click="submit()" id="idButtonUpdateProfileDashboard" class=" btn-block mb-3 mx-0 rounded-0">
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

Vue.component('profile_basic' , {
	props: ['profile_photo' ],
	template: basic,
	data(){
		return {
			name: 'riyad---vue',
			recent_photo: '',
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
			users_info: '',
			submit_disabled: false,
			type: '',
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
					
					var patt= /[A-Za-z.\s]{5,}/g;
					var result = patt.test(this.full_name);

					result == false ? this.full_name_validity = 'invalid' : this.full_name_validity = 'valid';


				}else if(inputName == 'mobile'){
					
					var patt= /[\+]{0,1}[\d]{11,}/g;
					var result = patt.test(this.mobile);

					result == false ? this.mobile_validity = 'invalid' : this.mobile_validity = 'valid';


				}else if(inputName == 'institution_id'){
					
					var patt= /[\S]{5,}/g;
					var result = patt.test(this.institution_id);

					result == false ? this.institution_id_validity = 'invalid' : this.institution_id_validity = 'valid';


				}else if(inputName == 'nid_or_passport'){
					
					var patt= /[\S]{10,}/g;
					var result = patt.test(this.nid_or_passport);

					result == false ? this.nid_or_passport_validity = 'invalid' : this.nid_or_passport_validity = 'valid';


				}
			},
			onChangeValidity(inputName){
				if(inputName == 'blood_group'){
					
					var patt= /[\+-A-O]{1,3}/g;
					var result = patt.test(this.blood_group);

					result == false ? this.blood_group_validity = 'invalid' : this.blood_group_validity = 'valid';


				}else if(inputName == 'dob'){
					
					var patt= /^([0-9]{4})([-]{1}[0-9]{2}[-]{1}[0-9]{2}$)/igm;
					var result = patt.test(this.dob);
					
					var patt = /^([0-9]{4})/g;
					const matches = this.dob.match(patt);
					


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

					axios.post( this.model.modelProfile_basic ,
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
						this.type == 'admin' ? this.status_text = 'Updated, Thank You' : this.status_text = 'Update requested successfully! wait for admin approval';
						this.dialog = true;
						this.get_users_data();
					}.bind(this))
					.catch(function(error){
        //console.log(error);
    }.bind(this));
				}else{
					this.status_text = 'all field are not valid';
					this.dialog = true;
					//alert('all filed are not valid');
				}
			},

			get_users_data(){


				axios.post( this.model.modelProfile_basic ,
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

				}.bind(this))
				.catch(function(error){

        //console.log(error);
    }.bind(this));


			}


		},
		created(){
			axios.post( this.model.modelProfile_basic ,
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
				this.recent_photo = response.data.recent_photo;
				this.type = response.data.type;
				this.users_info = response.data;


				if(this.users_info.completeness == 100 & this.users_info.status == 'not_verified'){
					this.submit_disabled = true;
				}


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
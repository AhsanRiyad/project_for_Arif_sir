<script type="text/javascript">
	

	const bus = new Vue();



	var code = `
	<div class="container-fluid bg-light mt-1 ">
	<div class="row justify-content-center align-items-center">
	

	<v-btn :disabled="input_disabled == 'basic'" @click="changeComponent('basic')" large class="ml-1" color="success">Basic</v-btn>
	<v-btn :disabled="input_disabled == 'personal'" @click="changeComponent('personal')" large class="ml-1" color="success">Personal</v-btn>
	<v-btn :disabled="input_disabled == 'professional'" @click="changeComponent('professional')" large class="ml-1" color="success">Profession</v-btn>
	<v-btn :disabled="input_disabled == 'address'" @click="changeComponent('address')" large class="ml-1" color="success">Address</v-btn>

	</div>

	<div class="row justify-content-center align-items-center mt-1">
	<v-btn @click="changeComponent('photos')"  large class="  ml-1" color="success">photos</v-btn>
	</div>

	
	</div>
	
	`;


	Vue.component('buttons' , {
		template: code,
		data(){
			return {
				name: 'Riyad',
				input_disabled: 'basic'
			}
		},
		methods: {
			changeComponent: function(comp_type){
				this.input_disabled = comp_type;
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
	<img class="rounded img-thumbnail img-fluid" src=> alt="">
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
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.full_name.smallText ' > <span>Name</span> <span @click="enable_input('full_name')" id="idSpanEmailChangeDashboard" v-bind:style="changes.full_name.smallButton" class="small_button">Change</span></small>

	<input :disabled='full_name_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="text" value="" >

	</div>

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.mobile.smallText ' > <span>Mobile</span> <span @click="enable_input('mobile')" id="idSpanEmailChangeDashboard" v-bind:style="changes.mobile.smallButton" class="small_button">Change</span></small>

	<input :disabled='mobile_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="text" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.institution_id.smallText ' > <span>institution_id</span> <span @click="enable_input('institution_id')" id="idSpanEmailChangeDashboard" v-bind:style="changes.institution_id.smallButton" class="small_button">Change</span></small>

	<input :disabled='institution_id_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="text" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.nid_or_passport.smallText ' > <span>nid_or_passport</span> <span @click="enable_input('nid_or_passport')" id="idSpanEmailChangeDashboard" v-bind:style="changes.nid_or_passport.smallButton" class="small_button">Change</span></small>

	<input :disabled='nid_or_passport_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="text" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.dob.smallText ' > <span>Date of Birth</span> <span @click="enable_input('dob')" id="idSpanEmailChangeDashboard" v-bind:style="changes.dob.smallButton" class="small_button">Change</span></small>

	<input :disabled='dob_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="date" value="" >

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

	</div>`;

	Vue.component('basic' , {
		template: code,
		data(){
			return {
				name: 'riyad---vue',
				full_name_input: true,
				mobile_input: true,
				institution_id_input: true,
				nid_or_passport_input: true,
				dob_input: true,
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
				}else if(name=='dob'){
					this.dob_input = false;
					this.changes.dob.smallText.color = 'red';
					this.changes.dob.smallButton.color = 'white';
					this.changes.dob.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
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
	<img class="rounded img-thumbnail img-fluid" src=> alt="">
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
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.fathers_name.smallText ' > <span>fathers_name</span> <span @click="enable_input('fathers_name')" id="idSpanEmailChangeDashboard" v-bind:style="changes.fathers_name.smallButton" class="small_button">Change</span></small>

	<input :disabled='fathers_name_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your fathers_name Here" type="text" value="" >

	</div>
	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.mothers_name.smallText ' > <span>mothers_name</span> <span @click="enable_input('mothers_name')" id="idSpanEmailChangeDashboard" v-bind:style="changes.mothers_name.smallButton" class="small_button">Change</span></small>

	<input :disabled='mothers_name_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your mothers_name Here" type="text" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.spouse_name.smallText ' > <span>spouse_name</span> <span @click="enable_input('spouse_name')" id="idSpanEmailChangeDashboard" v-bind:style="changes.spouse_name.smallButton" class="small_button">Change</span></small>

	<input :disabled='spouse_name_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your spouse_name Here" type="text" value="" >

	</div>

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.number_of_children.smallText ' > <span>number_of_children</span> <span @click="enable_input('number_of_children')" id="idSpanEmailChangeDashboard" v-bind:style="changes.number_of_children.smallButton" class="small_button">Change</span></small>

	<input :disabled='number_of_children_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your number_of_children Here" type="text" value="" >

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

	</div>`;

	Vue.component('personal' , {
		template: code,
		data(){
			return {
				name: 'riyad---vue',
				fathers_name_input: true,
				mothers_name_input: true,
				spouse_name_input: true,
				number_of_children_input: true,
				dob_input: true,
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
				}
			}

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
			componet_name: 'basic',
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
				number_of_children:{
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
		}, 
		methods : {
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
				}else if(name=='number_of_children'){
					this.number_of_children_input = false;
					this.changes.number_of_children.smallText.color = 'red';
					this.changes.number_of_children.smallButton.color = 'white';
					this.changes.number_of_children.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}else if(name=='dob'){
					this.dob_input = false;
					this.changes.dob.smallText.color = 'red';
					this.changes.dob.smallButton.color = 'white';
					this.changes.dob.smallButton.backgroundColor = 'red';
					//alert(this.mobile_input);
				}
			}


		},
		beforeCreate(){

		},
		created(){
			bus.$on('changeComponent' , (data)=>{

				this.componet_name = data;

				//alert(this.componet_name);
			})
		},
		beforeMount(){

		},
		mounted(){

		},
		beforeUpdated(){

		},
		updated(){

			var dashboard_height = $('#dashboard_height').height();
			var windowHeight = $(document).height();
			console.log(dashboard_height);
			if(dashboard_height<windowHeight){

				$('.dashboard_vertical_menu_height').height('100vh');
			}else{
				var ht = dashboard_height+'px';
				$('.dashboard_vertical_menu_height').height(ht);
			}

		}
	})



</script>
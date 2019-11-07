<script type="text/javascript">
	


	var code = `
	<div class="container-fluid bg-light mt-5 ">
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
	<p class="h3 text-white pl-4 pt-2"> <i class="fas fa-info-circle mr-0"></i> About</p>
	</div>

	<!-- <div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small class="text-danger ">Enter new Name or Keep it same <span onclick="removeDisabled(this)" id="changeNameSpan" class="small_button">Change</span></small>

	<input id="changeName" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Enter your name there" disabled="" type="text" value="Riyad Ahsan" >

	</div> -->

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="text-danger "> <span>Enter new email or Keep it same</span> <span onclick="removeDisabled(this)" id="idSpanEmailChangeDashboard" class="small_button">Change</span></small>

	<input id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Email Here" disabled="" type="text" value="" >

	</div>

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallPasswordChangeDashboard'  class="text-danger "> <span>Enter new Password or Keep it same</span> <span onclick="removeDisabled(this)" id="idSpanPasswordChangeDashboard" class="small_button">Change</span></small>

	<input id="idInputPasswordUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Password Here" disabled="" type="password" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small class="text-danger ppp"><span>Enter new Number or Keep it same</span> <span id="changeMobileSpan" class="small_button" onclick="removeDisabled(this);">Change</span></small>

	<input id="idInputMobileUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Email Here" disabled="true" type="text" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0 mb-3"> 
	<small class="text-danger "><span>Enter new DOB or Keep it same</span> <span onclick="removeDisabled(this)" id="changeDOBSpan" class="small_button">Change</span></small>

	<input id="idInputDobUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 pl-2 mr-0" placeholder="20-12-1996" disabled="" type="date" value="" >

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

	Vue.component('profile' , {
		template: code,
		data(){
			return {
				name: 'Riyad'
			}
		},
		methods: {

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
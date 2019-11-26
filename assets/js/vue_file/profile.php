


<script type="text/javascript">
	
	Vue.mixin({
		data: function() {
			return {
				componet_name: '<?php  
				if($_GET['pn'] == "verify_email_otp")
					{echo 'basic';}
				else{echo $_GET['pn'];}; ?>',
				csrf_token1: '<?php echo $_SESSION['csrf_token1'] = bin2hex(random_bytes(32)); ?>',

			}
		}
	})


	const bus = new Vue();
	






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













	var personal = `<div class="container-fluid bg-light mt-5 ">
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
	<p class="h3 text-white pl-4 pt-2"> <i class="fas fa-info-circle mr-0"></i> Personal Info</p>
	</div>

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.fathers_name.smallText ' > <span>Fathers Name




	<span v-show="fathers_name_validity == 'valid'" class="text-success"> {{ fathers_name_validity }} </span>
	<span v-show="fathers_name_validity == 'invalid'" class="text-danger"> {{ fathers_name_validity }} </span>







	</span> <span @click="enable_input('fathers_name')" id="idSpanEmailChangeDashboard" v-bind:style="changes.fathers_name.smallButton" class="small_button">Change</span></small>

	<input v-model="fathers_name" @keyup="onChangeValidity('fathers_name')" :disabled='fathers_name_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your fathers name Here" type="text" value="" >

	</div>
	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.mothers_name.smallText ' > <span>Mothers Name



	<span v-show="mothers_name_validity == 'valid'" class="text-success"> {{ mothers_name_validity }} </span>
	<span v-show="mothers_name_validity == 'invalid'" class="text-danger"> {{ mothers_name_validity }} </span>




	</span> <span @click="enable_input('mothers_name')" id="idSpanEmailChangeDashboard" v-bind:style="changes.mothers_name.smallButton" class="small_button">Change</span></small>

	<input v-model="mothers_name" @keyup="onChangeValidity('mothers_name')"  :disabled='mothers_name_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your mothers_name Here" type="text" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.spouse_name.smallText ' > <span>Spouse Name




	<span v-show="spouse_name_validity == 'valid'" class="text-success"> {{ spouse_name_validity }} </span>
	<span v-show="spouse_name_validity == 'invalid'" class="text-danger"> {{ spouse_name_validity }} </span>







	</span> <span @click="enable_input('spouse_name')" id="idSpanEmailChangeDashboard" v-bind:style="changes.spouse_name.smallButton" class="small_button">Change</span></small>

	<input v-model="spouse_name" @keyup="onChangeValidity('spouse_name')" :disabled='spouse_name_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your spouse_name Here" type="text" value="" >

	</div>

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.number_of_children.smallText ' > <span>Number of children




	<span v-show="number_of_children_validity == 'valid'" class="text-success"> {{ number_of_children_validity }} </span>
	<span v-show="number_of_children_validity == 'invalid'" class="text-danger"> {{ number_of_children_validity }} </span>







	</span> <span @click="enable_input('number_of_children')" id="idSpanEmailChangeDashboard" v-bind:style="changes.number_of_children.smallButton" class="small_button">Change</span></small>

	<input v-model="number_of_children" @keyup="onChangeValidity('number_of_children')"  :disabled='number_of_children_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your number_of_children Here" type="text" value="" >

	</div>

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.profession.smallText ' > <span>Profession


	<span v-show="profession_validity == 'valid'" class="text-success"> {{ profession_validity }} </span>
	<span v-show="profession_validity == 'invalid'" class="text-danger"> {{ profession_validity }} </span>



	</span> <span @click="enable_input('profession')" id="idSpanEmailChangeDashboard" v-bind:style="changes.profession.smallButton" class="small_button">Change</span></small>

	<input v-model="profession" @keyup="onChangeValidity('profession')" 
	:disabled='profession_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your profession Here" type="text" value="" >

	</div>


	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.workplace_or_institution.smallText ' > <span>Workplace/Institution


	<span v-show="workplace_or_institution_validity == 'valid'" class="text-success"> {{ workplace_or_institution_validity }} </span>
	<span v-show="workplace_or_institution_validity == 'invalid'" class="text-danger"> {{ workplace_or_institution_validity }} </span>



	</span> <span @click="enable_input('workplace_or_institution')" id="idSpanEmailChangeDashboard" v-bind:style="changes.workplace_or_institution.smallButton" class="small_button">Change</span></small>

	<input v-model="workplace_or_institution" @keyup="onChangeValidity('workplace_or_institution')" 
	:disabled='workplace_or_institution_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your workplace_or_institution Here" type="text" value="" >

	</div>

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' changes.designation.smallText ' > <span>Designation



	<span v-show="designation_validity == 'valid'" class="text-success"> {{ designation_validity }} </span>
	<span v-show="designation_validity == 'invalid'" class="text-danger"> {{ designation_validity }} </span>






	</span> <span @click="enable_input('designation')" id="idSpanEmailChangeDashboard" v-bind:style="changes.designation.smallButton" class="small_button">Change</span></small>

	<input v-model="designation" @keyup="onChangeValidity('designation')"  :disabled='designation_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your designation Here" type="text" value="" >

	</div>


	<div class="col-10 mx-0 px-0 ">
	<button :disabled = "submit_disabled" @click="submit()" id="idButtonUpdateProfileDashboard" class="btn btn-danger btn-block mb-3 mx-0 rounded-0">
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










	var photos = `<div class="container-fluid bg-light mt-5 ">
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






	var password = `<div class="container-fluid bg-light mt-5 ">
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









	var email = `<div class="container-fluid bg-light mt-5 ">
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
	<v-btn :loading='loading' color="error" @click="submit()" id="idButtonUpdateProfileDashboard" class=" btn-block mb-3 mx-0 rounded-0">
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
	<v-col v-if="otp_text_box_show" col="12" class="mt-n8">
	<v-text-field
	label="OTP sent to your email" v-model="otp"
	></v-text-field>

	<v-btn @click="changeEmail()" :loading="loading" color="success">
	Validate
	</v-btn>

	</v-col>

	<v-card-actions>
	<v-spacer></v-spacer>



	<v-btn
	color="green darken-1"
	text
	@click="email_change_logout()"
	>
	Okay
	</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>


	</div>`;










	var verify_email_otp = `<div class="container-fluid bg-light mt-5 ">
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
	<p class="h3 text-white pl-4 pt-2"> <i class="fas fa-info-circle mr-0"></i> Verify Email</p>
	</div>

	<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
	<small id='idSmallverify_email_otpChangeDashboard'  class="" v-bind:style=' changes.verify_email_otp.smallText ' > <span>Enter OTP


	<span v-show="verify_email_otp_validity == 'valid'" class="text-success"> {{ verify_email_otp_validity }} </span>
	<span v-show="verify_email_otp_validity == 'invalid'" class="text-danger"> {{ verify_email_otp_validity }} </span>




	</span> <span @click="enable_input('verify_email_otp')" id="idSpanverify_email_otpChangeDashboard" v-bind:style="changes.verify_email_otp.smallButton" class="small_button">Change</span></small>

	<input @keyup="validityCheckInput('verify_email_otp')" v-model="verify_email_otp" :disabled='verify_email_otp_input == true' id="idInputverify_email_otpUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="verify_email_otp" value="" >

	</div>




	<div class="col-10 mx-0 px-0 ">
	<v-btn color="success" @click="submit()" id="idButtonUpdateProfileDashboard" class=" btn-block mb-3 mx-0 rounded-0">
	Verify
	</v-btn>

	<v-btn :loading='loading' color="primary" @click="sendOtpAgain()" id="idButtonUpdateProfileDashboard" class=" btn-block mb-3 mx-0 rounded-0">
	Send OTP again
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







	var buttons = `
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









	var alert = `	
	<div class="container">
	<div class="row justify-content-center no-gutters">
	<div class="col col-xl-4 col-md-7 ">
	<a @click="verify_email_otp()">
	<v-alert type="error" v-if="email_verification_status == 'not_verified'">
	Your email is not verified , click to solve
	</v-alert></a>
	<a>
	<v-alert type="warning" v-if="completeness < 100"> {{ profile_completeness_msg }} 
	</v-alert></a>
	<a>
	<v-alert type="warning" v-if="completeness == 100 && users_info.status == 'not_verified' "> You are not verified yet, wait for verifiaction 
	</v-alert></a>
	</div>
	</div>
	</div>
	`;










Vue.component("alert",{template:alert,data:()=>({email_verification_status:!0,status:!0,completeness:"",change_request:"",profile_completeness_msg:"default",users_info:""}),methods:{verify_email_otp(){bus.$emit("changeComponent","verify_email_otp"),bus.$emit("buttonRelease","verify_email_otp")},profile_completeness_bus(){}},created(){bus.$on("email_verification_status",t=>{this.email_verification_status=t}),bus.$on("users_info",t=>{this.users_info=t,"not_set"==this.users_info.full_name||null==this.users_info.full_name?this.profile_completeness_msg="full_name is not set":"not_set"==this.users_info.mobile||null==this.users_info.mobile?this.profile_completeness_msg="mobile is not set":"not_set"==this.users_info.institution_id||null==this.users_info.institution_id?this.profile_completeness_msg="institution_id is not set":"not_set"==this.users_info.nid_or_passport||null==this.users_info.nid_or_passport?this.profile_completeness_msg="nid_or_passport is not set":"not_set"==this.users_info.blood_group||null==this.users_info.blood_group?this.profile_completeness_msg="blood_group is not set":"not_set"==this.users_info.date_of_birth||null==this.users_info.date_of_birth?this.profile_completeness_msg="date_of_birth is not set":"not_set"==this.users_info.fathers_name||null==this.users_info.fathers_name?this.profile_completeness_msg="fathers_name is not set":"not_set"==this.users_info.mother_name||null==this.users_info.mother_name?this.profile_completeness_msg="mother_name is not set":"not_set"==this.users_info.spouse_name||null==this.users_info.spouse_name?this.profile_completeness_msg="spouse_name is not set":"not_set"==this.users_info.number_of_children||null==this.users_info.number_of_children?this.profile_completeness_msg="number_of_children is not set":"not_set"==this.users_info.profession||null==this.users_info.profession?this.profile_completeness_msg="profession is not set":"not_set"==this.users_info.institution||null==this.users_info.institution?this.profile_completeness_msg="institution is not set":"not_set"==this.users_info.designation||null==this.users_info.designation?this.profile_completeness_msg="designation is not set":"not_set"==this.users_info.present_line1||null==this.users_info.present_line1?this.profile_completeness_msg="present_line1 is not set":"not_set"==this.users_info.present_district||null==this.users_info.present_district?this.profile_completeness_msg="present_district is not set":"not_set"==this.users_info.present_post_code||null==this.users_info.present_post_code?this.profile_completeness_msg="present_post_code is not set":"not_set"==this.users_info.present_country||null==this.users_info.present_country?this.profile_completeness_msg="present_country is not set":"not_set"==this.users_info.parmanent_line1||null==this.users_info.parmanent_line1?this.profile_completeness_msg="parmanent_line1 is not set":"not_set"==this.users_info.parmanent_district||null==this.users_info.parmanent_district?this.profile_completeness_msg="parmanent_district is not set":"not_set"==this.users_info.parmanent_post_code||null==this.users_info.parmanent_post_code?this.profile_completeness_msg="parmanent_post_code is not set":"not_set"==this.users_info.parmanent_country||null==this.users_info.parmanent_country?this.profile_completeness_msg="parmanent_country is not set":"not_set"==this.users_info.recent_photo||null==this.users_info.recent_photo?this.profile_completeness_msg="recent_photo is not set":axios.post(this.model.modelProfile_update,{purpose:"profile_completeness_100",user_type:this.users_info.type}).then(function(t){"admin"==this.users_info.type?this.profile_completeness_msg="Profile completed , Thank You":this.profile_completeness_msg="Profile completed , Wait for verfification"}.bind(this)).catch(function(t){}.bind(this))}),axios.post(this.model.modelProfile_update,{purpose:"getProfileBasicInfo"}).then(function(t){this.email_verification_status=t.data.email_verification_status,this.completeness=t.data.completeness,this.users_info=t.data}.bind(this)).catch(function(t){}.bind(this))},updated(){"not_set"==this.users_info.full_name||null==this.users_info.full_name?this.profile_completeness_msg="full_name is not set":"not_set"==this.users_info.mobile||null==this.users_info.mobile?this.profile_completeness_msg="mobile is not set":"not_set"==this.users_info.institution_id||null==this.users_info.institution_id?this.profile_completeness_msg="institution_id is not set":"not_set"==this.users_info.nid_or_passport||null==this.users_info.nid_or_passport?this.profile_completeness_msg="nid_or_passport is not set":"not_set"==this.users_info.blood_group||null==this.users_info.blood_group?this.profile_completeness_msg="blood_group is not set":"not_set"==this.users_info.date_of_birth||null==this.users_info.date_of_birth?this.profile_completeness_msg="date_of_birth is not set":"not_set"==this.users_info.fathers_name||null==this.users_info.fathers_name?this.profile_completeness_msg="fathers_name is not set":"not_set"==this.users_info.mother_name||null==this.users_info.mother_name?this.profile_completeness_msg="mother_name is not set":"not_set"==this.users_info.spouse_name||null==this.users_info.spouse_name?this.profile_completeness_msg="spouse_name is not set":"not_set"==this.users_info.number_of_children||null==this.users_info.number_of_children?this.profile_completeness_msg="number_of_children is not set":"not_set"==this.users_info.profession||null==this.users_info.profession?this.profile_completeness_msg="profession is not set":"not_set"==this.users_info.institution||null==this.users_info.institution?this.profile_completeness_msg="institution is not set":"not_set"==this.users_info.designation||null==this.users_info.designation?this.profile_completeness_msg="designation is not set":"not_set"==this.users_info.present_line1||null==this.users_info.present_line1?this.profile_completeness_msg="present_line1 is not set":"not_set"==this.users_info.present_district||null==this.users_info.present_district?this.profile_completeness_msg="present_district is not set":"not_set"==this.users_info.present_post_code||null==this.users_info.present_post_code?this.profile_completeness_msg="present_post_code is not set":"not_set"==this.users_info.present_country||null==this.users_info.present_country?this.profile_completeness_msg="present_country is not set":"not_set"==this.users_info.parmanent_line1||null==this.users_info.parmanent_line1?this.profile_completeness_msg="parmanent_line1 is not set":"not_set"==this.users_info.parmanent_district||null==this.users_info.parmanent_district?this.profile_completeness_msg="parmanent_district is not set":"not_set"==this.users_info.parmanent_post_code||null==this.users_info.parmanent_post_code?this.profile_completeness_msg="parmanent_post_code is not set":"not_set"==this.users_info.parmanent_country||null==this.users_info.parmanent_country?this.profile_completeness_msg="parmanent_country is not set":"not_set"==this.users_info.recent_photo||null==this.users_info.recent_photo?this.profile_completeness_msg="recent_photo is not set":"admin"==this.users_info.type?this.profile_completeness_msg="Profile completed , Thank You":this.profile_completeness_msg="Profile completed , Wait for verfification"}}),Vue.component("buttons",{props:["profile_photo","CSRF_TOKEN"],template:buttons,data:()=>({name:"Riyad"}),methods:{changeComponent:function(t){this.componet_name=t,bus.$emit("changeComponent",t)}},created(){bus.$on("buttonRelease",t=>{this.componet_name=t})}}),Vue.component("verify_email_otp",{props:["profile_photo","CSRF_TOKEN"],template:verify_email_otp,data:()=>({name:"riyad---vue",dialog:!1,status_text:"",verify_email_otp_input:!0,verify_email_otp:"",verify_email_otp_validity:"",loading:!1,changes:{verify_email_otp:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}}}}),methods:{enable_input:function(t){"verify_email_otp"==t&&(this.verify_email_otp_input=!1,this.changes.verify_email_otp.smallText.color="red",this.changes.verify_email_otp.smallButton.color="white",this.changes.verify_email_otp.smallButton.backgroundColor="red")},validityCheckInput(t){if("verify_email_otp"==t){var e=/^[\d]{4}$/g.test(this.verify_email_otp);this.verify_email_otp_validity=0==e?"invalid":"valid"}},submit(){this.validityCheckInput("verify_email_otp"),"valid"==this.verify_email_otp_validity?axios.post(this.model.modelProfile_update,{purpose:"verify_email_otp",verify_email_otp:this.verify_email_otp}).then(function(t){"email_verified"==t.data?(this.status_text="email verified successfully",bus.$emit("email_verification_status","verified"),this.dialog=!0):(this.status_text="invalid otp, try again",this.dialog=!0)}.bind(this)).catch(function(t){}.bind(this)):(this.status_text="OTP is not valid ",this.dialog=!0)},sendOtpAgain(){this.loading=!0,axios.post(this.model.modelProfile_update,{purpose:"send_otp"}).then(function(t){"otp_sent"==t.data&&(this.status_text="OTP sent, check your email",this.dialog=!0),"server_problem"==t.data&&(this.status_text="email server problem, try again later",this.dialog=!0),this.loading=!1}.bind(this)).catch(function(t){this.loading=!1}.bind(this))}},created(){axios.post(this.model.modelProfile_update,{purpose:"getProfileBasicInfo"}).then(function(t){}.bind(this)).catch(function(t){}.bind(this))}}),Vue.component("email",{props:["profile_photo","CSRF_TOKEN"],template:email,data:()=>({name:"riyad---vue",email_change_status:!1,dialog:!1,status_text:"",email_input:!0,email:"",email_validity:"",status_text_show:!1,otp_text_box_show:!1,loading:!1,otp:"",changes:{email:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}}}}),methods:{enable_input:function(t){"email"==t&&(this.email_input=!1,this.changes.email.smallText.color="red",this.changes.email.smallButton.color="white",this.changes.email.smallButton.backgroundColor="red")},validityCheckInput(t){if("email"==t){var e=/^[a-zA-Z]{1}[a-zA-Z1-9._]{3,15}@[a-zA-Z]{1}[a-zA-Z1-9]{3,15}\.[a-zA-Z]{2,10}(\.[a-zA-Z]{2})*$/g.test(this.email);this.email_validity=0==e?"invalid":"valid"}},changeEmail(){axios.post(this.model.modelProfile_update,{purpose:"changeEmail",email:this.email,otp:this.otp}).then(function(t){"success"==t.data?(this.otp_text_box_show=!0,this.status_text="email changed successfully",this.email_change_status=!0):(this.otp_text_box_show=!1,this.status_text="invalid otp",this.email_change_status=!1),this.loading=!1,this.dialog=!0}.bind(this)).catch(function(t){this.loading=!1}.bind(this))},email_change_logout(){this.dialog=!1,1==this.email_change_status&&(window.location.href=this.address.loginPage)},submit(){this.validityCheckInput("email"),this.loading=!0,"valid"==this.email_validity?axios.post(this.model.modelProfile_update,{purpose:"email",email:this.email}).then(function(t){"success"==t.data?(this.otp_text_box_show=!0,this.status_text=""):(this.otp_text_box_show=!1,this.status_text="email already used"),this.loading=!1,this.dialog=!0}.bind(this)).catch(function(t){this.loading=!1}.bind(this)):(this.status_text="email is not valid",this.dialog=!0)}},created(){axios.post(this.model.modelProfile_update,{purpose:"getProfileBasicInfo"}).then(function(t){}.bind(this)).catch(function(t){}.bind(this))}}),Vue.component("password",{props:["profile_photo","CSRF_TOKEN"],template:password,data:()=>({name:"riyad---vue",dialog:!1,status_text:"",password_input:!0,password:"",password_validity:"",repassword_input:!0,repassword:"",repassword_validity:"",changes:{password:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},repassword:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}}}}),methods:{enable_input:function(t){"password"==t&&(this.password_input=!1,this.changes.password.smallText.color="red",this.changes.password.smallButton.color="white",this.changes.password.smallButton.backgroundColor="red"),"repassword"==t&&(this.repassword_input=!1,this.changes.repassword.smallText.color="red",this.changes.repassword.smallButton.color="white",this.changes.repassword.smallButton.backgroundColor="red")},validityCheckInput(t){if("password"==t){var e=/[\S]{6,}/g.test(this.password);this.password_validity=0==e?"invalid":"valid"}else if("repassword"==t){e=/[\S]{6,}/g.test(this.repassword);this.repassword_validity=0==e?"invalid":"valid"}},submit(){this.validityCheckInput("password"),this.validityCheckInput("repassword"),"valid"==this.password_validity&&this.password==this.repassword?axios.post(this.model.modelProfile_update,{purpose:"password",password:this.password}).then(function(t){this.status_text="Password Updated successfully",this.dialog=!0}.bind(this)).catch(function(t){}.bind(this)):(this.status_text="password doesnt match",this.dialog=!0)}},created(){axios.post(this.model.modelProfile_update,{purpose:"getProfileBasicInfo"}).then(function(t){}.bind(this)).catch(function(t){}.bind(this))}}),Vue.component("basic",{props:["profile_photo","CSRF_TOKEN"],template:basic,data:()=>({name:"riyad---vue",recent_photo:"",dialog:!1,status_text:"",full_name_input:!0,mobile_input:!0,institution_id_input:!0,nid_or_passport_input:!0,blood_group_input:!0,dob_input:"",full_name:"",mobile:"",institution_id:"",nid_or_passport:"",blood_group:"",dob:"",full_name_validity:"",mobile_validity:"",institution_id_validity:"",nid_or_passport_validity:"",blood_group_validity:"",dob_validity:"",users_info:"",submit_disabled:!1,type:"",changes:{full_name:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},mobile:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},institution_id:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},nid_or_passport:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},blood_group:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},dob:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}}}}),methods:{enable_input:function(t){"full_name"==t?(this.full_name_input=!1,this.changes.full_name.smallText.color="red",this.changes.full_name.smallButton.color="white",this.changes.full_name.smallButton.backgroundColor="red"):"mobile"==t?(this.mobile_input=!1,this.changes.mobile.smallText.color="red",this.changes.mobile.smallButton.color="white",this.changes.mobile.smallButton.backgroundColor="red"):"institution_id"==t?(this.institution_id_input=!1,this.changes.institution_id.smallText.color="red",this.changes.institution_id.smallButton.color="white",this.changes.institution_id.smallButton.backgroundColor="red"):"nid_or_passport"==t?(this.nid_or_passport_input=!1,this.changes.nid_or_passport.smallText.color="red",this.changes.nid_or_passport.smallButton.color="white",this.changes.nid_or_passport.smallButton.backgroundColor="red"):"blood_group"==t?(this.blood_group_input=!1,this.changes.blood_group.smallText.color="red",this.changes.blood_group.smallButton.color="white",this.changes.blood_group.smallButton.backgroundColor="red"):"dob"==t&&(this.dob_input=!1,this.changes.dob.smallText.color="red",this.changes.dob.smallButton.color="white",this.changes.dob.smallButton.backgroundColor="red")},validityCheckInput(t){if("full_name"==t){var e=/[A-Za-z.\s]{5,}/g.test(this.full_name);this.full_name_validity=0==e?"invalid":"valid"}else if("mobile"==t){e=/[\+]{0,1}[\d]{11,}/g.test(this.mobile);this.mobile_validity=0==e?"invalid":"valid"}else if("institution_id"==t){e=/[\S]{5,}/g.test(this.institution_id);this.institution_id_validity=0==e?"invalid":"valid"}else if("nid_or_passport"==t){e=/[\S]{10,}/g.test(this.nid_or_passport);this.nid_or_passport_validity=0==e?"invalid":"valid"}},onChangeValidity(t){if("blood_group"==t){var e=(s=/[\+-A-O]{1,3}/g).test(this.blood_group);this.blood_group_validity=0==e?"invalid":"valid"}else if("dob"==t){e=(s=/^([0-9]{4})([-]{1}[0-9]{2}[-]{1}[0-9]{2}$)/gim).test(this.dob);var s=/^([0-9]{4})/g;const t=this.dob.match(s);1==e&&t[0]>1950&&t[0]<2e3?this.dob_validity="valid":this.dob_validity="invalid"}},submit(){this.validityCheckInput("full_name"),this.validityCheckInput("mobile"),this.validityCheckInput("institution_id"),this.validityCheckInput("nid_or_passport"),this.onChangeValidity("blood_group"),this.onChangeValidity("dob"),"valid"==this.full_name_validity&&"valid"==this.mobile_validity&&"valid"==this.institution_id_validity&&"valid"==this.nid_or_passport_validity&&"valid"==this.blood_group_validity&&"valid"==this.dob_validity?axios.post(this.model.modelProfile_update,{purpose:"basic",full_name:this.full_name,mobile:this.mobile,institution_id:this.institution_id,nid_or_passport:this.nid_or_passport,blood_group:this.blood_group,dob:this.dob}).then(function(t){"admin"==this.type?this.status_text="Updated, Thank You":this.status_text="Update requested successfully! wait for admin approval",this.dialog=!0,this.get_users_data()}.bind(this)).catch(function(t){}.bind(this)):(this.status_text="all field are not valid",this.dialog=!0)},get_users_data(){axios.post(this.model.modelProfile_update,{purpose:"getProfileBasicInfo"}).then(function(t){this.present_line1=t.data.present_line1,this.present_district=t.data.present_district,this.present_post_code=t.data.present_post_code,this.present_country=t.data.present_country,this.permanent_line1=t.data.parmanent_line1,this.permanent_district=t.data.parmanent_district,this.permanent_post_code=t.data.parmanent_post_code,this.permanent_country=t.data.parmanent_country,this.type=t.data.type,bus.$emit("users_info",t.data)}.bind(this)).catch(function(t){}.bind(this))}},created(){axios.post(this.model.modelProfile_update,{purpose:"getProfileBasicInfo"}).then(function(t){this.full_name=t.data.full_name,this.full_name=t.data.full_name,this.mobile=t.data.mobile,this.institution_id=t.data.institution_id,this.nid_or_passport=t.data.nid_or_passport,this.blood_group=t.data.blood_group,this.dob=t.data.date_of_birth,this.recent_photo=t.data.recent_photo,this.type=t.data.type,this.users_info=t.data,100==this.users_info.completeness&"not_verified"==this.users_info.status&&(this.submit_disabled=!0)}.bind(this)).catch(function(t){}.bind(this))}}),Vue.component("photos",{props:["profile_photo"],template:photos,data:()=>({name:"riyad---vue",dialog:!1,status:"",recent_photo:"",recent_photo_name:"choose file",old_photo:"",old_photo_name:"choose file",group_photo:"",group_photo_name:"choose file",loading_recent_photo:!1,loading_old_photo:!1,loading_group_photo:!1,file_type:!1}),methods:{uploadPhoto_recent:function(){if(1==this.file_type){this.loading_recent_photo=!0;let t=new FormData;t.append("recent_photo",this.recent_photo),t.append("purpose","recent_photo"),t.append("email",this.users_info__.email__),t.append("user_id",this.users_info__.id__),t.append("csrf_token1",this.csrf_token1),axios.post(this.model.modelUploadPhotos,t,{headers:{"Content-Type":"multipart/form-data"}}).then(function(t){this.loading_recent_photo=!1,"success"==t.data?this.status="upload successful":this.status="problem uploading your photo, try again",this.dialog=!0,this.recent_photo_name="choose file",this.get_users_data()}.bind(this)).catch(function(t){this.loading_recent_photo=!1,this.status="You are not authorized",this.dialog=!0,this.recent_photo_name="choose file"}.bind(this)),this.file_type=!1}else this.status="select right type of file first",this.dialog=!0},handleFileUpload_recent:function(){this.recent_photo=this.$refs.recent_photo.files[0];/^(image\/){1}[A-Za-z]*/g.test(this.recent_photo.type)?(this.file_type=!0,this.recent_photo_name=this.recent_photo.name.slice(0,15),this.recent_photo=this.$refs.recent_photo.files[0]):(this.file_type=!1,this.status="incorrect file type\n select again",this.dialog=!0)},get_users_data(){axios.post(this.model.modelProfile_update,{purpose:"getProfileBasicInfo"}).then(function(t){this.present_line1=t.data.present_line1,this.present_district=t.data.present_district,this.present_post_code=t.data.present_post_code,this.present_country=t.data.present_country,this.permanent_line1=t.data.parmanent_line1,this.permanent_district=t.data.parmanent_district,this.permanent_post_code=t.data.parmanent_post_code,this.permanent_country=t.data.parmanent_country,bus.$emit("users_info",t.data),bus.$emit("recent_photo",t.data.recent_photo)}.bind(this)).catch(function(t){}.bind(this))},uploadPhoto_old:function(){if(1==this.file_type){this.loading_old_photo=!0;let t=new FormData;t.append("old_photo",this.old_photo),t.append("purpose","old_photo"),t.append("email",this.users_info__.email__),t.append("user_id",this.users_info__.id__),t.append("csrf_token1",this.csrf_token1),axios.post(this.model.modelUploadPhotos,t,{headers:{"Content-Type":"multipart/form-data"}}).then(function(t){this.loading_old_photo=!1,"success"==t.data?this.status="upload successful":this.status="problem uploading your photo, try again",this.dialog=!0,this.old_photo_name="choose file"}.bind(this)).catch(function(t){this.loading_old_photo=!1,this.status="You are not authorized",this.dialog=!0,this.old_photo_name="choose file"}.bind(this)),this.file_type=!1}else this.status="select right type of file first",this.dialog=!0},handleFileUpload_old:function(){this.old_photo=this.$refs.old_photo.files[0];/^(image\/){1}[A-Za-z]*/g.test(this.old_photo.type)?(this.file_type=!0,this.old_photo_name=this.old_photo.name.slice(0,15),this.old_photo=this.$refs.old_photo.files[0]):(this.file_type=!1,this.status="incorrect file type\n select again",this.dialog=!0)},uploadPhoto_group:function(){if(1==this.file_type){this.loading_group_photo=!0;let t=new FormData;t.append("group_photo",this.group_photo),t.append("purpose","group_photo"),t.append("email",this.users_info__.email__),t.append("user_id",this.users_info__.id__),t.append("csrf_token1",this.csrf_token1),axios.post(this.model.modelUploadPhotos,t,{headers:{"Content-Type":"multipart/form-data"}}).then(function(t){this.loading_group_photo=!1,"success"==t.data?this.status="upload successful":this.status="problem uploading your photo, try again",this.dialog=!0,this.group_photo_name="choose file"}.bind(this)).catch(function(t){this.loading_group_photo=!1,this.status="You are not authorized",this.dialog=!0,this.group_photo_name="choose file"}.bind(this)),this.file_type=!1}else this.status="select right type of file first",this.dialog=!0},handleFileUpload_group:function(){this.group_photo=this.$refs.group_photo.files[0];/^(image\/){1}[A-Za-z]*/g.test(this.group_photo.type)?(this.file_type=!0,this.group_photo_name=this.group_photo.name.slice(0,15),this.group_photo=this.$refs.group_photo.files[0]):(this.file_type=!1,this.status="incorrect file type\n select again",this.dialog=!0)}}}),Vue.component("personal",{props:["profile_photo","CSRF_TOKEN"],template:personal,data:()=>({name:"riyad---vue",dialog:"",status_text:"",fathers_name_input:!0,mothers_name_input:!0,spouse_name_input:!0,number_of_children_input:!0,dob_input:!0,profession_input:!0,workplace_or_institution_input:!0,designation_input:!0,fathers_name:"",mothers_name:"",spouse_name:"",number_of_children:"",dob:"",profession:"",workplace_or_institution:"",designation:"",designation_validity:!1,fathers_name_validity:!1,mothers_name_validity:!1,spouse_name_validity:!1,number_of_children_validity:!1,dob_validity:!1,profession_validity:!1,workplace_or_institution_validity:!1,designation_validity:!1,users_info:"",submit_disabled:!1,type:"",changes:{fathers_name:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},mothers_name:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},spouse_name:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},number_of_children:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},profession:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},workplace_or_institution:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},designation:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}}}}),methods:{enable_input:function(t){"fathers_name"==t?(this.fathers_name_input=!1,this.changes.fathers_name.smallText.color="red",this.changes.fathers_name.smallButton.color="white",this.changes.fathers_name.smallButton.backgroundColor="red"):"mothers_name"==t?(this.mothers_name_input=!1,this.changes.mothers_name.smallText.color="red",this.changes.mothers_name.smallButton.color="white",this.changes.mothers_name.smallButton.backgroundColor="red"):"spouse_name"==t?(this.spouse_name_input=!1,this.changes.spouse_name.smallText.color="red",this.changes.spouse_name.smallButton.color="white",this.changes.spouse_name.smallButton.backgroundColor="red"):"number_of_children"==t?(this.number_of_children_input=!1,this.changes.number_of_children.smallText.color="red",this.changes.number_of_children.smallButton.color="white",this.changes.number_of_children.smallButton.backgroundColor="red"):"profession"==t?(this.profession_input=!1,this.changes.profession.smallText.color="red",this.changes.profession.smallButton.color="white",this.changes.profession.smallButton.backgroundColor="red"):"workplace_or_institution"==t?(this.workplace_or_institution_input=!1,this.changes.workplace_or_institution.smallText.color="red",this.changes.workplace_or_institution.smallButton.color="white",this.changes.workplace_or_institution.smallButton.backgroundColor="red"):"designation"==t&&(this.designation_input=!1,this.changes.designation.smallText.color="red",this.changes.designation.smallButton.color="white",this.changes.designation.smallButton.backgroundColor="red")},onChangeValidity(t){if("fathers_name"==t){var e=/[A-Za-z.\s]{5,}/g.test(this.fathers_name);this.fathers_name_validity=0==e?"invalid":"valid"}else if("mothers_name"==t){e=/[A-Za-z.\s]{5,}/g.test(this.mothers_name);this.mothers_name_validity=0==e?"invalid":"valid"}else if("spouse_name"==t){e=/[A-Za-z.\s]{5,}/g.test(this.spouse_name);this.spouse_name_validity=0==e?"invalid":"valid"}else if("number_of_children"==t){e=/^[\d]{1,2}$/g.test(this.number_of_children);this.number_of_children_validity=0==e?"invalid":"valid"}else if("profession"==t){e=/[A-Za-z.\s]{5,}/g.test(this.profession);this.profession_validity=0==e?"invalid":"valid"}else if("workplace_or_institution"==t){e=/[A-Za-z.\s]{5,}/g.test(this.workplace_or_institution);this.workplace_or_institution_validity=0==e?"invalid":"valid"}else if("designation"==t){e=/[A-Za-z.\s]{5,}/g.test(this.designation);this.designation_validity=0==e?"invalid":"valid"}},submit(){this.onChangeValidity("fathers_name"),this.onChangeValidity("mothers_name"),this.onChangeValidity("spouse_name"),this.onChangeValidity("number_of_children"),this.onChangeValidity("profession"),this.onChangeValidity("workplace_or_institution"),this.onChangeValidity("designation"),"valid"==this.fathers_name_validity&&"valid"==this.mothers_name_validity&&"valid"==this.spouse_name_validity&&"valid"==this.number_of_children_validity&&"valid"==this.profession_validity&&"valid"==this.workplace_or_institution_validity&&"valid"==this.designation_validity?(axios.post(this.model.modelProfile_update,{purpose:"personal",fathers_name:this.fathers_name,mothers_name:this.mothers_name,spouse_name:this.spouse_name,number_of_children:this.number_of_children,profession:this.profession,workplace_or_institution:this.workplace_or_institution,designation:this.designation}).then(function(t){"admin"==this.type?this.status_text="Updated, Thank You":this.status_text="Update requested successfully! wait for admin approval",this.dialog=!0,this.get_users_data()}.bind(this)).catch(function(t){}.bind(this)),this.status_text="All fields are valid",this.dialog=!0):(this.status_text="invalid fields detected",this.dialog=!0)},get_users_data(){axios.post(this.model.modelProfile_update,{purpose:"getProfileBasicInfo"}).then(function(t){this.present_line1=t.data.present_line1,this.present_district=t.data.present_district,this.present_post_code=t.data.present_post_code,this.present_country=t.data.present_country,this.permanent_line1=t.data.parmanent_line1,this.permanent_district=t.data.parmanent_district,this.permanent_post_code=t.data.parmanent_post_code,this.permanent_country=t.data.parmanent_country,this.type=t.data.type,bus.$emit("users_info",t.data)}.bind(this)).catch(function(t){}.bind(this))}},created(){axios.post(this.model.modelProfile_update,{purpose:"getProfileBasicInfo"}).then(function(t){this.full_name=t.data.full_name,this.fathers_name=t.data.fathers_name,this.mothers_name=t.data.mother_name,this.spouse_name=t.data.spouse_name,this.number_of_children=t.data.number_of_children,this.number_of_children=t.data.number_of_children,this.profession=t.data.profession,this.workplace_or_institution=t.data.institution,this.designation=t.data.designation,this.users_info=t.data,this.type=t.data.type,100==this.users_info.completeness&"not_verified"==this.users_info.status&&(this.submit_disabled=!0)}.bind(this)).catch(function(t){}.bind(this))}}),Vue.component("address1",{props:["profile_photo","CSRF_TOKEN"],template:address1,data:()=>({name:"riyad---vue",dialog:!1,status_text:"",present_line1_input:!0,present_line2_input:!0,present_district_input:!0,present_post_code_input:!0,present_country_input:!0,permanent_line1_input:!0,permanent_line2_input:!0,permanent_district_input:!0,permanent_post_code_input:!0,permanent_country_input:!0,present_line1_validity:!1,present_line2_validity:!1,present_district_validity:!1,present_post_code_validity:!1,present_country_validity:!1,permanent_line1_validity:!1,permanent_line2_validity:!1,permanent_district_validity:!1,permanent_post_code_validity:!1,permanent_country_validity:!1,present_line1:"",present_line2:"",present_district:"",present_post_code:"",present_country:"",permanent_line1:"",permanent_line2:"",permanent_district:"",permanent_post_code:"",permanent_country:"",users_info:"",submit_disabled:!1,type:"",changes:{present_line1:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},present_line2:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},present_district:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},present_post_code:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},present_country:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},permanent_line1:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},permanent_line2:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},permanent_district:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},permanent_post_code:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}},permanent_country:{smallText:{color:"#2196f3"},smallButton:{color:"white",backgroundColor:"#2196f3"}}}}),methods:{enable_input:function(t){"present_line1"==t?(this.present_line1_input=!1,this.changes.present_line1.smallText.color="red",this.changes.present_line1.smallButton.color="white",this.changes.present_line1.smallButton.backgroundColor="red"):"present_line2"==t?(this.present_line2_input=!1,this.changes.present_line2.smallText.color="red",this.changes.present_line2.smallButton.color="white",this.changes.present_line2.smallButton.backgroundColor="red"):"present_district"==t?(this.present_district_input=!1,this.changes.present_district.smallText.color="red",this.changes.present_district.smallButton.color="white",this.changes.present_district.smallButton.backgroundColor="red"):"present_post_code"==t?(this.present_post_code_input=!1,this.changes.present_post_code.smallText.color="red",this.changes.present_post_code.smallButton.color="white",this.changes.present_post_code.smallButton.backgroundColor="red"):"present_country"==t?(this.present_country_input=!1,this.changes.present_country.smallText.color="red",this.changes.present_country.smallButton.color="white",this.changes.present_country.smallButton.backgroundColor="red"):"permanent_line1"==t?(this.permanent_line1_input=!1,this.changes.permanent_line1.smallText.color="red",this.changes.permanent_line1.smallButton.color="white",this.changes.permanent_line1.smallButton.backgroundColor="red"):"permanent_line2"==t?(this.permanent_line2_input=!1,this.changes.permanent_line2.smallText.color="red",this.changes.permanent_line2.smallButton.color="white",this.changes.permanent_line2.smallButton.backgroundColor="red"):"permanent_district"==t?(this.permanent_district_input=!1,this.changes.permanent_district.smallText.color="red",this.changes.permanent_district.smallButton.color="white",this.changes.permanent_district.smallButton.backgroundColor="red"):"permanent_post_code"==t?(this.permanent_post_code_input=!1,this.changes.permanent_post_code.smallText.color="red",this.changes.permanent_post_code.smallButton.color="white",this.changes.permanent_post_code.smallButton.backgroundColor="red"):"permanent_country"==t&&(this.permanent_country_input=!1,this.changes.permanent_country.smallText.color="red",this.changes.permanent_country.smallButton.color="white",this.changes.permanent_country.smallButton.backgroundColor="red")},onChangeValidity(t){if("present_line1"==t){var e=/[A-Za-z.\S]{5,}/g.test(this.present_line1);this.present_line1_validity=0==e?"invalid":"valid"}else if("present_district"==t){e=/[A-Za-z.\S]{5,}/g.test(this.present_district);this.present_district_validity=0==e?"invalid":"valid"}else if("present_country"==t){e=/[A-Za-z.\S]{5,}/g.test(this.present_country);this.present_country_validity=0==e?"invalid":"valid"}else if("present_post_code"==t){e=/[\+]{0,1}[\d]{4,}/g.test(this.present_post_code);this.present_post_code_validity=0==e?"invalid":"valid"}else if("permanent_line1"==t){e=/[A-Za-z.\S]{5,}/g.test(this.permanent_line1);this.permanent_line1_validity=0==e?"invalid":"valid"}else if("permanent_district"==t){e=/[A-Za-z.\S]{5,}/g.test(this.permanent_district);this.permanent_district_validity=0==e?"invalid":"valid"}else if("permanent_country"==t){e=/[A-Za-z.\S]{5,}/g.test(this.permanent_country);this.permanent_country_validity=0==e?"invalid":"valid"}else if("permanent_post_code"==t){e=/[\+]{0,1}[\d]{4,}/g.test(this.permanent_post_code);this.permanent_post_code_validity=0==e?"invalid":"valid"}},submit(){this.onChangeValidity("present_line1"),this.onChangeValidity("present_district"),this.onChangeValidity("present_post_code"),this.onChangeValidity("present_country"),this.onChangeValidity("permanent_line1"),this.onChangeValidity("permanent_district"),this.onChangeValidity("permanent_post_code"),this.onChangeValidity("permanent_country"),"valid"==this.present_line1_validity&&"valid"==this.present_district_validity&&"valid"==this.present_country_validity&&"valid"==this.present_post_code_validity&&"valid"==this.permanent_line1_validity&&"valid"==this.permanent_district_validity&&"valid"==this.permanent_country_validity&&"valid"==this.permanent_post_code_validity?(axios.post(this.model.modelProfile_update,{purpose:"address1",present_line1:this.present_line1,present_district:this.present_district,present_post_code:this.present_post_code,present_country:this.present_country,permanent_line1:this.permanent_line1,permanent_district:this.permanent_district,permanent_post_code:this.permanent_post_code,permanent_country:this.permanent_country}).then(function(t){"admin"==this.type?this.status_text="Updated, Thank You":this.status_text="Update requested successfully! wait for admin approval",this.dialog=!0,this.get_users_data()}.bind(this)).catch(function(t){}.bind(this)),this.status_text="all fields are valid",this.dialog=!0):(this.status_text="all fields are not valid",this.dialog=!0)},get_users_data(){axios.post(this.model.modelProfile_update,{purpose:"getProfileBasicInfo"}).then(function(t){this.present_line1=t.data.present_line1,this.present_district=t.data.present_district,this.present_post_code=t.data.present_post_code,this.present_country=t.data.present_country,this.permanent_line1=t.data.parmanent_line1,this.permanent_district=t.data.parmanent_district,this.permanent_post_code=t.data.parmanent_post_code,this.permanent_country=t.data.parmanent_country,bus.$emit("users_info",t.data)}.bind(this)).catch(function(t){}.bind(this))}},created(){axios.post(this.model.modelProfile_update,{purpose:"getProfileBasicInfo"}).then(function(t){this.present_line1=t.data.present_line1,this.present_district=t.data.present_district,this.present_post_code=t.data.present_post_code,this.present_country=t.data.present_country,this.permanent_line1=t.data.parmanent_line1,this.permanent_district=t.data.parmanent_district,this.permanent_post_code=t.data.parmanent_post_code,this.permanent_country=t.data.parmanent_country,this.type=t.data.type,this.users_info=t.data,100==this.users_info.completeness&"not_verified"==this.users_info.status&&(this.submit_disabled=!0)}.bind(this)).catch(function(t){}.bind(this))}});var reg_req=new Vue({el:"#app",vuetify:new Vuetify,data:{name:"riyad---vue",full_name_input:!0,mobile_input:!0,institution_id_input:!0,number_of_children_input:!0,dob_input:!0,profile_photo:""},methods:{enable_input:function(t){}},beforeCreate(){},created(){bus.$on("changeComponent",t=>{this.componet_name=t}),this.profile_photo=this.images.profile_photo,bus.$on("recent_photo",t=>{this.profile_photo=this.rootAdress+"assets/img/uploads/recent_photos/"+t})},beforeMount(){},mounted(){},beforeUpdated(){},updated(){var t=$("#dashboard_height").height(),e=($(document).height(),t+"px");$(".dashboard_vertical_menu_height").height(e)}});







</script>
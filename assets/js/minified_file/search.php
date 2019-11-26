<script>
	
	var bus = new Vue();





	var search = `
	<div class="container">
	<div class="row justify-content-center">

	<div class="col-xl-7 col-md-9 col-12 text-center bg-info ">
	<h2 class="text-white py-2 ">Search</h2>
	</div>

	<div class="w-100"></div>
	<div class="col-md-5 col-xl-4">	
	<div>
	<p>Search</p>
	<v-text-field
	v-model="search_text"
	label="search"
	@keyup="search()"
	required
	></v-text-field>
	</div>
	</div>


	<div class="col-md-4 col-xl-3">	

	<p>Categories</p>
	<v-select @change="search()"
	v-model="category"
	:items="category_items"
	label="Select"
	value="true"
	required
	></v-select>

	</div>

	</div>



	<div class="row justify-content-center">
	<div class="col-xl-7 col-md-9 col-12   mt-4">
	<div class="row  text-center bg-info">
	<div class="col text-center bg-success">
	<h2 class="text-white py-2 ">Search Results</h2>
	</div>
	</div>
	<div class="row">
	<table class="table" >
	<thead  class="thead-dark" >
	<tr >
	<th>Name</th>
	<th>membership_number</th>
	<th>institution_id</th>
	<th>Gallery</th>
	<th>Details</th>

	</tr>
	</thead>
	<tbody v-if="array_size && users_info_as_props.id != user.id" id="tbody" v-for="user in user_list"  :key='user.id'>
	<tr>
	<td> {{ user.full_name }} </td>
	<td> {{ user.membership_number }} </td>
	<td> {{ user.institution_id }} </td>
	<td>
	<gallery :email='user.email' :user_id='user.id' ></gallery>
	</td>
	<td>
	<get_details :email='user.email' :user_id='user.id' :users_info_as_props='users_info_as_props' :category="category"></get_details>
	</td>
	</tr>
	</tbody>
	</table>


	<div hidden>

	<v-btn class="ma-2" color="orange darken-2" dark>
	<v-icon dark left>mdi-arrow-left</v-icon>Back
	</v-btn>

	<v-btn class="ma-2" color="orange darken-2" dark> Next  &nbsp
	<v-icon dark left>mdi-arrow-right </v-icon>
	</v-btn>

	</div>



	</div>
	</div>


	</div>



	</div>
	`;










	var gallery = `
	<v-row justify="center">
	<v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
	<template v-slot:activator="{ on }">
	<v-btn color="primary" dark v-on="on">Gallery</v-btn>
	</template>
	<v-card>
	<v-toolbar dark color="primary">
	<v-btn icon dark @click="dialog = false">
	<v-icon>mdi-close</v-icon>
	</v-btn>
	<v-toolbar-title>Gallery</v-toolbar-title>
	<v-spacer></v-spacer>
	<v-toolbar-items>
	<v-btn dark text @click="dialog = false">Close</v-btn>
	</v-toolbar-items>
	</v-toolbar>



	<div class="container">
	<div class="row justify-content-md-center">



	<div class="col col-md-5">
	<h1 class="text-center">Recent Photo</h1>


	<img class="text-center img-fluid img-thumbnail" v-if="recent_photo != 'not_set'"
	:src="rootAdress+recent_photos+recent_photo"
	style="max-height: 400px; width: 600px;">


	<img class="text-center img-fluid img-thumbnail" v-if="recent_photo == 'not_set'"
	:src="images.default_photo"
	style="max-height: 400px; width: 600px;">
	</div>

	<div class="w-100">
	</div>

	<div class="col col-md-5">
	<h1 class="text-center">old Photo</h1>
	<img class="text-center img-fluid img-thumbnail" v-if="old_photo != 'not_set'"
	:src="rootAdress+old_photos+old_photo"
	style="max-height: 400px; width: 600px;">
	<img class="text-center img-fluid img-thumbnail" v-if="old_photo == 'not_set'"
	:src="images.default_photo"
	style="max-height: 400px; width: 600px;">
	</div>
	</div>

	<div class="row  justify-content-center">
	<div class="row col-md-8">

	<div class="col-md-12">
	<h1 class="text-center" > Group Photos </h1>
	</div> 
	<div class="col-md-4" v-for="(photo , index) in group_photo">
	<img @click="zoom_in(rootAdress+group_photos+photo , photo)" style="height: 250px; width: 250px;" 
	aspect-ratio="1"
	:src="rootAdress+group_photos+photo" class="rounded mx-auto d-block img-fluid img-thumbnail" alt="...">
	</div>
	</div>
	</div>
	</div>
	</v-card>
	</v-dialog>
	</v-row>
	`;









	var get_details = `
	<v-row justify="center">
	<v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
	<template v-slot:activator="{ on }">
	<v-btn color="primary" dark v-on="on">Profile</v-btn>
	</template>
	<v-card>
	<v-toolbar dark color="primary">
	<v-btn icon dark @click="close_dialog()">
	<v-icon>mdi-close</v-icon>
	</v-btn>
	<v-toolbar-title>Profile</v-toolbar-title>
	<v-spacer></v-spacer>
	<v-toolbar-items>
	<v-btn dark text @click="close_dialog()">Close</v-btn>
	</v-toolbar-items>
	</v-toolbar>

	
	
	<v-container>

	<v-row v-if="profile_user_status == 'approved'" justify="center" class="mb-5">
	<v-col lg="8" class="text-center success white--text" >


	<v-alert type="success">
	<h1> Verified User  </h1>
	<p v-if="change_request_status == 'requested' "> This user has a change request </p>
	<v-btn @click.stop="reject_user_button()" color="error" v-if="users_info_as_props.type == 'admin'" >Reject User</v-btn>
	<div class="w-100 mb-2"></div>

	<v-btn v-if="users_info_as_props.type == 'admin' && profile_user_type != 'admin' " @click.stop="make_admin_button()" color="primary" >Make Admin</v-btn>

	<v-btn v-else-if="users_info_as_props.type == 'admin' && profile_user_type != 'user' " @click.stop="make_user_button()" color="primary" >Make user</v-btn>
	</v-alert>
	

	</v-col>
	</v-row>


	<v-row v-if="profile_user_status == 'rejected' || profile_user_status == 'not_verified'" justify="center" class="mb-5">
	<v-col lg="8" class="text-center danger white--text" >


	<v-alert type="error">

	<h1 v-if="profile_user_status == 'rejected'"> Rejected User  </h1>
	<h1 v-else-if="profile_user_status == 'not_verified'"> New User  </h1>
	<p v-if="change_request_status == 'requested' "> This user has a change request </p>
	<v-btn @click.stop="approve_user_button()" color="success" v-if="users_info_as_props.type == 'admin'" >Aprrove User</v-btn>
	<div class="w-100 mb-2"></div>

	
	</v-alert>



	</v-col>
	</v-row>




	<v-row  justify="center">
	<v-col lg="8" class="text-center success white--text" >
	<h1>
	Profile
	</h1>

	<v-btn v-if="users_info_as_props.type == 'admin' && profile_user_type != 'admin' " @click.stop="edit_info=!edit_info" color="warning" >Edit</v-btn>

	</v-col>
	</v-row>
	

	<v-row justify="center" >
	<v-col lg="8" >
	<v-simple-table>
	<template v-slot:default>
	<thead>
	<tr>
	<th class="text-left title">Index</th>
	<th class="text-left title">Details</th>
	<th class="text-left title" v-if="edit_info">Edit</th>
	</tr>
	</thead>
	<tbody>
	<tr  v-for="(item , index) in users_info" v-show="item[2]=='public' || users_info_as_props.type == 'admin' ">
	<td  class="body-1">{{ takeName(item[0]) }} </td>
	<td>
	
	{{ item[1] }} 
	

	</td>
	<td v-if="edit_info">
	
	<v-text-field v-model="item[1]" v-show="item[0] != 'blood_group' && item[0] != 'date_of_birth' " :disabled="item[0]=='membership_number' || item[0]=='registration_date' || item[0] == 'change_request' || item[0] == 'status' || item[0] == 'email_verification_status'  || item[0] == 'type'   || change_request_status == 'requested' "  @change="changeInfo(item[0] , item[1] , this)"></v-text-field>


	<v-select :disabled="change_request_status == 'requested'" v-model="item[1]" v-show="item[0] == 'blood_group' "
	:items="blood_group_list" @change="changeInfo(item[0] , item[1] , this)"
	></v-select>
	
	<input :disabled="change_request_status == 'requested'" v-model="item[1]" type="date" class="form-control" v-if="item[0] == 'date_of_birth' "
	:items="blood_group_list" @change="changeInfo(item[0] , item[1] , this )">




	</td>
	</tr>
	</tbody>
	</template>
	</v-simple-table>
	</v-col >
	</v-row>
	</v-container>


	</v-card>
	</v-dialog>

	
	<template>
	<v-row justify="center">
	<v-dialog
	v-model="dialog2"
	max-width="290"
	>
	<v-card>
	<v-card-title class="headline red--text">{{ dialog2_title }}</v-card-title>

	<v-card-text class="red--text">
	{{ dialog2_body }}
	</v-card-text>

	<v-card-actions>
	<v-spacer></v-spacer>



	<v-btn
	color="green darken-1"
	text :disabled="dialog2_btn_disabled"
	@click="reject_user()"
	>
	Yes
	</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>
	</template>

	

	
	<template>
	<v-row justify="center">
	

	<v-dialog
	v-model="dialog3"
	max-width="290"
	>
	<v-card>
	<v-card-title class="headline green--text">{{ dialog3_title }}</v-card-title>

	<v-card-text class="black--text">
	{{ dialog3_body }}
	</v-card-text>

	<v-card-actions>
	<v-spacer></v-spacer>


	<v-btn
	color="green darken-1"
	text :disabled="dialog3_btn_disabled"
	@click="make_admin()"
	>
	Yes
	</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>
	</template>

	


	<template>
	<v-row justify="center">
	

	<v-dialog
	v-model="dialog4"
	max-width="290"
	>
	<v-card>
	<v-card-title class="headline green--text">{{ dialog4_title }}</v-card-title>

	<v-card-text class="black--text">
	{{ dialog4_body }}
	</v-card-text>

	<v-card-actions>
	<v-spacer></v-spacer>



	<v-btn
	color="green darken-1"
	text :disabled="dialog4_btn_disabled"
	@click="approve_user()"
	>
	Yes
	</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>
	</template>

	<template>
	<v-row justify="center">
	
	<v-dialog
	v-model="dialog5"
	max-width="290"
	>
	<v-card>
	<v-card-title class="headline green--text">{{ dialog5_title }}</v-card-title>

	<v-card-text class="black--text">
	{{ dialog5_body }}
	</v-card-text>

	<v-card-actions>
	<v-spacer></v-spacer>


	<v-btn
	color="green darken-1"
	text :disabled="dialog5_btn_disabled"
	@click="make_user()"
	>
	Yes
	</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>
	</template>


	<template>
	<v-row justify="center">
	
	<v-dialog
	v-model="dialog6"
	max-width="290"
	>
	<v-card>
	<v-card-title class="headline green--text">{{ dialog6_title }}</v-card-title>

	<v-card-text class="black--text">
	{{ dialog6_body }}
	</v-card-text>

	<v-card-actions>
	<v-spacer></v-spacer>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>
	</template>

	</v-row>
	`;





Vue.component("get_details",{template:get_details,props:["email","user_id","users_info_as_props","category"],data:()=>({dialog:!1,dialog2:!1,dialog3:!1,dialog4:!1,dialog5:!1,dialog6:!1,notifications:!1,sound:!0,widgets:!1,dialog2_body:"Are you sure that you want to block this user?",dialog2_title:"Block User?",dialog3_body:"Are you sure that you want make this user an Admin?",dialog4_body:"Are you sure that you want to approve this user?",dialog5_body:"Are you sure that you want to change the user roll?",dialog6_body:"Are you sure that you want to change the user roll?",dialog3_title:"Make admin?",dialog4_title:"Approve User?",dialog5_title:"Make User?",dialog6_title:"Status",users_info:[],radioGroup:[],disabled:!1,profile_user_status:"",profile_user_type:"",dialog2_btn_disabled:!1,dialog3_btn_disabled:!1,dialog4_btn_disabled:!1,dialog5_btn_disabled:!1,dialog6_btn_disabled:!1,items_email_status:["Aprroved","Rejected"],blood_group_list:["A+","B+","AB+","O+","A-","B-","AB-","O-"],change_data:"",counter:0,edit_info:!1}),methods:{takeName:t=>"full_name"==t?"Full Name":"email"==t?"Email":"mobile"==t?"Mobile":"institution_id"==t?"Institution ID":"nid_or_passport"==t?"NID/Passport":"fathers_name"==t?"Father's Name":"mother_name"==t?"Mother's Name":"spouse_name"==t?"Spouse's Name":"number_of_children"==t?"Number Of Children":"profession"==t?"Profession":"designation"==t?"Designation":"blood_group"==t?"Blood Group":"date_of_birth"==t?"Date Of Birth":"present_line1"==t?"Present Adress Line1":"present_post_code"==t?"Present Post Code":"present_district"==t?"Present District":"parmanent_country"==t?"Present Country":"parmanent_line1"==t?"Permanent Adress Line1":"parmanent_post_code"==t?"Permanent Post Code":"parmanent_district"==t?"Permanent District":"parmanent_country"==t?"Permanent Country":"membership_number"==t?"Member ship Number":"type"==t?"User Type":"status"==t?"Verfication Status":"registration_date"==t?"Account Created at":"institution"==t?"Workplace/Institution":"email_verification_status"==t?"Email Verification Status":"change_request"==t?"Change Request Status":void 0,changeInfo(t,i,s){if("full_name"==t)0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Name",this.dialog6_body="Name must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="Name changed successfully");else if("email"==t){if(0==/^[a-zA-Z]{1}[a-zA-Z1-9._]{3,15}@[a-zA-Z]{1}[a-zA-Z1-9]{3,15}\.[a-zA-Z]{2,10}(\.[a-zA-Z]{2})*$/g.test(i))this.dialog6=!0,this.dialog6_title="Invalid Email",this.dialog6_body="Email must be in a valid format , abc@bcd.com";else this.change_info_database(t,i)}else if("mobile"==t){0==/[\+]{0,1}[\d]{11,}$/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Number",this.dialog6_body="number must be at least 11 digit"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="Number changed successfully")}else if("institution_id"==t){0==/[\S]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Id",this.dialog6_body="Id at least 5 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="Id changed successfully")}else if("nid_or_passport"==t){0==/[\S]{10,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid NID/Passport",this.dialog6_body="NID/passport number at least 10 digit"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="NID/passport changed successfully")}else if("fathers_name"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Name",this.dialog6_body="Name must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="fathers name changed successfully")}else if("mother_name"==t){0==/[A-Za-z.\s]{5,}/g.test(i)&&(this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="mother name changed successfully")}else if("spouse_name"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Name",this.dialog6_body="Name must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="spouse name changed successfully")}else if("number_of_children"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Name",this.dialog6_body="Must be digit "):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="number_of_children changed successfully")}else if("profession"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Name",this.dialog6_body="Name must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="profession changed successfully")}else if("designation"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Name",this.dialog6_body="Name must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="designation changed successfully")}else if("institution"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Name",this.dialog6_body="Name must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="institution name changed successfully")}else if("workplace_or_institution"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Name",this.dialog6_body="Name must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="workplace_or_institution changed successfully")}else if("blood_group"==t){0==/[\+-A-O]{1,3}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Blood Group",this.dialog6_body="Name must be a valid format"):(this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="blood_group changed successfully")}else if("date_of_birth"==t){0==/^([0-9]{4})([-]{1}[0-9]{2}[-]{1}[0-9]{2}$)/gim.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Date",this.dialog6_body="Date must be a valid format"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="date_of_birth changed successfully")}else if("present_line1"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Address",this.dialog6_body="Address must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="present address line1 changed successfully")}else if("present_post_code"==t){0==/[\+]{0,1}[\d]{4,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Post Code",this.dialog6_body="at least 4 digit"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="present post code changed successfully")}else if("present_district"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid District",this.dialog6_body="Address must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="present district changed successfully")}else if("present_country"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Country",this.dialog6_body="Country must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="present country changed successfully")}else if("parmanent_line1"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Address",this.dialog6_body="Address must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="parmanent address line1 changed successfully")}else if("parmanent_post_code"==t){0==/[\+]{0,1}[\d]{4,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Post Code",this.dialog6_body="at least 4 digit"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="parmanent post code changed successfully")}else if("parmanent_district"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid District",this.dialog6_body="Address must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="parmanent district changed successfully")}else if("parmanent_country"==t){0==/[A-Za-z.\s]{5,}/g.test(i)?(this.dialog6=!0,this.dialog6_title="Invalid Country",this.dialog6_body="Country must be at least 6 characters"):(this.change_info_database(t,i),this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="parmanent country changed successfully")}},change_info_database(t,i){axios.post(this.model.modelAdminChangeInfo,{purpose:t,email:this.email,user_id:this.user_id,value:i}).then(function(t){return"email_updated"==t.data?(this.dialog6=!0,this.dialog6_title="Success",this.dialog6_body="Email changed successfully"):"email_already_used"==t.data&&(this.dialog6=!0,this.dialog6_title="Failed",this.dialog6_body="Email already used"),t.data}.bind(this)).catch(function(t){})},close_dialog(){bus.$emit("categroy_from_get_details",this.category),this.dialog=!1,this.get_updated_data()},reject_user_button(){this.dialog2=!0,this.dialog2_body="Are you sure you want to block the user?",this.dialog2_title="Block user?",this.dialog2_btn_disabled=!1},status_name_check:t=>"email_verification_status"==t||"status"==t,approve_user_button(){this.dialog4=!0,this.dialog4_body="Are you sure you want to block the user?",this.dialog4_title="Block user?",this.dialog4_btn_disabled=!1},reject_user(){axios.post(this.model.modelReg_req,{purpose:"reject_user",email:this.email,user_id:this.user_id}).then(function(t){this.dialog2_body="User blocked Successfully",this.dialog2_title="Success",this.dialog2_btn_disabled=!0,this.get_updated_data()}.bind(this)).catch(function(t){})},dialog2_reject_user_no(){this.dialog2=!1,this.dialog2_btn_disabled=!1},make_admin(){axios.post(this.model.modelReg_req,{purpose:"make_admin",email:this.email,user_id:this.user_id}).then(function(t){this.edit_info=!1,this.dialog3_body="Made admin successfully",this.dialog3_title="Success",this.dialog3_btn_disabled=!0,this.get_updated_data()}.bind(this)).catch(function(t){})},make_admin_button(){this.dialog3=!0,this.dialog3_btn_disabled=!1},dialog3_make_admin_no(){this.dialog3=!1,this.dialog3_btn_disabled=!1},make_user(){axios.post(this.model.modelReg_req,{purpose:"make_user",email:this.email,user_id:this.user_id}).then(function(t){this.dialog5_body="Made user successfully",this.dialog5_title="Success",this.dialog5_btn_disabled=!0,this.get_updated_data()}.bind(this)).catch(function(t){})},make_user_button(){this.dialog5=!0,this.dialog5_btn_disabled=!1},make_user_no(){this.dialog5=!1,this.dialog5_btn_disabled=!1},approve_user(){axios.post(this.model.modelReg_req,{purpose:"approve_user",email:this.email,user_id:this.user_id}).then(function(t){this.dialog4_body="User approved successfully",this.dialog4_title="Success",this.dialog4_btn_disabled=!0,this.get_updated_data()}.bind(this)).catch(function(t){})},dialog4_approve_user_no(){this.dialog4=!1,this.dialog4_btn_disabled=!1},get_updated_data(){axios.post(this.model.modelPrivacy,{purpose:"get_profile_details_for_all",email:this.email,user_id:this.user_id}).then(function(t){this.users_info=t.data,this.profile_user_status=this.users_info[22][1],this.profile_user_type=this.users_info[25][1],this.change_request_status=this.users_info[24][1]}.bind(this)).catch(function(t){}.bind(this))}},created(){axios.post(this.model.modelPrivacy,{purpose:"get_profile_details_for_all",email:this.email,user_id:this.user_id}).then(function(t){this.users_info=t.data,this.profile_user_status=this.users_info[22][1],this.profile_user_type=this.users_info[25][1],this.change_request_status=this.users_info[24][1]}.bind(this)).catch(function(t){}.bind(this))}}),Vue.component("gallery",{template:gallery,props:["email","user_id"],data:()=>({dialog:!1,notifications:!1,sound:!0,widgets:!1,dialogm1:"",dialog:!1,dialog_photo:"",dialog_photo_baseName:"",recent_photo:"",old_photo:"",group_photo:[],recent_photos:"assets/img/uploads/recent_photos/",old_photos:"assets/img/uploads/old_photos/",group_photos:"assets/img/uploads/group_photos/",uploads:"assets/img/uploads/"}),methods:{zoom_in(t,i){this.button_disabled=!1,this.photo_delete_status="",this.dialog_photo_baseName=i,this.dialog_photo=t,this.dialog=!0}},created(){axios.post(this.model.modelGallery,{purpose:"getPhotos_for_all_users",email:this.email,user_id:this.user_id}).then(function(t){this.recent_photo=t.data.recent_photo,this.old_photo=t.data.old_photo,this.group_photo=t.data.group_photo}.bind(this)).catch(function(t){}.bind(this))}}),Vue.component("search",{template:search,data:()=>({category:"full_name",category_items:["full_name","institution_id","membership_number"],search_text:"",user_list:[],array_size:!0,users_info_as_props:{}}),methods:{search(){axios.post(this.model.modelSearch,{purpose:this.category,search_text:this.search_text}).then(function(t){1==t.data.length?(this.user_list=[],this.user_list[0]=JSON.parse(t.data)):t.data.length>1?this.user_list=t.data:0==t.data&&(this.user_list=[])}.bind(this)).catch(function(t){}.bind(this))}},created(){bus.$on("categroy_from_get_details",t=>{this.category=t,this.search()}),1==this.users_info__.admin__&&this.category_items.push("rejected_user","newly_registered"),axios.post(this.model.modelProfile_update,{purpose:"getProfileBasicInfo"}).then(function(t){this.users_info_as_props=t.data}.bind(this)).catch(function(t){}.bind(this))}});var search=new Vue({el:"#app",vuetify:new Vuetify});






</script>
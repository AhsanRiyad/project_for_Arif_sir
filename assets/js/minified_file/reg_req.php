<script>
	
	

	var reg_req = `
	<div class="row">
	<p id="user_id" hidden ></p>
	<div class="col-xl-8 col-md-10 col-10 offset-1  mt-4">
	<div class="row  text-center bg-info">
	<div class="col text-center bg-info">
	<h2 class="text-white py-2 ">New Account Request</h2>
	</div>
	</div>
	<div class="row">
	<table class="table" >
	<thead  class="thead-dark" >
	<tr >
	<th>id</th>
	<th>Req Date</th>
	<th>Req From</th>
	<th>Details</th>
	<th>Accept</th>
	<th>Reject</th>
	</tr>
	</thead>
	<tbody v-if="array_size" id="tbody" v-for="user in user_list">
	<tr>
	<td> {{ user.id }} </td>
	<td> {{ user.registration_date }} </td>
	<td> {{ user.full_name }} </td>
	<td><component_user_datails v-bind:email="user.email" :user_id="user.id"></component_user_datails></td>
	<td><button @click="approve_id(user.email , user.id)" class="btn btn-success">Accept</button></td>
	<td><button @click="reject_id(user.email , user.id)" class="btn btn-danger">Reject</button></td>
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
	

	<template>
	<v-row justify="center"> 
	</v-btn>
	<v-dialog
	v-model="dialog"
	max-width="290"
	>
	<v-card>
	<v-card-title class="headline">Action Status</v-card-title>

	<v-card-text>
	{{ admin_approval_status }}
	</v-card-text>

	<v-card-actions>
	<v-spacer></v-spacer>

	<v-btn
	color="green darken-1"
	text
	@click="dialog = false"
	>OK
	</v-btn>


	</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>
	</template>

	</div>
	`;








	var modal_user_details_2 =  `
	<v-row justify="center">
	<v-dialog v-model="dialog" scrollable max-width="400px">
	<template v-slot:activator="{ on }">
	<v-btn color="primary" dark v-on="on">Details</v-btn>
	</template>
	<v-card>
	<v-card-title>User Details</v-card-title>
	<v-divider></v-divider>
	<v-card-text style="height: 300px;" class="black--text">
	<v-container>
	<v-row>


	<v-col cols="12">
	<v-row align="center" justify="center">
	<v-img
	:src="user_details.recent_photo"
	aspect-ratio="1"
	class="grey lighten-2"
	max-width="200"
	max-height="150"
	></v-img>
	</v-row>
	</v-col>


	<v-col cols="6">
	<p>Full Name</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.full_name }} </p>
	</v-col>

	<v-col cols="6">
	<p>Email</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.email }} </p>
	</v-col>

	<v-col cols="6">
	<p>Mobile</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.mobile }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Institution Id</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.institution_id }} </p>
	</v-col>


	<v-col cols="6">
	<p>nid_or_passport</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.nid_or_passport }} </p>
	</v-col>

	<v-col cols="6">
	<p>Fathers Name</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.fathers_name }} </p>
	</v-col>

	<v-col cols="6">
	<p>Mothers Name</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.mother_name }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Spouse Name</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.spouse_name }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Number Of Children</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.number_of_children }} </p>
	</v-col>

	<v-col cols="6">
	<p>Profession</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.profession }} </p>
	</v-col>

	<v-col cols="6">
	<p>Institution/Workplace</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.institution }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Designation</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.designation }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Blood Group</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.blood_group }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Date Of Birth</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.date_of_birth }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Present Adress Line1</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.present_line1 }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Present District</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.present_district }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Present Post Code</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.present_post_code }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Present Country</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.present_country }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Permanent Adress Line1</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.parmanent_line1 }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Permanent District</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.parmanent_district }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Permanent Post Code</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.parmanent_post_code }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>Permanent Country</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.parmanent_country }} </p>
	</v-col>


	
	
	</v-row>
	</v-container>
	</v-card-text>
	
	<v-divider></v-divider>
	<v-card-actions>
	<v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>
	`;


	





	var modal_user_details =  `
	<v-row justify="center">
	<v-dialog v-model="dialog" scrollable max-width="400px">
	<template v-slot:activator="{ on }">
	<v-btn color="primary" dark v-on="on">Details</v-btn>
	</template>
	<v-card>
	<v-card-title>User Details</v-card-title>
	<v-divider></v-divider>
	<v-card-text style="height: 300px;" class="black--text">
	<v-container>
	<v-row>
	<v-col>
	<img class="img-fluid" v-bind:src="user_details.recent_photo" style="height: 200px; width: 300px">
	<v-simple-table>
	<template v-slot:default>
	<thead>
	<tr>
	<th class="text-left">Name</th>
	<th class="text-left">New</th>
	<th class="text-left">Old</th>
	</tr>
	</thead>
	<tbody>
	<tr v-for="(user, name) in user_change_details" >
	<td>{{ takeName(name)  }}</td>
	<td>{{ user[0] }}</td>
	<td>{{ user[1] }}</td>
	</tr>
	</tbody>
	</template>
	</v-simple-table>
	
	</v-col>
	
	</v-row>
	</v-container>
	</v-card-text>
	
	<v-divider></v-divider>
	<v-card-actions>
	<v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>
	`;












	var change_request = `
	<div class="row">
	<p id="user_id" hidden ></p>
	<div class="col-xl-8 col-md-10 col-10 offset-1  mt-4">
	<div class="row  text-center bg-info">
	<div class="col text-center bg-info">
	<h2 class="text-white py-2 ">Change Request</h2>
	</div>
	</div>
	<div class="row">
	<table class="table" >
	<thead  class="thead-dark" >
	<tr >
	<th>membership_number</th>
	<th>Req Date</th>
	<th>Req From</th>
	<th>Details</th>
	<th>Accept</th>
	<th>Reject</th>
	</tr>
	</thead>
	<tbody v-if="array_size && user.type == 'user'" id="tbody" v-for="user in user_list">
	<tr>
	<td> {{ user.membership_number }} </td>
	<td> {{ user.change_request_time }} </td>
	<td> {{ user.full_name }} </td>
	<td><change_details v-bind:email="user.email" :user_id="user.id"></change_details></td>
	<td><button @click="approve_id(user.email , user.id)" class="btn btn-success">Accept</button></td>
	<td><button @click="reject_id(user.email , user.id)" class="btn btn-danger">Reject</button></td>
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
	

	<template>
	<v-row justify="center"> 
	</v-btn>
	<v-dialog
	v-model="dialog"
	max-width="290"
	>
	<v-card>
	<v-card-title class="headline">Action Status</v-card-title>

	<v-card-text>
	{{ admin_approval_status }}
	</v-card-text>

	<v-card-actions>
	<v-spacer></v-spacer>

	<v-btn
	color="green darken-1"
	text
	@click="dialog = false"
	>OK
	</v-btn>


	</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>
	</template>

	</div>
	`;




Vue.component("change_request",{template:change_request,data:()=>({user_list:[],dialog:!1,admin_approval_status:"",array_size:!0}),methods:{changeName:function(){},get_users:function(){this.$http.post(this.model.modelReg_req,{purpose:"get_change_req_user"}).then(function(e){1==e.data.length?(this.user_list=[],this.user_list[0]=JSON.parse(e.data)):e.data.length>1?this.user_list=e.data:0==e.data&&(this.user_list=[])})},approve_id:function(e,t){this.$http.post(this.model.modelReg_req,{purpose:"approve_user_change_request",email:e,user_id:t}).then(function(e){this.admin_approval_status="Changes approved",this.get_users(),this.dialog=!0})},reject_id:function(e,t){axios.post(this.model.modelReg_req,{purpose:"reject_user_user_request",email:e,user_id:t}).then(function(e){this.admin_approval_status="User change request is rejected",this.dialog=!0,this.get_users()}.bind(this)).catch(function(e){})}},created(){axios.post(this.model.modelReg_req,{purpose:"get_change_req_user"}).then(function(e){1==e.data.length?(this.user_list=[],this.user_list[0]=JSON.parse(e.data)):e.data.length>1&&(this.user_list=e.data)}.bind(this)).catch(function(e){console.log(e)})},mounted(){}}),Vue.component("change_details",{props:["email","user_id"],template:modal_user_details,data:()=>({dialogm1:"",dialog:!1,user_details:{},user_change_details:{}}),methods:{takeName:e=>"full_name"==e?"Full Name":"email"==e?"Email":"mobile"==e?"Mobile":"institution_id"==e?"Institution ID":"nid_or_passport"==e?"NID/Passport":"fathers_name"==e?"Father's Name":"mother_name"==e?"Mother's Name":"spouse_name"==e?"Spouse's Name":"number_of_children"==e?"Number Of Children":"profession"==e?"Profession":"designation"==e?"Designation":"blood_group"==e?"Blood Group":"date_of_birth"==e?"Date Of Birth":"present_line1"==e?"Present Adress Line1":"present_post_code"==e?"Present Post Code":"present_district"==e?"Present District":"parmanent_country"==e?"Present Country":"parmanent_line1"==e?"Permanent Adress Line1":"parmanent_post_code"==e?"Permanent Post Code":"parmanent_district"==e?"Permanent District":"parmanent_country"==e?"Permanent Country":"membership_number"==e?"Member ship Number":"type"==e?"User Type":"status"==e?"Verfication Status":"registration_date"==e?"Account Created at":"institution"==e?"Workplace/Institution":void 0},mounted(){axios.post(this.model.modelReg_req,{purpose:"get_change_req_data",user_id:this.user_id}).then(function(e){this.user_change_details=e.data}.bind(this)).catch(function(e){}.bind(this)),axios.post(this.model.modelReg_req,{purpose:"getProfileBasicInfo",user_id:this.user_id}).then(function(e){this.user_details=e.data,"not_set"==e.data.recent_photo?this.user_details.recent_photo=rootAdress+"assets/img/uploads/default.jpg":this.user_details.recent_photo=this.rootAdress+"assets/img/uploads/recent_photos/"+e.data.recent_photo}.bind(this)).catch(function(e){}.bind(this))}}),Vue.component("component_user_datails",{props:["email","user_id"],template:modal_user_details_2,data:()=>({dialogm1:"",dialog:!1,user_details:{}}),mounted(){axios.post(this.model.modelReg_req,{purpose:"getProfileBasicInfo",user_id:this.user_id}).then(function(e){this.user_details=e.data,"not_set"==e.data.recent_photo?this.user_details.recent_photo=rootAdress+"assets/img/uploads/default.jpg":this.user_details.recent_photo=this.rootAdress+"assets/img/uploads/recent_photos/"+e.data.recent_photo}.bind(this)).catch(function(e){}.bind(this))}}),Vue.component("reg_req",{template:reg_req,data:()=>({user_list:[],dialog:!1,admin_approval_status:"",array_size:!0}),methods:{changeName:function(){},get_users:function(){this.$http.post(this.model.modelReg_req,{purpose:"get_data"}).then(function(e){1==e.data.length?(this.user_list=[],this.user_list[0]=JSON.parse(e.data)):e.data.length>1?this.user_list=e.data:0==e.data&&(this.user_list=[])})},approve_id:function(e,t){this.$http.post(this.model.modelReg_req,{purpose:"approve_user",email:e,user_id:t}).then(function(e){this.admin_approval_status="User is approved",this.get_users(),this.dialog=!0})},reject_id:function(e,t){this.$http.post(this.model.modelReg_req,{purpose:"reject_user",email:e,user_id:t}).then(function(e){this.admin_approval_status="User is rejected",this.dialog=!0,this.get_users()})}},created(){axios.post(this.model.modelReg_req,{purpose:"get_data"}).then(function(e){1==e.data.length?(this.user_list=[],this.user_list[0]=JSON.parse(e.data)):e.data.length>1&&(this.user_list=e.data)}.bind(this)).catch(function(e){})},mounted(){}});var reg_req=new Vue({el:"#app",vuetify:new Vuetify,data:{name:"riyad---vue",name_result:"",first_name_color:"green",users_info:{}},methods:{},beforeCreate(){},created(){},beforeMount(){},mounted(){},beforeUpdated(){},updated(){var e=$("#dashboard_height").height();if(e<$(document).height())$(".dashboard_vertical_menu_height").height("100vh");else{var t=e+"px";$(".dashboard_vertical_menu_height").height(t)}}});











</script>
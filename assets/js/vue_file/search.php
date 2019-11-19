<script>
	
	var bus = new Vue();


	var code = `
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
	<v-btn @click.stop="reject_user_button()" color="error" v-if="users_info_as_props.type == 'admin'" >Reject User</v-btn>
	<div class="w-100 mb-2"></div>

	<v-btn v-if="users_info_as_props.type == 'admin' && profile_user_type != 'admin'" @click.stop="make_admin_button()" color="primary" >Make Admin</v-btn>

	<v-btn v-else-if="users_info_as_props.type == 'admin' && profile_user_type != 'user'" @click.stop="make_user_button()" color="primary" >Make user</v-btn>
	</v-alert>
	

	




	</v-col>
	</v-row>


	<v-row v-if="profile_user_status == 'rejected'" justify="center" class="mb-5">
	<v-col lg="8" class="text-center danger white--text" >


	<v-alert type="error">
	<h1> Rejected User  </h1>
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
	</tr>
	</thead>
	<tbody>
	<tr  v-for="(item , index) in users_info" v-show="item[2]=='public' || users_info_as_props.type == 'admin' ">
	<td  class="body-1">{{ item[0] }} </td>
	<td>
	
	{{ item[1] }} 
	

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
	text
	@click="dialog2_reject_user_no()"
	>
	No
	</v-btn>

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
	text
	@click="dialog3_make_admin_no()"
	>
	No
	</v-btn>

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
	text
	@click="dialog4_approve_user_no()"
	>
	No
	</v-btn>

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
	text
	@click="dialog5_make_user_no()"
	>
	No
	</v-btn>

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

	






	</v-row>
	`;


	Vue.component('get_details' , {
		template: code,
		props: ['email' , 'user_id' ,  'users_info_as_props' , 'category'],
		data(){
			return {
				dialog: false,
				dialog2: false,
				dialog3: false,
				dialog4: false,
				dialog5: false,
				notifications: false,
				sound: true,
				widgets: false,
				dialog2_body: 'Are you sure that you want to block this user?',
				dialog2_title: 'Block User?',
				dialog3_body: 'Are you sure that you want make this user an Admin?',
				dialog4_body: 'Are you sure that you want to approve this user?',
				dialog5_body: 'Are you sure that you want to change the user roll?',
				dialog3_title: 'Make admin?',
				dialog4_title: 'Approve User?',
				dialog5_title: 'Make User?',
				users_info: [],
				radioGroup: [],
				disabled: false,
				profile_user_status:'',
				profile_user_type:'',
				dialog2_btn_disabled: false,
				dialog3_btn_disabled: false,
				dialog4_btn_disabled: false,
				dialog5_btn_disabled: false,
			}
		},
		methods : {
			close_dialog(){

				bus.$emit('categroy_from_get_details' , this.category);
				this.dialog = false;
				this.get_updated_data();
			},
			reject_user_button(){

				this.dialog2 = true
				this.dialog2_body = 'Are you sure you want to block the user?';
				this.dialog2_title = 'Block user?';
				this.dialog2_btn_disabled = false;

			},
			approve_user_button(){

				this.dialog4 = true
				this.dialog4_body = 'Are you sure you want to block the user?';
				this.dialog4_title = 'Block user?';
				this.dialog4_btn_disabled = false;

			}
			,
			reject_user(){

				axios.post(this.model.modelReg_req , {
					purpose : 'reject_user',
					email: this.email,
					user_id : this.user_id,
				})
				.then(function (response) {

				}.bind(this))
				.catch(function (error) {
					console.log(error);
				});




				this.dialog2_body = 'User blocked Successfully';
				this.dialog2_title = 'Success';
				this.dialog2_btn_disabled = true;
				this.get_updated_data();
			},
			dialog2_reject_user_no(){
				this.dialog2 = false;
				this.dialog2_btn_disabled = false
			},
			make_admin(){

				axios.post(this.model.modelReg_req , {
					purpose : 'make_admin',
					email: this.email,
					user_id: this.user_id,
				})
				.then(function (response) {

				}.bind(this))
				.catch(function (error) {
					console.log(error);
				});


				this.dialog3_body = 'Made admin successfully';
				this.dialog3_title = 'Success';
				this.dialog3_btn_disabled = true;
				this.get_updated_data();
			},
			make_admin_button(){


				this.dialog3 = true;
				this.dialog3_btn_disabled = false;

							},
			dialog3_make_admin_no(){

				this.dialog3 = false;
				this.dialog3_btn_disabled = false
			},
			make_user(){

				axios.post(this.model.modelReg_req , {
					purpose : 'make_user',
					email: this.email,
					user_id: this.user_id,
				})
				.then(function (response) {

				}.bind(this))
				.catch(function (error) {
					console.log(error);
				});


				this.dialog5_body = 'Made user successfully';
				this.dialog5_title = 'Success';
				this.dialog5_btn_disabled = true;
				this.get_updated_data();
			},
			make_user_button(){

				this.dialog5 = true;
				this.dialog5_btn_disabled = false;
			},
			make_user_no(){

				this.dialog5 = false;
				this.dialog5_btn_disabled = false
			},
			approve_user(){


				axios.post(this.model.modelReg_req , {
					purpose : 'approve_user',
					email: this.email,
					user_id: this.user_id,
				})
				.then(function (response) {

				}.bind(this))
				.catch(function (error) {
					console.log(error);
				});


				this.dialog4_body = 'User approved successfully';
				this.dialog4_title = 'Success';
				this.dialog4_btn_disabled = true;
				this.get_updated_data();
			},
			dialog4_approve_user_no(){

				this.dialog4 = false;
				this.dialog4_btn_disabled = false
			},
			get_updated_data(){
				// alert(this.user_id);
				//alert('this.user_id');
				axios.post( this.model.modelPrivacy ,
				{
					purpose: 'get_profile_details_for_all',
					email: this.email,
					user_id: this.user_id, 
				}).then(function(response){
					this.users_info = response.data;
					console.log(response);
					this.profile_user_status = this.users_info[22][1];
					this.profile_user_type = this.users_info[23][1];
				}.bind(this))
				.catch(function(error){

					console.log(error);
				}.bind(this));
			}
		},
		created(){


			axios.post( this.model.modelPrivacy ,
			{
				purpose: 'get_profile_details_for_all',
				email: this.email,
				user_id: this.user_id,
			}).then(function(response){
				this.users_info = response.data;
				console.log(response);
				this.profile_user_status = this.users_info[22][1];
				this.profile_user_type = this.users_info[23][1];
				console.log(this.users_info[22][0]);
			}.bind(this))
			.catch(function(error){

				console.log(error);
			}.bind(this));




		}
	})




	







	var code = `
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


	Vue.component('gallery' , {
		template: code,
		props: ['email' , 'user_id'],
		data(){
			return {
				dialog: false,
				notifications: false,
				sound: true,
				widgets: false,

				dialogm1: '',
				dialog: false,
				dialog_photo: '',
				dialog_photo_baseName: '',
				recent_photo: '' ,
				old_photo: '' ,
				group_photo: [],
				recent_photos: 'assets/img/uploads/recent_photos/',
				old_photos: 'assets/img/uploads/old_photos/',
				group_photos:  'assets/img/uploads/group_photos/',
				uploads:  'assets/img/uploads/',



			}
		},
		methods : {
			zoom_in(photo , baseName){
      //alert(photo);
      this.button_disabled = false;
      this.photo_delete_status = '';
      this.dialog_photo_baseName = baseName;
      this.dialog_photo = photo;
      this.dialog = true;
      // alert('zooming in photo');
  },
},
created(){


	axios.post( this.model.modelGallery ,
	{

		purpose: 'getPhotos_for_all_users',
		email: this.email ,
		user_id: this.user_id ,
	}
	).then(function(response){
        //this.users_info = response.data;
        // alert(rootAdress+'/assets/img/uploads/recent_photo/'+recent_photo);

        console.log(response);
        this.recent_photo = response.data.recent_photo;
        this.old_photo = response.data.old_photo;
        this.group_photo = response.data.group_photo;

        //alert(this.rootAdress+'assets/img/uploads/recent_photos/'+this.recent_photo);
        //alert(this.rootAdress+'assets/img/uploads/group_photos/'+this.group_photo[0]);

    }.bind(this))
	.catch(function(error){

        //console.log(error);
    }.bind(this));
}
})







	var code = `
	<div class="container">
	<div class="row justify-content-center">

	<div class="col-md-7 text-center bg-info ">
	<h2 class="text-white py-2 ">Search</h2>
	</div>

	<div class="w-100"></div>
	<div class="col-md-5">	
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


	<div class="col-md-2">	

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
	<div class="col-md-7   mt-4">
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
	

	Vue.component('search' , {
		template: code,
		data(){
			return {
				category: 'full_name',
				category_items: [
				'full_name',
				'institution_id',
				'membership_number',
				],
				search_text: '',
				user_list : [] , 
				array_size: true ,
				users_info_as_props: {},
			}
		},
		methods: {

			search(){
				//console.log(this.search_text);
				//console.log(this.category);

				axios.post( this.model.modelSearch ,
				{
					purpose: this.category ,
					search_text: this.search_text,

				}
				).then(function(response){

					console.log(response);

					if(response.data.length == 1){
						this.user_list = []; 
						this.user_list[0] =  JSON.parse(response.data);
						console.log(this.user_list[0]);
					}else if(response.data.length > 1){
						this.user_list =  response.data;
						console.log(this.user_list[0].email);
					}else if(response.data == 0){
						this.user_list =  [];
					}

				}.bind(this))
				.catch(function(error){

					console.log(error);
				}.bind(this));


			}


		},
		created(){
			bus.$on('categroy_from_get_details' , (data)=>{
				this.category = data ; 
				this.search();
				
			})

			this.users_info__.admin__ == true ? this.category_items.push("rejected_user") : '';
			axios.post( this.model.modelProfile_update ,
			{
				purpose: 'getProfileBasicInfo',
				
			}
			).then(function(response){
				this.users_info_as_props = response.data ;
				
			}.bind(this))
			.catch(function(error){

				

        //console.log(error);
    }.bind(this));
		}
	})




	var search = new Vue({
		el:'#search',
		vuetify:new Vuetify(),
	})
</script>
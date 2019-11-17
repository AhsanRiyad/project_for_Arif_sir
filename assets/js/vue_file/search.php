<script>
	



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
		props: ['email'],
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
	<v-select
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
	<tbody v-if="array_size" id="tbody" v-for="user in user_list">
	<tr>
	<td> {{ user.full_name }} </td>
	<td> {{ user.membership_number }} </td>
	<td> {{ user.institution_id }} </td>
	<td>

	<gallery :email='user.email'></gallery>

	</td>
	<td><button @click="reject_id(user.email)" class="btn btn-danger">Reject</button></td>
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

		}
	})




	var search = new Vue({
		el:'#search',
		vuetify:new Vuetify(),
		data:{
			category: 'full_name',
			category_items: [
			'full_name',
			'institution_id',
			'membership_number',
			],
			search_text: '',
			user_list : [] , 
			array_size: true ,
			dialog: false,
			notifications: false,
			sound: true,
			widgets: false,



		},
		methods:{
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
		}
	})
</script>
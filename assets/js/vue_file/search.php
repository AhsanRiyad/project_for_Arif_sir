<script>
	



	var code = `
	<v-row justify="center">
	<v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
	<template v-slot:activator="{ on }">
	<v-btn color="primary" dark v-on="on">Open Dialog</v-btn>
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
				loading:false,
				photo_delete_status: '',
				button_disabled: false,



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
    deletePhoto(){
      this.loading = true;

      //alert('deleting photo');
      axios.post( this.model.modelGallery ,
      {
        purpose: 'deletePhoto',
        basename: this.dialog_photo_baseName
      }
      ).then(function(response){
        this.loading = false;
        this.recent_photo = response.data.recent_photo;
        this.old_photo = response.data.old_photo;
        this.group_photo = response.data.group_photo;
        this.photo_delete_status = "Your photo has been deleted";
        this.button_disabled = true ;
        console.log(response);


      }.bind(this))
      .catch(function(error){

        this.loading = false;


        //console.log(error);
      }.bind(this));


    },
  },
		created(){


			axios.post( this.model.modelGallery ,
			{

				purpose: 'getPhotos',
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
	<div>
	<v-autocomplete
	label="Components"
	:items="components"
	></v-autocomplete>
	</div>
	`;
	

	Vue.component('search' , {
		template: code,
		data(){
			return {
				components: [
				'Autocompletes', 'Comboboxes', 'Forms', 'Inputs', 'Overflow Buttons', 'Selects', 'Selection Controls', 'Sliders', 'Textareas', 'Text Fields',
				],
			}
		},
		methods: {

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
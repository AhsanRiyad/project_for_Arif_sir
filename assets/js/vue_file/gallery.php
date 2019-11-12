<script>



  Vue.mixin({
    data: function() {
      return {


      }
    }
  })





  var code = `<v-container>

  <v-row align="center" justify="center">
  <v-col cols="12"  class="text-center">
  <h1>
  Recent Photo
  </h1>
  </v-col>
  </v-row>

  <v-row >

  <v-col cols="12"  align="center" justify="center">

  <v-img
  :src="rootAdress+recent_photos+recent_photo"
  lazy-src=""
  aspect-ratio="1"
  class="grey lighten-2"
  max-width="400"
  max-height="300"
  ></v-img>
  </v-col>
  </v-row>

  <v-row align="center" justify="center">
  <v-col cols="12"  class="text-center">
  <h1>
  Old Photo
  </h1>
  </v-col>
  </v-row>

  <v-row >
  <v-col cols="12"  align="center" justify="center">
  <v-img
  :src="rootAdress+old_photos+old_photo"
  lazy-src=""
  aspect-ratio="1"
  class="grey lighten-2"
  max-width="400"
  max-height="300"
  ></v-img>
  </v-col>
  </v-row>




  <div class="container">
    <div class="row  justify-content-center">
    <div class="row col-md-8">
    
    <div class="col-md-12">
    <h1 class="text-center" > Group Photos </h1>
     </div> 

      <div class="col-md-4" v-for="(photo , index) in group_photo">
        <img @click="zoom_in(rootAdress+group_photos+photo)" style="height: 250px; width: 250px;" :src="rootAdress+group_photos+photo" class="rounded mx-auto d-block img-fluid img-thumbnail" alt="...">
      </div>
      </div>
    </div>
  </div>




  <v-row justify="center">
  <v-dialog v-model="dialog" scrollable max-width="500px">

  <v-card>
  <v-card-title>Select Country</v-card-title>
  <v-divider></v-divider>
  <v-card-text style="height: 300px;">
  
    <v-row align="center" justify="center">
    <v-img
      :src="dialog_photo"
      class="grey lighten-2"
      max-width="500"
      max-height="300"
    ></v-img>
  </v-row>

  </v-card-text>
  <v-divider></v-divider>
  <v-card-actions>
  <v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
  <v-btn color="blue darken-1" text @click="dialog = false">Save</v-btn>
  </v-card-actions>
  </v-card>
  </v-dialog>
  </v-row>














  </v-container>
  `;



  Vue.component('gallery' , {
   template: code,
   data(){
    return {
      dialogm1: '',
      dialog: false,
      dialog_photo: '',
      recent_photo: '' ,
      old_photo: '' ,
      group_photo: [],
      recent_photos: 'assets/img/uploads/current_photos/',
      old_photos: 'assets/img/uploads/old_photos/',
      group_photos:  'assets/img/uploads/group_photos/',

    }
  },
  methods : {
    zoom_in(photo){
      alert(photo);
      this.dialog_photo = photo;
      this.dialog = true;
      // alert('zooming in photo');
    },
  },
  created(){

      //alert(this.model.modelGallery);

      axios.post( this.model.modelGallery ,
      {

        purpose: 'getPhotos',
      }
      ).then(function(response){
        //this.users_info = response.data;
        // alert(rootAdress+'/assets/img/uploads/current_photo/'+recent_photo);

        console.log(response);
        this.recent_photo = response.data.recent_photo;
        this.old_photo = response.data.old_photo;
        this.group_photo = response.data.group_photo;

        //alert(this.rootAdress+'assets/img/uploads/current_photos/'+this.recent_photo);
        //alert(this.rootAdress+'assets/img/uploads/group_photos/'+this.group_photo[0]);

      }.bind(this))
      .catch(function(error){

        //console.log(error);
      }.bind(this));




    }

  })




  var gallery = new Vue({
    el: '#gallery' ,
    vuetify: new Vuetify(), 
  })





</script>

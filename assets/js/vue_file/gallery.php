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



  <v-row align="center" justify="center">
  <v-col cols="12"  class="text-center">
  <h1>
  Group Photo
  </h1>
  </v-col>
  </v-row>



  <v-row>
  <v-col cols="12" sm="6" offset-sm="3">
  <v-card>
  <v-container fluid>
  <v-row>
  <v-col @click="zoom_in()"
  v-for="(photo , index) in group_photo"
  class="d-flex child-flex"
  cols="4"
  >
  <v-card flat tile class="d-flex">
  <v-img
  :src="rootAdress+group_photos+photo"
  :key="index"
  aspect-ratio="1"
  class="grey lighten-2"
  >

  </v-img>
  </v-card>
  </v-col>
  </v-row>
  </v-container>
  </v-card>
  </v-col>
  </v-row>



  </v-container>
  `;



  Vue.component('gallery' , {
   template: code,
   data(){
    return {
      recent_photo: '' ,
      old_photo: '' ,
      group_photo: [],
      recent_photos: 'assets/img/uploads/current_photos/',
      old_photos: 'assets/img/uploads/old_photos/',
      group_photos:  'assets/img/uploads/group_photos/',

    }
  },
  methods : {
    zoom_in(){
      alert('zooming in photo');
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

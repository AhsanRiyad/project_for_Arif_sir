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
  src=""
  lazy-src="https://picsum.photos/id/11/10/6"
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
  src="https://picsum.photos/id/11/500/300"
  lazy-src="https://picsum.photos/id/11/10/6"
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
  v-for="n in 9"
  :key="n"
  class="d-flex child-flex"
  cols="4"
  >
  <v-card flat tile class="d-flex">
  <v-img
  src=""
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
      group_photo: []

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
        this.old = response.data.old;
        this.group_photo = response.data.group_photo;

        alert(this.rootAdress+'assets/img/uploads/recent_photo/'+this.recent_photo);

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

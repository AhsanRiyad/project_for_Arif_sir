



<script>







Vue.mixin({data:function(){return{}}});var gallery='\n <div class="container">\n  <div class="row justify-content-md-center">\n\n\n\n  <div class="col col-md-5">\n  <h1 class="text-center">Recent Photo</h1>\n\n\n  <img class="text-center img-fluid img-thumbnail" v-if="recent_photo != \'not_set\'"\n  :src="rootAdress+recent_photos+recent_photo"\n   style="max-height: 400px; width: 600px;">\n\n\n  <img class="text-center img-fluid img-thumbnail" v-if="recent_photo == \'not_set\'"\n  :src="images.default_photo"\n  style="max-height: 400px; width: 600px;">\n  </div>\n\n\n\n\n  <div class="w-100">\n  </div>\n  \n  <div class="col col-md-5">\n  <h1 class="text-center">old Photo</h1>\n\n\n  <img class="text-center img-fluid img-thumbnail" v-if="old_photo != \'not_set\'"\n  :src="rootAdress+old_photos+old_photo"\n   style="max-height: 400px; width: 600px;">\n\n\n  <img class="text-center img-fluid img-thumbnail" v-if="old_photo == \'not_set\'"\n  :src="images.default_photo"\n  style="max-height: 400px; width: 600px;">\n  </div>\n\n\n\n  </div>\n\n  <div class="row  justify-content-center">\n  <div class="row col-md-8">\n\n  <div class="col-md-12">\n  <h1 class="text-center" > Group Photos </h1>\n  </div> \n\n  <div class="col-md-4" v-for="(photo , index) in group_photo">\n  <img @click="zoom_in(rootAdress+group_photos+photo , photo)" style="height: 250px; width: 250px;" \n  aspect-ratio="1"\n  :src="rootAdress+group_photos+photo" class="rounded mx-auto d-block img-fluid img-thumbnail" alt="...">\n  </div>\n  </div>\n  </div>\n  \n\n\n  \n  <v-row justify="center">\n  <v-dialog v-model="dialog" scrollable max-width="700px">\n\n  <v-card>\n  <v-card-title>Image</v-card-title>\n  <v-divider></v-divider>\n  <v-card-text style="height: 400px;">\n  \n  <v-row align="center" justify="center">\n  <v-img\n  :src="dialog_photo"\n  class="grey lighten-2"\n  max-width="600"\n\n  aspect-ratio="1"\n  ></v-img>\n  </v-row>\n\n  </v-card-text>\n  <v-divider></v-divider>\n  <v-card-actions class="mb-5">\n  \n  <v-container>\n  <v-row class="ml-3">\n  \n  <p class="red--text"> <b>{{ photo_delete_status }} </b></p>\n  </v-row>\n  <v-row>\n  <v-col xs="12">\n  <v-btn :disabled="button_disabled" @click="deletePhoto()" large :loading=\'loading\' color="error"  >Delete</v-btn>\n  <v-btn large color="primary"  @click="dialog = false">Close</v-btn>\n  </v-col>\n  </v-row>\n </v-container>\n\n\n  </v-card-actions>\n  </v-card>\n  </v-dialog>\n  </v-row>\n\n\n\n\n\n\n\n\n\n\n\n\n\n  </div>\n\n  ';Vue.component("gallery",{template:gallery,data:()=>({dialogm1:"",dialog:!1,dialog_photo:"",dialog_photo_baseName:"",recent_photo:"",old_photo:"",group_photo:[],recent_photos:"assets/img/uploads/recent_photos/",old_photos:"assets/img/uploads/old_photos/",group_photos:"assets/img/uploads/group_photos/",uploads:"assets/img/uploads/",loading:!1,photo_delete_status:"",button_disabled:!1}),methods:{zoom_in(t,o){this.button_disabled=!1,this.photo_delete_status="",this.dialog_photo_baseName=o,this.dialog_photo=t,this.dialog=!0},deletePhoto(){this.loading=!0,axios.post(this.model.modelGallery,{purpose:"deletePhoto",basename:this.dialog_photo_baseName}).then(function(t){this.loading=!1,this.recent_photo=t.data.recent_photo,this.old_photo=t.data.old_photo,this.group_photo=t.data.group_photo,this.photo_delete_status="Your photo has been deleted",this.button_disabled=!0}.bind(this)).catch(function(t){this.loading=!1}.bind(this))}},created(){axios.post(this.model.modelGallery,{purpose:"getPhotos"}).then(function(t){this.recent_photo=t.data.recent_photo,this.old_photo=t.data.old_photo,this.group_photo=t.data.group_photo}.bind(this)).catch(function(t){}.bind(this))}});gallery=new Vue({el:"#app",vuetify:new Vuetify});









</script>

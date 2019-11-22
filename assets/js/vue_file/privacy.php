<script>
	var code = `
	<v-container>
  <v-row  justify="center">
  <v-col lg="8" class="text-center success white--text" >
  <h1>
  Privacy
  </h1>
  </v-col>
  </v-row>


  <v-row justify="center" >
  <v-col lg="8" >
  <v-simple-table>
  <template v-slot:default>
  <thead>
  <tr>
  <th class="text-left title">Name</th>
  <th class="text-left title">Privacy</th>
  </tr>
  </thead>
  <tbody>
  <tr v-for="(item , index) in users_info">
  <td class="body-1">{{ item[0] }} <br> {{ item[1] }}</td>
  <td>


  <v-radio-group :disabled='item[0] == "institution_id" || item[0]=="membership_number" || item[0]=="full_name"' @change="updatePrivacy(index)" v-model="item[2] ">
  <v-radio
  label="private"
  value="private"
  ></v-radio>
  <v-radio
  label="public"
  value="public"
  ></v-radio>
  </v-radio-group>

  </td>
  </tr>
  </tbody>
  </template>
  </v-simple-table>
  </v-col >
  </v-row>
  </v-container>`;


  Vue.component('privacy' , {
    template: code,
    data(){
     return{
      users_info: [],
      radioGroup: [],
      disabled: false,
    }
  },
  methods: {
    updatePrivacy(index){
      //alert('upadate privacy');

      console.log(this.users_info[index][2]);

      axios.post( this.model.modelPrivacy ,
      {
        users_info: this.users_info,
        purpose: 'updatePrivacy',
      }
      ).then(function(response){
        //this.users_info = response.data;
        console.log(response);
        
      }.bind(this))
      .catch(function(error){

        console.log(error);
      }.bind(this));




      //console.log();
    }


  },
  created(){
    axios.post( this.model.modelPrivacy ,
    {
      purpose: 'getPrivacy',
    },
    { 


    }
    ).then(function(response){
      this.users_info = response.data;
      console.log(response);
    }.bind(this))
    .catch(function(error){

      console.log(error);
    }.bind(this));




  },
  updated(){
    console.log('updated');
  }
})





  var login = new Vue({
    el: '#app' ,
    vuetify: new Vuetify(), 
  })










</script>
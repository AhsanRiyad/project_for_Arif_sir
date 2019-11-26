<script>
	var privacy = `
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
  <td class="body-1"> {{ takeName(item[0])  }} <br> {{ item[1] }}</td>
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






Vue.component("privacy",{template:privacy,data:()=>({users_info:[],radioGroup:[],disabled:!1}),methods:{updatePrivacy(e){axios.post(this.model.modelPrivacy,{users_info:this.users_info,purpose:"updatePrivacy"}).then(function(e){}.bind(this)).catch(function(e){}.bind(this))},takeName:e=>"full_name"==e?"Full Name":"email"==e?"Email":"mobile"==e?"Mobile":"institution_id"==e?"Institution ID":"nid_or_passport"==e?"NID/Passport":"fathers_name"==e?"Father's Name":"mother_name"==e?"Mother's Name":"spouse_name"==e?"Spouse's Name":"number_of_children"==e?"Number Of Children":"profession"==e?"Profession":"designation"==e?"Designation":"blood_group"==e?"Blood Group":"date_of_birth"==e?"Date Of Birth":"present_line1"==e?"Present Adress Line1":"present_post_code"==e?"Present Post Code":"present_district"==e?"Present District":"parmanent_country"==e?"Present Country":"parmanent_line1"==e?"Permanent Adress Line1":"parmanent_post_code"==e?"Permanent Post Code":"parmanent_district"==e?"Permanent District":"parmanent_country"==e?"Permanent Country":"membership_number"==e?"Member ship Number":"type"==e?"User Type":"status"==e?"Verfication Status":"registration_date"==e?"Account Created at":"institution"==e?"Workplace/Institution":"email_verification_status"==e?"Email Verification Status":"change_request"==e?"Information Update Request":void 0},coumputed:{},created(){axios.post(this.model.modelPrivacy,{purpose:"getPrivacy"},{}).then(function(e){this.users_info=e.data}.bind(this)).catch(function(e){}.bind(this))},updated(){}});var login=new Vue({el:"#app",vuetify:new Vuetify});








</script>
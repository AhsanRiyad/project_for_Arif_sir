<script>

	var admin_options = `

	<v-container>
	<v-row justify="center" >
	
	<v-col cols="10" xl="7" class="green white--text text-center">
	<h1 > Select Option From Below Table </h1>
	</v-col>


	<v-col cols="12">
	</v-col>


	<v-col cols="10" xl="7" >

	<v-simple-table>
	<template v-slot:default>
	<thead>
	<tr class="blue ">
	<th class="text-left white--text headline py-5">Name</th>
	<th class="text-left white--text headline py-5">Options</th>
	</tr>
	</thead>
	<tbody>
	<tr class="text-left white--black ">
	<td class="title py-5">Change Label of Institution ID</td>
	<td class="title py-5">

	
	
	<v-select @change="change_label()"

	v-model ="institution_id_label"
	:items="items"
	label="Institution Id"
	></v-select>
	
	</td>
	</tr>
	</tbody>
	</template>
	</v-simple-table>


	</v-col>


	</v-row>





	<v-row justify="center">
    

    <v-dialog
      v-model="dialog"
      max-width="290"
    >
      <v-card>
        <v-card-title class="headline">Status</v-card-title>

        <v-card-text class="black--text">
         {{ dialog_text }}
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          
          <v-btn
            color="green darken-1"
            text
            @click="dialog = false"
          >
            OK
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>






	</v-container>

	`;




	Vue.component('admin_options' , {
		template: admin_options, 
		data(){
			return {
				items: ['Institution ID' ,'School ID' , 'College ID' , 'School Roll' , 'College Roll' , 'University Roll'],
				institution_id_label: '',
				dialog : false,
				dialog_text: '',

			}
		},
		methods:{
			change_label(){

				axios.post( this.model.modeladmin_options ,
				{
					purpose: 'change_institution_id_label',
					institution_id_label: this.institution_id_label,

				}
				).then(function(response){

				
					if(response.data == 'success'){
						this.dialog_text = 'Label Changed Successfully';
						this.dialog = true;

					}else{
						this.dialog_text = 'Server Problem';
						this.dialog = true;

					}
				}.bind(this))
				.catch(function(error){

    			}.bind(this));


			}


		},
		beforeCreate(){
		},
		created(){
			this.institution_id_label = this.institution_id_label__;

		},
		beforeMount(){
		},
		mounted(){
		},
		beforeUpdated(){
		},
		updated(){
		}
	})
	var registration_page = new Vue({
		el: '#app' , 
		vuetify: new Vuetify(),
		data : {} , 
		methods : {},
		beforeCreate(){
		},
		created(){
		},
		beforeMount(){
		},
		mounted(){
		},
		beforeUpdated(){
		},
		updated(){
		}
	})
</script>
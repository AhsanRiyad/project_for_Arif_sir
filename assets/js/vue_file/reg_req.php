<script>



	var modal_user_details =  `
	<v-row justify="center">
	<v-dialog v-model="dialog" scrollable max-width="400px">
	<template v-slot:activator="{ on }">
	<v-btn color="primary" dark v-on="on">Details</v-btn>
	</template>
	<v-card>
	<v-card-title>User Details</v-card-title>
	<v-divider></v-divider>
	<v-card-text style="height: 300px;" class="black--text">
	<v-container>
	<v-row>


	<v-col cols="12">
	<v-row align="center" justify="center">
	<v-img
	:src="user_details.recent_photo"
	aspect-ratio="1"
	class="grey lighten-2"
	max-width="200"
	max-height="150"
	></v-img>
	</v-row>
	</v-col>


	<v-col cols="6">
	<p>Full Name</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.full_name }} </p>
	</v-col>

	<v-col cols="6">
	<p>Email</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.email }} </p>
	</v-col>

	<v-col cols="6">
	<p>Mobile</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.mobile }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>institution_id</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.institution_id }} </p>
	</v-col>


	<v-col cols="6">
	<p>nid_or_passport</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.nid_or_passport }} </p>
	</v-col>

	<v-col cols="6">
	<p>fathers_name</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.fathers_name }} </p>
	</v-col>

	<v-col cols="6">
	<p>mother_name</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.mother_name }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>spouse_name</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.spouse_name }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>number_of_children</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.number_of_children }} </p>
	</v-col>

	<v-col cols="6">
	<p>profession</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.profession }} </p>
	</v-col>

	<v-col cols="6">
	<p>institution</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.institution }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>designation</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.designation }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>blood_group</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.blood_group }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>date_of_birth</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.date_of_birth }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>present_line1</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.present_line1 }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>present_district</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.present_district }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>present_post_code</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.present_post_code }} </p>
	</v-col>


		
	<v-col cols="6">
	<p>present_country</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.present_country }} </p>
	</v-col>


		
	<v-col cols="6">
	<p>parmanent_line1</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.parmanent_line1 }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>parmanent_district</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.parmanent_district }} </p>
	</v-col>


	
	<v-col cols="6">
	<p>parmanent_post_code</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.parmanent_post_code }} </p>
	</v-col>


		
	<v-col cols="6">
	<p>parmanent_country</p>
	</v-col>
	<v-col  cols="6" >
	<p> {{ user_details.parmanent_country }} </p>
	</v-col>


	
	
	</v-row>
	</v-container>
	</v-card-text>
	
	<v-divider></v-divider>
	<v-card-actions>
	<v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>
	`;


/*<tr v-for="item in desserts" :key="item.name">
	<td>{{ item.name }}</td>
	<td>{{ item.calories }}</td>
	</tr>*/


	Vue.component('component_user_datails', {
		props: ['email'] , 
		template: modal_user_details ,
		data(){
			return {
				dialogm1: '',
				dialog: false,
				user_details: {},
			}
		},
		mounted(){

			axios.post( this.model.modelProfile_update ,
			{
				purpose: 'getProfileBasicInfo',
				
			}
			).then(function(response){
				
				//console.log(response);
				this.user_details = response.data;

				if(response.data.recent_photo == 'not_set'){
					this.user_details.recent_photo = rootAdress+'assets/img/uploads/default.jpg';
				}else{
					this.user_details.recent_photo = this.rootAdress+'assets/img/uploads/recent_photos/'+response.data.recent_photo;
					//alert(this.user_details.recent_photo);
				}

				console.log(this.user_details);


			}.bind(this))
			.catch(function(error){

				

        //console.log(error);
    }.bind(this));
		}
	}
	);


	var code = `
	<div class="row">
	<p id="user_id" hidden ></p>
	<div class="col-lg-8 col-7 offset-1 mt-4">
	<div class="row  text-center bg-info">
	<div class="col text-center bg-info">
	<h2 class="text-white py-2 ">New Account Request</h2>
	</div>
	</div>
	<div class="row">
	<table class="table" >
	<thead  class="thead-dark" >
	<tr >
	<th>id</th>
	<th>Req Date</th>
	<th>Req From</th>
	<th>Details</th>
	<th>Accept</th>
	<th>Reject</th>
	</tr>
	</thead>
	<tbody v-if="array_size" id="tbody" v-for="user in user_list">
	<tr>
	<td> {{ user.id }} </td>
	<td> {{ user.registration_date }} </td>
	<td> {{ user.full_name }} </td>
	<td><component_user_datails v-bind:email="user.email"></component_user_datails></td>
	<td><button @click="approve_id(user.email)" class="btn btn-success">Accept</button></td>
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
	

	<template>
	<v-row justify="center"> 
	</v-btn>
	<v-dialog
	v-model="dialog"
	max-width="290"
	>
	<v-card>
	<v-card-title class="headline">Action Status</v-card-title>

	<v-card-text>
	{{ admin_approval_status }}
	</v-card-text>

	<v-card-actions>
	<v-spacer></v-spacer>

	<v-btn
	color="green darken-1"
	text
	@click="dialog = false"
	>OK
	</v-btn>


	</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>
	</template>

	</div>
	`;


	Vue.component('reg_req', {
		template: code , 
		data(){
			return { user_list : [] , dialog: false, admin_approval_status: '',
			array_size: true  }
		}, 
		methods: {
			changeName: function(){

			},
			get_users : function(){
				//alert('get_data_method');

				this.$http.post('<?php echo $modelReg_req; ?>', {
					purpose : 'get_data'
				} ).then(function(response){
					console.log(response);


				// console.log(JSON.parse(response.data));

				console.log(response.data);

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


			})
			},
			approve_id: function(email){
				//console.log(email);

				this.$http.post('<?php echo $modelReg_req; ?>', {
					purpose : 'approve_user', 
					email: email
				} ).then(function(data){
				//var obj = JSON.parse(data);
				// console.log(obj);
				//this.user_list = JSON.parse(data.bodyText);
				//alert(data);
				//console.log(obj[0].status);
				console.log(data);
				
				this.admin_approval_status = 'User is approved';
				this.get_users();
				this.dialog = true;
				//console.log(obj.length);


			})

			},
			reject_id: function(email){
				//console.log(email);

				this.$http.post('<?php echo $modelReg_req; ?>', {
					purpose : 'reject_user', 
					email: email
				} ).then(function(data){
				//var obj = JSON.parse(data);
				// console.log(obj);
				//this.user_list = JSON.parse(data.bodyText);
				//alert(data);
				//console.log(obj[0].status);
				console.log(data);
				this.admin_approval_status = 'User is rejected';
				this.dialog = true;
				this.get_users();

				//console.log(obj.length);


			})


			}
		},
		beforeCreate(){
			

			axios.post('<?php echo $modelReg_req; ?>', {
				purpose : 'get_data'
			})
			.then(function (response) {
				console.log(response);


				// console.log(JSON.parse(response.data));

				console.log(response.data.length);

				if(response.data.length == 1){
					this.user_list = []; 
					this.user_list[0] =  JSON.parse(response.data);
					console.log(this.user_list[0]);
				}else if(response.data.length > 1){
					this.user_list =  response.data;
					console.log(this.user_list[0].email);
				}


			}.bind(this))
			.catch(function (error) {
				console.log(error);
			});



		},
		mounted(){
			//alert('the page is mounted');
		}
	}
	);



	var reg_req = new Vue({
		el: '#reg_req' ,
		vuetify: new Vuetify(), 
		data : {
			name: 'riyad---vue',
			name_result: '' , 
			first_name_color : 'green'
		} , 
		methods : {
			

		},
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

			var dashboard_height = $('#dashboard_height').height();
			var windowHeight = $(document).height();
			console.log(dashboard_height);
			if(dashboard_height<windowHeight){

				$('.dashboard_vertical_menu_height').height('100vh');
			}else{
				var ht = dashboard_height+'px';
				$('.dashboard_vertical_menu_height').height(ht);
			}

		}
	})
</script>
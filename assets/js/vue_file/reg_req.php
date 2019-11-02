<script>



	var modal_user_details =  `
	<v-row justify="center">
	<v-dialog v-model="dialog" scrollable max-width="450px">
	<template v-slot:activator="{ on }">
	<v-btn color="primary" dark v-on="on">Open Dialog</v-btn>
	</template>
	<v-card>
	<v-card-title>User Details {{ id }}</v-card-title>
	<v-divider></v-divider>
	<v-simple-table>
	<template v-slot:default>
	<thead>
	<tr>
	<th class="text-left">Name</th>
	<th class="text-left">Info</th>
	</tr>
	</thead>
	<tbody>
	
	</tbody>
	</template>
	</v-simple-table>
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
		props: ['id'] , 
		template: modal_user_details ,
		data(){
			return {
				dialogm1: '',
				dialog: false,
				user_details: ''
			}
		},
		mounted(){
			this.$http.post('<?php echo $modelReg_req; ?>', {
				purpose : 'get_user_details',
				id : this.id 
			} ).then(function(data){
				//var obj = JSON.parse(data);
				// console.log(obj);
				//this.user_details = JSON.parse(data.bodyText);
				//alert(data);
				//console.log(obj[0].status);
				//console.log(this.user_details);
				//console.log(obj.length);
				console.log(data);


			})
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
	<tbody id="tbody" v-for="user in user_list">
	<tr>
	<td> {{ user.id }} </td>
	<td> {{ user.registration_date }} </td>
	<td> {{ user.last_name }} </td>
	<td><component_user_datails v-bind:id="user.id"></component_user_datails></td>
	<td><button @click="approve_id(user.id)" class="btn btn-success">Accept</button></td>
	<td><button @click="reject_id(user.id)" class="btn btn-danger">Reject</button></td>
	</tr>
	</tbody>
	</table>
	</div>
	</div>
	<div id="dialog" title="Shipment Dtails">
	</div> </div>`;


	Vue.component('reg_req', {
		template: code , 
		data(){
			return { user_list : ''  }
		}, 
		methods: {
			changeName: function(){

			},
			get_users : function(){
				this.$http.post('<?php echo $modelReg_req; ?>', {
					purpose : 'get_data'
				} ).then(function(data){
				//var obj = JSON.parse(data);
				// console.log(obj);
				this.user_list = JSON.parse(data.bodyText);
				//alert(data);
				//console.log(obj[0].status);
				console.log(this.user_list);
				//console.log(obj.length);


			})
			},
			approve_id: function(id){
				console.log(id);
			},
			reject_id: function(id){
				console.log(id);

				this.$http.post('<?php echo $modelReg_req; ?>', {
					purpose : 'reject_user', 
					id: id
				} ).then(function(data){
				//var obj = JSON.parse(data);
				// console.log(obj);
				//this.user_list = JSON.parse(data.bodyText);
				//alert(data);
				//console.log(obj[0].status);
				console.log(data);
				this.get_users();
				//console.log(obj.length);


			})


			}
		},
		beforeCreate(){
			this.$http.post('<?php echo $modelReg_req; ?>', {
				purpose : 'get_data'
			} ).then(function(data){
				//var obj = JSON.parse(data);
				// console.log(obj);
				this.user_list = JSON.parse(data.bodyText);
				//alert(data);
				//console.log(obj[0].status);
				console.log(this.user_list);
				//console.log(obj.length);


			})
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
			var dashboard_height = $('#dashboard_height').height();
			var windowHeight = $(document).height();
			console.log(dashboard_height);
			if(dashboard_height<windowHeight){

				$('.dashboard_vertical_menu_height').height('100vh');
			}else{
				var ht = dashboard_height+'px';
				$('.dashboard_vertical_menu_height').height(ht);
			}
		},
		beforeUpdated(){

		},
		updated(){

		}
	})
</script>
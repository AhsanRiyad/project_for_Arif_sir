<script>


	var code = `
	<div class="row">
	<p id="user_id" hidden ></p>


	<div class="col-lg-8 col-7 offset-1 mt-4">



	<div class="row  text-center bg-info">


	<div class="col text-center bg-info">

	<h2 class="  text-white py-2 ">New Account Request</h2>

	</div>
	</div>

	<div class="row">

	<table class="table">
	<thead  class="thead-dark">
	<tr>
	<th>id</th>
	<th>Req Date</th>
	<th>Req From</th>
	<th>Details</th>
	<th>Accept</th>
	<th>Reject</th>

	</tr>
	</thead>
	<tbody id="tbody">


	<tr>
	<td> $reqs->id </td>
	<td> $reqs->req_date </td>
	<td> $reqs->last_name </td>

	<td><button onclick="ship_details(' $reqs->id ')" class="btn btn-success">Details</button></td>
	<td><button onclick="ship_accept(' $reqs->id ')" class="btn btn-success">Accept</button></td>
	<td><button onclick="ship_reject(' $reqs->id ')" class="btn btn-danger">Reject</button></td>
	</tr>



	</tbody>

	</table>


	</div>
	</div>



	<div id="dialog" title="Shipment Dtails">
	</div> </div>` ;











	Vue.component('reg_req', {
		template: code , 
		data(){
			return {}
		}, 
		methods: {
			changeName: function(){

			}
		},
		beforeCreate(){
			this.$http.post('<?php echo $modelReg_req; ?>', {
				title: 'rfaef',
				body: 'raefaref',
				userId: 1
			}).then(function(data){
				console.log(data);
				alert(data);
			})
		},
		mounted(){
			alert('the page is mounted');
		}
	}
	);



	var reg_req = new Vue({
		el: '#reg_req' , 
		data : {
			name: 'riyad---vue',
			name_result: '' , 
			first_name_color : 'green'
		} , 
		methods : {
			

		},
		beforeCreate(){
			
		},
		mounted(){
			
		},
	})













</script>
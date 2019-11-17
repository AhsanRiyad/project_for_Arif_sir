<?php 
$pageName = 'search';
include "../address.php"; 
include $linkerCss;
?>
<?php 
include $dashboard_head;
?>


<div id="search">
	<v-app>
		<!-- <search></search> -->
		<div class="container">
			<div class="row justify-content-center">
				
				<div class="col-md-7 text-center bg-info ">
					<h2 class="text-white py-2 ">Search</h2>
				</div>
				
				<div class="w-100"></div>
				<div class="col-md-5">	
					<div>
						<p>Search</p>
						<v-text-field
						v-model="search_text"
						label="search"
						@keyup="search()"
						required
						></v-text-field>
					</div>
				</div>


				<div class="col-md-2">	

					<p>Categories</p>
					<v-select
					v-model="category"
					:items="category_items"
					label="Select"
					value="true"
					required
					></v-select>
					
				</div>

			</div>


			
			<div class="row justify-content-center">
				<div class="col-md-7   mt-4">
					<div class="row  text-center bg-info">
						<div class="col text-center bg-success">
							<h2 class="text-white py-2 ">Search Results</h2>
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
									<td></td>
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


			</div>



		</div>



	</v-app>
</div>





<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>
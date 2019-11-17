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
		</div>
		


	</v-app>
</div>





<?php 
include $dashboard_foot ;
?>

<?php 
include $linkerJs;
?>
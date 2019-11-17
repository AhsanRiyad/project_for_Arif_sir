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
						<v-combobox
						search-input="search_value"
						:items="components"
						label="Select a favorite activity or create a new one"
						@keyup="putData()"
						></v-combobox>
					</div>
				</div>


				<div class="col-md-2">	

					<p>Categories</p>
					<v-overflow-btn
					class="my-2"
					:items="dropdown_font"
					label="Select Category"
					target="#dropdown-example"
					value=""
					></v-overflow-btn>
					
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
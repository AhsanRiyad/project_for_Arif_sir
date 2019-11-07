<?php 
$pageName = 'profile';
include "../address.php"; 
include $linkerCss;
?>
<?php 
include $dashboard_head;
?>


<div  id="app">	
	<v-app>
		<div class="container-fluid bg-light mt-5 ">
	<div class="row justify-content-center align-items-center">
			
			<!-- update top part starts-->
			
			<div class="  col-4  px-0 py-1" style="box-shadow: 0 0 10px lightgrey; ">

				
				<div class="row bg-white mx-1">

					<div class="col-3 mr-0 pr-0 my-2">
						<img class="rounded img-thumbnail img-fluid" src=> alt="">
						<div class="w-100"></div>
						
						
						


					</div>
					<div class="col-9  ml-0">
						<p class="h3 ">
							

						</p>
						<p class="h4 ">System Adminstrator at <span class="font-weight-bold">Umart</span></p>
					</div>

					


				</div>

				<!-- update top part ends-->


				<!-- update field part starts -->
				<div class="row bg-white mt-4 justify-content-center mx-1">
					<div class="w-100 bg-info">
						<p class="h3 text-white pl-4 pt-2"> <i class="fas fa-info-circle mr-0"></i> About</p>
					</div>

					<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
						<small id='idSmallEmailChangeDashboard'  class="" v-bind:style=' smallText' > <span>Name</span> <span @click="enable_input('full_name')" id="idSpanEmailChangeDashboard" v-bind:style="smallChange" class="small_button">Change</span></small>

						<input :disabled='full_name_input == true' id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here" type="text" value="" >

					</div>

					<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
						<small id='idSmallEmailChangeDashboard'  class="blue--text"> <span>Mobile</span> <span @click="enable_input()"  id="idSpanEmailChangeDashboard" class="small_button blue">Change</span></small>

						<input id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here"  type="text" value="" >

					</div>


					<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
						<small id='idSmallEmailChangeDashboard'  class="blue--text"> <span>Institution_id</span> <span @click="enable_input()"  id="idSpanEmailChangeDashboard" class="small_button blue">Change</span></small>

						<input id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here"  type="text" value="" >

					</div>


					<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0"> 
						<small id='idSmallEmailChangeDashboard'  class="blue--text"> <span>nid/passport</span> <span  @click="enable_input()" id="idSpanEmailChangeDashboard" class="small_button blue">Change</span></small>

						<input id="idInputEmailUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 mr-0 pl-2" placeholder="Type Your Name Here"  type="text" value="" >

					</div>


					<div class="col-10 mt-3 border border-right-0 border-top-0 border-left-0 pl-0 pr-0 mb-3"> 
						<small class="blue--text"><span>Enter new DOB or Keep it same</span> <span @click="enable_input()" id="changeDOBSpan" class="small_button blue">Change</span></small>

						<input  id="idInputDobUpdateProfileDashboard" class="d-block border-0 w-100 pb-1 pl-2 mr-0" placeholder="20-12-1996"  type="date" value="" >

					</div>


					<div class="col-10 mx-0 px-0 ">
						<button id="idButtonUpdateProfileDashboard" class="btn btn-danger btn-block mb-3 mx-0 rounded-0">
							Update Info
						</button>
					</div>
					
					<!-- update field part ends -->

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

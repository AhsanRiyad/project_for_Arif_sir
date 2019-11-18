<?php 
$pageName = 'profile';
include "../address.php"; 
include $db; 
include $session_info;

include $linkerCss;
?>


<div  id="app">	


		<?php 
		include $dashboard_head;
		?>

	<v-app>
		
		<!-- <template v-if="componet_name == 'basic'">
		<basic></basic>
		</template> 
		<template v-else-if="componet_name == 'personal'">
		<personal></personal>
		</template>
		<template v-else-if="componet_name == 'professional'">
		<basic></basic>
		</template>
		<template v-else-if="componet_name == 'address'">
		<basic></basic>
	</template> -->
	

	<!-- <component v-bind:is="componet_name"> -->
		
		<alert></alert>

		<keep-alive>
			<component   :profile_photo='profile_photo' v-bind:is="componet_name"></component>
		</keep-alive>
		<buttons ></buttons>
		



	</v-app>
		<?php 
		include $dashboard_foot ;
		?>


</div>


<?php 
include $linkerJs;
?>

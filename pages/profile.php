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
			<keep-alive>
			<component :csrf_token1='csrf_token1' :recent_photo='recent_photo' v-bind:is="componet_name"></component>
			</keep-alive>
		
			<buttons :componet_name='componet_name'></buttons>


	</v-app>
</div>



<?php 
include $dashboard_foot ;
?>
<?php 
include $linkerJs;
?>

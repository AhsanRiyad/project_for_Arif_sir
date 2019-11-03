<?php 
$pageName = 'vue_test';
//$APP_ROOT = "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/";
//include $APP_ROOT."assets\linker\linkerCss.php" ; 
include "../address.php"; 
include $linkerCss;
?>

<div id="app">
	<file_upload></file_upload>
</div>


<?php 
  // include $APP_ROOT."assets/linker/linkerJs.php" ; 
include $linkerJs;


?>


<script>
	var code = `<div class="container">
	<div class="large-12 medium-12 small-12 cell">
	<label>File
	<input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
	</label>
	<button class="btn btn-success" v-on:click="submitFile()">Submit</button>
	</div>
	</div>`;


	Vue.component('file_upload' , {
		template: code , 
		data(){
			return {
				name_riyad: 'riyad' , 
				file: '' ,
			}
		},
		methods: {
			submitFile: function(){
				let formData = new FormData();
				formData.append('file', this.file);

				//console.log(this.file.size/1024/1024);

				axios.post( '/single-file',
					formData,
					{
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}
					).then(function(){
						console.log('SUCCESS!!');
					})
					.catch(function(){
						console.log('FAILURE!!');
					});



				},
				handleFileUpload: function(){
					this.file = this.$refs.file.files[0];
				}
			}
		})







	var registration_page = new Vue({
		el: '#app' , 
		data : {
			name: 'riyad---vue',
			
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
			
		}
	})




</script>

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

<style>
	input[type="file"]{
		position: absolute;
		top: -500px;
	}

	div.file-listing{
		width: 200px;
	}

	span.remove-file{
		color: red;
		cursor: pointer;
		float: right;
	}
</style>
<script>
	var code = `<div class="container">
	<div class="large-12 medium-12 small-12 cell">
	<label>Files
	<input type="file" id="files" ref="files" multiple v-on:change="handleFilesUpload()"/>
	</label>
	</div>
	<div class="large-12 medium-12 small-12 cell">
	<div v-for="(file, key) in files" class="file-listing">{{ file.name }} <span class="remove-file" v-on:click="removeFile( key )">Remove</span></div>
	</div>
	<br>
	<div class="large-12 medium-12 small-12 cell">
	<button v-on:click="addFiles()">Add Files</button>
	</div>
	<br>
	<div class="large-12 medium-12 small-12 cell">
	<button v-on:click="submitFiles()">Submit</button>
	</div>
	</div>`;


	Vue.component('file_upload' , {
		template: code , 
		data(){
      return {
        files: []
      }
    },

    /*
      Defines the method used by the component
    */
    methods: {
      /*
        Adds a file
      */
      addFiles(){
        this.$refs.files.click();
      },

      /*
        Submits files to the server
      */
      submitFiles(){
        /*
          Initialize the form data
        */
        let formData = new FormData();

        /*
          Iteate over any file sent over appending the files
          to the form data.
        */
        for( var i = 0; i < this.files.length; i++ ){
          let file = this.files[i];

          formData.append('files[' + i + ']', file);
        }

        /*
          Make the request to the POST /select-files URL
        */
        axios.post( '/select-files',
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

      /*
        Handles the uploading of files
      */
      handleFilesUpload(){
        let uploadedFiles = this.$refs.files.files;

        /*
          Adds the uploaded file to the files array
        */
        for( var i = 0; i < uploadedFiles.length; i++ ){
          this.files.push( uploadedFiles[i] );
        }
      },

      /*
        Removes a select file the user has uploaded
      */
      removeFile( key ){
        this.files.splice( key, 1 );
      }
    }
	});







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

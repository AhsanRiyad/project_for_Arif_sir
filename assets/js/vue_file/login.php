<script>
	// This is a global mixin, it is applied to every vue instance
	
	   Vue.mixin({
        data: function() {
            return {
                csrf_token1: '<?php echo $_SESSION['csrf_token1'] = bin2hex(random_bytes(32)); ?>',

            }
        }
    })



	




	var code = `


	<div class="container-fluid">
	<div class="row justify-content-xl-center justify-content-md-center _background ">
	<div class="col-12 col-md-5 col-xl-6 align-self-md-center ">
	<div class="container margin_">
	<div class="row py-4 ">


	<p class="text-dark h4" id="login_id">
	Welcome Back! Please login 
	<br>

	<span class="text-danger">
	{{ login_status }}
	</span>
	</p>
	</div>

	<div class="row justify-content-xl-center bg-white py-5 mb-5">

	<div class="col-12 col-xl-6 ">

	<div class="form-group">
	<label for="exampleInputEmail1" ><small id="idExampleInputEmail1Small">Email address*</small>
	<br>



	</label>
	<input name='email' v-model='email' type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"
	value=""
	>
	</div>
	<div class="form-group">
	<label for="exampleInputPassword1"><small>Password*</small>
	<br>



	</label>
	<input @keyup.enter="submit()" name="password" v-model='password' type="password" class="form-control rounded-0" id="exampleInputPassword1" placeholder="Password"
	value=""

	>
	<p class="text-right text-danger">
	<small><a v-bind:href="address.forgotPage">Forgot password?</a></small>
	</p>
	</div>

	</div>
	<div class="col-12 col-xl-5 align-self-xl-center">
	<v-btn tile block :loading="loading" color="success" @click="submit()" class="">Log In</v-btn>

	<p class="text-danger h5 mt-2"><i>Not a member yet?</i></p>

	<a v-bind:href="address.registationPage"><button type="button" class="btn btn-primary rounded-0 w-100 py-2">Register Here</button></a>

	</div>


	</div>
	</div>
	</div>
	</div>
	</div>`;
	

	Vue.component('login' , {
		template: code,
		data(){
			return{
				loading: false,
				email: '',
				password: '',
				login_status: '',
			}
		},
		methods: {
			submit: function(){
				//alert('submit clicked');
				this.loading = true;
				axios.post( this.model.modelLogin , {
					email: this.email,  
					password: this.password,
					csrf_token1: this.csrf_token1,

				})
				.then( function(response){
					this.loading = false;
					//window.location.href = 'http://google.com';
					response.data == 'YES' ? window.location.href = this.address.profilePage : this.login_status = 'email/password doesnt match';  

					console.log(response);	
				}.bind(this))
				.catch(function (error) {
					console.log(error);
					this.loading = false;
                //return 'hi';
            }.bind(this)); 
			}

		},
		created(){

		},
		updated(){

		}
	})









	var login = new Vue({
		el: '#login' ,
		vuetify: new Vuetify(), 
		data : {
			
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
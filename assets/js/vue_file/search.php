<script>
	
	var code = `
	<div>
	<v-autocomplete
	label="Components"
	:items="components"
	></v-autocomplete>
	</div>
	`;
	

	Vue.component('search' , {
		template: code,
		data(){
			return {
				components: [
				'Autocompletes', 'Comboboxes', 'Forms', 'Inputs', 'Overflow Buttons', 'Selects', 'Selection Controls', 'Sliders', 'Textareas', 'Text Fields',
				],
			}
		},
		methods: {

		},
		created(){

		}
	})




	var search = new Vue({
		el:'#search',
		vuetify:new Vuetify(),
		data:{
			category: 'full_name',
			category_items: [
			'full_name',
			'institution_id',
			'membership_number',
			'permanent_district',
			],
			search_text: '',
			user_list : [] , 
			array_size: true 



		},
		methods:{
			search(){
				//console.log(this.search_text);
				//console.log(this.category);

				axios.post( this.model.modelSearch ,
				{
					purpose: this.category ,
					search_text: this.search_text,

				}
				).then(function(response){
    
        		console.log(response);

        		if(response.data.length == 1){
					this.user_list = []; 
					this.user_list[0] =  JSON.parse(response.data);
					console.log(this.user_list[0]);
				}else if(response.data.length > 1){
					this.user_list =  response.data;
					console.log(this.user_list[0].email);
				}else if(response.data == 0){
					this.user_list =  [];
				}
        
    			}.bind(this))
				.catch(function(error){

					console.log(error);
				}.bind(this));


			}
		}
	})
</script>
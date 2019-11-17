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



		},
		methods:{
			search(){
				//console.log(this.search_text);
				//console.log(this.category);

				axios.post( this.model.modelSearch ,
				{
					purpose: 'search_by_full_name',
					search_text: this.search_text,
				}
				).then(function(response){
    
        		console.log(response);
        
    			}.bind(this))
				.catch(function(error){

					console.log(error);
				}.bind(this));


			}
		}
	})
</script>
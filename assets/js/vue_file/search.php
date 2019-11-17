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
			components: [
				'Autocompletes', 'Comboboxes', 'Forms', 'Inputs', 'Overflow Buttons', 'Selects', 'Selection Controls', 'Sliders', 'Textareas', 'Text Fields',
				],

				dropdown_font: ['name', 'membership_number', 'institution_id', 'permanent_district'],

				search_value: '',


		},
		methods:{
			putData(){
				console.log(this.search_value);
			}
		}
	})
</script>
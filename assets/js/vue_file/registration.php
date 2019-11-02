<script>

// registration page
// dob datepicker  
$( function() {
	$( "#datepicker" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
} );



var registration_page = new Vue({
	el: '#reg_vue' , 
	data : {
		name: 'riyad---vue',
		name_result: '' , 
		first_name_color : 'green'
	} , 
	methods : {
		first_name_change : function(){
			//alert(this.$refs.first_name.value);
			//alert('hi');
			var patt = /(^[A-Za-z\s\.]{3,}$)/g;
			var result = patt.test(this.$refs.first_name.value);
			//var result = true ;
			if(result){
				//alert('name change');
				this.name_result = 'Name is accepeted' ; 
				this.first_name_color = 'green' ; 

			}else{
				//alert('name_result');
				this.name_result = 'Name is not accepeted' ; 

				this.first_name_color = 'red' ; 
				
				
			}




		}
	}
})












</script>
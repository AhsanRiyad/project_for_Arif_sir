<script>

// registration page
// dob datepicker  
$( function() {
	$( "#datepicker" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
} );

/*
$(document).ready(function() {
	$(document).scroll(function() {
		var dashboard_height = $('#dashboard_height').height();
//alert(dashboard_height);
var windowHeight = $(document).height();
if(dashboard_height<windowHeight){
	// $(".dashboard_vertical_menu_height").attr("height", '100vh' );
	$('.dashboard_vertical_menu_height').height('100vh');
	//alert('height');
	//alert(windowHeight);
}else{
	//$(".dashboard_vertical_menu_height").attr("height", dashboard_height );
	var ht = dashboard_height+'px';
	$('.dashboard_vertical_menu_height').height(ht);

	//alert('dashboard');
	//alert('height');

	//$('.dashboard_vertical_menu_height').height(dashboard_height+'px');
	//document.getElementsByClassName('dashboard_vertical_menu_height')[0].style.height = dashboard_height+'px' ;
}
})
});
*/

// vue example
/*var vue_test =  new Vue({
	el: '#vue-app' ,
	data: {
		name: 'riyad' , 
		job : 'student' , 
		website : 'www.facebook.com/riyadahsan6',
		fullTag: '<p> hello this is a complete emement </p>'
	} , 
	methods: {
		greet : function(){
			return 'good morning' ; 
		}, 
		time : function(time1){
			return time1 + ' ' + this.name; 
		}
	}
})

*/


// vuetify example
/*var vuetify_test = new Vue({
	el: '#app',
	vuetify: new Vuetify(),
	data: {
		name: 'Riyad'
	},
	methods: {

		hi: function(){
			alert('hi');
		},
		post: function(){ this.$http.post('http://jsonplaceholder.typicode.com/posts', {
			title: 'rfaef',
			body: 'raefaref',
			userId: 1
		}).then(function(data){
			console.log(data);
			alert(data);
		})
	}
}



})

*/

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
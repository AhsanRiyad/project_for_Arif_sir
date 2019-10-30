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
















new Vue({
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















</script>
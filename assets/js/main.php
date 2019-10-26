<script>

// registration page
// dob datepicker  
$( function() {
	$( "#datepicker" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
} );




var dashboard_height = $('#dashboard_height').height();
//alert(dashboard_height);
var windowHeight = $(document).height();

if(dashboard_height<windowHeight){
	// $(".dashboard_vertical_menu_height").attr("height", '100vh' );
	$('.dashboard_vertical_menu_height').height('100vh');
	//alert(windowHeight);

}else{
	$(".dashboard_vertical_menu_height").attr("height", dashboard_height );
	//alert('dashboard');
}


</script>
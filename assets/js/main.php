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

$("#dashboard_vertical_menu_height").attr("height", dashboard_height );

</script>
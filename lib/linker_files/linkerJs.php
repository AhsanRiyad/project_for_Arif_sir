<?php 
$jsMain = $rootAdress."lib/js/main.js";
$jsJquery = $rootAdress.'lib/js/jquery-3.3.1.slim.min.js';
$jsPopper = $rootAdress.'lib/js/popper.min.js';
$jsBootstrap = $rootAdress.'lib/js/bootstrap.min.js';
?>


<!-- bootstrap js cdn -->
   <!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->

    <!--bootstrap js on server-->
    <script src=<?php echo $jsJquery ?> type="text/javascript"></script> 
    <script src=<?php echo $jsPopper; ?> type="text/javascript"></script>
    <script src=<?php echo $jsBootstrap; ?> type="text/javascript"></script>
    
    
    <!-- font-awesome js cdn -->
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    
    <!--font-awesome on server-->
    <!-- <script src="font-awesome/js/all.js" type="text/javascript"></script> -->
    
    <!-- custome js -->
    <script src=<?php echo $jsMain; ?> ></script>
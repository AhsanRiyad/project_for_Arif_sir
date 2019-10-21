<?php 
$logoSrc = $rootAdress."lib/img/logo_dashboard.png";
?>

<!-- navigation bar and search bar starts -->
  <!-- fixed horizontal -->
  <div class="admin_navbar_horizontal bg-secondary justify-content-center d-flex align-items-center">
    <p class="text-white h3">Good Morning, <?php 
     echo $sArray['lastName'];
      ?></p>
  </div>



  <!-- fixed vertical -->
  <div class=" admin_navbar_veritcal bg-dark ">
    <div class=" bg-light d-flex justify-content-center">
      <a href=<?php echo $dashboardHomeUrl; ?>><img class=" py-1" src=<?php echo $logoSrc; ?> alt=""></a>

    </div>


    

    <a class="text-white" href=<?php echo $dashboardHomeUrl; ?>>
      <div class=" 
        <?php 

          if($pageName=='dashboardHome')
          {
            echo 'bg-info';
          }
          else{
            echo 'bg-secondary';
          }
          ?> 
        
        py-2 text-center my-4">

        <i class="fas w_f fa-tachometer-alt"></i> Dashboard

      </div></a>

      <a class="text-white" href="#">
        <div class=" bg-secondary py-2 text-center my-4">

          <i class="fas w_f fa-chart-line"></i> Statistics

        </div></a>


        <a class="text-light" href=<?php echo $dashboardProfileUrl; ?>>
          <div class="  
          <?php 

          if($pageName=='dashboardProfile' || $pageName=='dashboardProfileUpdate')
          {
            echo 'bg-info';
          }
          else{
            echo 'bg-secondary';
          }
          ?> 
          py-2 text-center my-4">

          <i class="fas w_f fa-user"></i> Profile

        </div></a>
        
        
        <a class="text-light" href=<?php echo $addProductBySellerUrl; ?>>
          <div class="  
          <?php 

          if($pageName=='addProductBySeller')
          {
            echo 'bg-info';
          }
          else{
            echo 'bg-secondary';
          }
          ?> 
          py-2 text-center my-4">

          <i class="fas fa-shopping-cart"></i> Add Product

        </div></a>


        <a class="text-white" href="#">
          <div class="  bg-secondary py-2 text-center my-4">

            <i class="fas w_f fa-envelope"></i> Message Request

          </div></a>


          <a class="text-white" href="#">
            <div class="  bg-secondary py-2 text-center my-4">

              <i class="fab fa-product-hunt"></i> New Product Request

            </div></a>

          <a class="text-white" href=<?php echo $indexUrl; ?>>
          <div class="  bg-success py-2 text-center my-4">

            <i class="fas fa-shopping-cart"></i> Back to Shop Page

          </div></a>

            <a class="text-white" href=<?php echo $loginUrl; ?>>
              <div class="  bg-danger py-2 text-center my-4">

                <i class="fas fa-sign-out-alt"></i>Sign Out

              </div></a>

              




            </div>

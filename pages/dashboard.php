<?php 
$pageName = 'dashboard';
$APP_ROOT = "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/";
include $APP_ROOT."assets\linker\linkerCss.php" ; 
?>

<!-- navigation bar and search bar starts -->
  <!-- fixed horizontal -->
  <div class="admin_navbar_horizontal bg-secondary justify-content-center d-flex align-items-center">
    <p class="text-white h3">Good Morning, 
      ?></p>
  </div>



  <!-- fixed vertical -->
  <div class=" admin_navbar_veritcal bg-dark ">
    <div class=" bg-light d-flex justify-content-center">
      <a href=><img class=" py-1" src="<?php echo $logoSrc; ?>" alt=""></a>

    </div>


    

    <a class="text-white" href=>
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


        <a class="text-light" href=>
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
        
        
        <a class="text-light" href=>
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

          <a class="text-white" href=>
          <div class="  bg-success py-2 text-center my-4">

            <i class="fas fa-shopping-cart"></i> Back to Shop Page

          </div></a>

            <a class="text-white" href=>
              <div class="  bg-danger py-2 text-center my-4">

                <i class="fas fa-sign-out-alt"></i>Sign Out

              </div></a>

              




            </div>



<?php 
include $APP_ROOT."assets/linker/linkerJs.php" ; 
?>
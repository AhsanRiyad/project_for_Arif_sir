<?php 
$logoSrc = APP_ROOT."lib/img/logo.png";
 ?>


<div class="container-fluid bg-light">
    <div class="row">
      <div class="col">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 col-12 justify-content-lg-start d-flex justify-content-center"><a href="index.php"><img src=<?php echo $logoSrc; ?>></a>
            </div>

            <div class="col-lg-6 col-12 align-self-lg-center">

              <form action="search_result.php">
                <div class="form-row align-items-center">
                  <div class="col-9">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search">
                    </div>
                  </div>

                  <div class="col-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                  </div>
                </div>
              </form> 
            </div>
            <div class="col-lg-1  col-3 offset-1 mt-3 mb-3 mb-lg-0 mt-lg-0 offset-lg-0 d-flex justify-content-center align-self-lg-center"><a href="<?php if($loginStatus == true){
              echo $dashboardHomeUrl;
            }
            else{
              echo $loginUrl;
            } ?>" class="btn btn-success">
            <?php 
            if($loginStatus == true){
              echo 'Account';
            }
            else{
              echo 'Sign In';
            }
            ?>
          </a></div>

          <div class=" col-lg-2 col-xl-1 col-3 mt-3 mb-3 mb-lg-0 mt-lg-0 d-flex justify-content-center align-self-lg-center"><a href="contact.php" class="btn btn-info">Need Help?</a></div>


          <div class=" col-lg-1 col-3 mt-3 mb-3 mb-lg-0 mt-lg-0 d-flex justify-content-center align-self-lg-center">
            <a href="<?php if($loginStatus == true){
              echo 'cart.php';
            }
            else{
              unset($_SESSION['UserInfo']);
              echo 'reg.php';

            } ?>" class="btn btn-danger">
              <?php 
            if($loginStatus == true){
              echo 'Cart'.'<span class="badge badge-light">4</span>';
            }
            else{
              echo 'Register';
            }
            ?>
             
            </a>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>
<!-- navigation bar and search bar ends -->
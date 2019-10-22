<?php 
$pageName = 'forgot_password';
$APP_ROOT = "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/";
include $APP_ROOT."assets\linker\linkerCss.php" ;
?>



<!-- login form starts -->
<form  method="post" action="#">



  <div class="container-fluid">
    <div class="row justify-content-xl-center _background ">
      <div class="col-12 col-xl-4 ">
        <div class="container margin_">
          <div class="row py-4 ">
            
              

            
              
                <p class="text-dark h4" id="login_id">
             Forgot Password?
             <br>
             Please enter your email to recover..
            </p>
              
          </div>

          <div class="row justify-content-xl-center bg-white py-5 mb-5">

            <div class="col-12 col-xl-9 ">

              <div class="form-group">
                <label for="exampleInputEmail1" ><small id="idExampleInputEmail1Small">Email address*</small>
                  <br>
          


                </label>
                <input name='email'  type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"
                value=""
                >
              </div>

              <button type="submit" name="submit" value="submit" class="btn btn-success rounded-0 mb-1 w-100 py-2">Recover Password</button>

              <!-- <button type="submit" name="submit" value="submit" class="btn btn-info rounded-0 mb-1 w-100 py-2">Back to Login</button> -->
              
              <br>

              <div class="row justify-content-end">
              <div class="col-lg-auto">
              <a href="<?php echo $loginPage; ?>" class="">Go Back to Login</a>
              </div>
              </div>
              
            



            </div>
            


          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- body ends-->




<?php 
include $APP_ROOT."assets/linker/linkerJs.php" ; 
?>
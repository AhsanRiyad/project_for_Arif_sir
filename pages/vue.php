

  <div class="container-fluid">
    <div class="row justify-content-xl-center justify-content-md-center _background ">
      <div class="col-12 col-md-5 col-xl-6 align-self-md-center ">
        <div class="container margin_">
          <div class="row py-4 ">


            <p class="text-dark h4" id="login_id">
              Welcome Back! Please login 
              <br>
              
              <span class="text-danger">
              
              </span>
              </p>
            </div>

            <div class="row justify-content-xl-center bg-white py-5 mb-5">

              <div class="col-12 col-xl-6 ">

                <div class="form-group">
                  <label for="exampleInputEmail1" ><small id="idExampleInputEmail1Small">Email address*</small>
                    <br>



                  </label>
                  <input name='email'  type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"
                  value=""
                  >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"><small>Password*</small>
                    <br>



                  </label>
                  <input name="password" type="password" class="form-control rounded-0" id="exampleInputPassword1" placeholder="Password"
                  value=""

                  >
                  <p class="text-right text-danger">
                    <small><a href="<?php echo $forgotPage; ?>">Forgot password?</a></small>
                  </p>
                </div>

              </div>
              <div class="col-12 col-xl-5 align-self-xl-center">
                <button type="submit" name="submit" value="submit" class="btn btn-success rounded-0 w-100 py-2">Log In</button>

                <p class="text-danger h5 mt-2"><i>Not a member yet?</i></p>

                <a href="<?php echo $registationPage; ?>"><button type="button" class="btn btn-primary rounded-0 w-100 py-2">Register Here</button></a>

              </div>


            </div>
          </div>
        </div>
      </div>
    </div>


<?php 
$jsMain = $rootAdress."assets/js/main.js";
$jsJquery = $rootAdress.'assets/js/jquery-3.4.1.js';
$jsBootstrap = $rootAdress.'assets/js/bootstrap.js';
$jsBootstrap_bundle = $rootAdress.'assets/js/bootstrap.bundle.js';
$jquery_ui = $rootAdress.'assets/js/jquery-ui.js';
?>


<!-- bootstrap js cdn -->
   <!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->

    <!--bootstrap js on server-->
    <script src=<?php echo $jsJquery ?> type="text/javascript"></script> 
    <script src=<?php echo $jsBootstrap; ?> type="text/javascript"></script>
    <script src=<?php echo $jsBootstrap_bundle; ?> type="text/javascript"></script>
    <script src=<?php echo $jquery_ui; ?> type="text/javascript"></script>
    
    
    <!-- font-awesome js cdn -->
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    
    <!--font-awesome on server-->
    <!-- <script src="font-awesome/js/all.js" type="text/javascript"></script> -->
    
    <!-- custome js -->



    <!-- vue  2.x-->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <!-- vuetify 2.1.9 -->
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <!-- vue resource version 1.5.1-->
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
    <!-- axios version 0.19.0-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js" ></script>

    



    
    <script>
     


      Vue.mixin({
        data: function() {
            return {
                APP_ROOT: '<?= $APP_ROOT ?>' , 
                rootAdress: '<?= $rootAdress ?>',
                images:{
                    logoSrc: '<?php echo $logoSrc; ?>',
                    fev_icon: '<?php echo $fev_icon; ?>',
                    profile_photo: '<?php echo $profile_photo; ?>',
                    default_photo: '<?php echo $default_photo; ?>',

                },
                pages:{
                    reg_for_admin: '<?= $reg_for_admin ?>',
                    dashboard_head: '<?= $dashboard_head ?>',
                },
                address:{
                    registationPage:'<?php echo $registationPage ?>',
                    loginPage: '<?php echo $loginPage; ?>',
                    forgotPage: '<?php echo $forgotPage; ?>',
                    dashboardPage: '<?php echo $dashboardPage; ?>',
                    add_user: '<?php echo $add_user; ?>',
                    reg_req: '<?php echo $reg_req; ?>',
                    profilePage: '<?php echo $profilePage; ?>',
                    searchPage: '<?php echo $searchPage; ?>',

                },
                model:{
                    modelRegirstration: '<?php echo $modelRegirstration; ?>',
                    modelLogin: '<?php echo $modelLogin; ?>',
                    modelReg_req: '<?php echo $modelReg_req; ?>',
                    modeltest: '<?php echo $modeltest; ?>',
                    modelUploadPhotos: '<?php echo $modelUploadPhotos; ?>',
                    modelPrivacy: '<?php echo $modelPrivacy; ?>',
                    modelGallery: '<?php echo $modelGallery; ?>',
                    modelProfile_update: '<?php echo $modelProfile_update; ?>',
                    modelSearch: '<?php echo $modelSearch; ?>',

                },
                users_info__:{
                    email__: '<?= $email__ ?>',
                    login__: '<?= $login__ ?>',
                    user__: '<?= $user__ ?>',
                    admin__: '<?= $admin__ ?>',
                    verified__: '<?= $verified__ ?>',
                }

            }
        }
    })





</script>









<?php 
include $APP_ROOT."assets/js/main.php";

    // vue_file
if($pageName == 'registration'){
    include $APP_ROOT."assets/js/vue_file/registration.php";
}
else if($pageName == 'login'){
    include $APP_ROOT."assets/js/vue_file/login.php";
}
else if($pageName == 'reg_req'){
    include $APP_ROOT."assets/js/vue_file/reg_req.php";
}
else if($pageName == 'add_user'){
    include $APP_ROOT."assets/js/vue_file/add_user.php";
}
else if($pageName == 'profile'){
    include $APP_ROOT."assets/js/vue_file/profile.php";
}
else if($pageName == 'privacy'){
    include $APP_ROOT."assets/js/vue_file/privacy.php";
}
else if($pageName == 'gallery'){
    include $APP_ROOT."assets/js/vue_file/gallery.php";
}
else if($pageName == 'forgot_password'){
    include $APP_ROOT."assets/js/vue_file/forgot.php";
}
else if($pageName == 'search'){
    include $APP_ROOT."assets/js/vue_file/search.php";
}
else if($pageName == 'add_user'){
    include $APP_ROOT."assets/js/vue_file/add_user.php";
}




?>

</body>
</html>
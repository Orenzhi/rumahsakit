<?php
require_once "../config/config.php";
if (isset($_SESSION['user'])) {
  echo "<script>window.location='".base_url()."';</script>";
}else {

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Autentikasi Diri</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/css/vendor.bundle.base.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/css/vendor.bundle.addons.css');?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?=base_url('assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css');?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.png');?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">

            <?php
              // code untuk login ke sistem aplikasi
              if (isset($_POST['login'])) {
                $user = trim(mysqli_real_escape_string($con, $_POST['user']));

                $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
                $sql_login = mysqli_query($con,"SELECT * FROM user WHERE nama_user='$user' AND password='$pass'") or die (mysql_error($con));

                // echo mysqli_num_rows($sql_login);

                if (mysqli_num_rows($sql_login)>0) {
                  $_SESSION['user'] = $user;

                  // echo $user;

                ?>
                <div class="row">
                  <div class="col-lg-12 mx-auto">
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <span class="fa fa-info-circle" aria-hidden="true"></span>
                      <strong>Login Berhasil !</strong>
                    </div>
                  </div>
                </div>
                <?php
                  echo "<script>window.location='".base_url()."';</script>";
                }else{ ?>
              
                <div class="row">
                  <div class="col-lg-12 mx-auto">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <span class="fa fa-info-circle" aria-hidden="true"></span>
                      <strong>Login Gagal !</strong><br><span class="text-small mb-0">Periksa Kembali Username/Password</span>
                    </div>
                  </div>
                </div>
            <?php  
                }

              }
            ?>

              <form action="#" method="post">
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="user" placeholder="Username" required="">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <!-- <?php
                          // if (mysqli_num_rows(mysqli_query($con,"SELECT * FROM user"))>0) {
                        ?> -->    
                            <!-- <i class="mdi mdi-check-circle-outline text-info"></i> -->    
                        <!-- <?php
                          // } else{
                        ?> -->    
                        <i class="mdi mdi-check-circle-outline"></i>
                        <!-- <?php  
                          // }
                        ?> -->
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="pass" placeholder="*********" required="">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" name="login" >Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" src="../../assets/images/file-icons/icon-google.svg" alt="">Log in with Google</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="register.html" class="text-black text-small">Create new account</a>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2019 zhient. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
<?php  

}

?>
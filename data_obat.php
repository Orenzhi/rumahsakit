<?php
  require_once "config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Aplikasi Rumah Sakit - Data Obat</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
      include_once "partials/_navbar.php";
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php
        include_once "partials/_sidebar.php";
      ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- content here ! -->

          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title"><b>OBAT</b></h2>
                  <p class="card-description">
                    Data Obat Master
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="table-info">
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Nama Obat
                          </th>
                          <th>
                            Jenis Obat
                          </th>
                          <th>
                            Keterangan
                          </th>
                          <th class="text-center">
                            Aksi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no = 1;
                          $sql_obat = mysqli_query($con,"SELECT * FROM obat") or die (mysqli_error($con));
                          if (mysqli_num_rows($sql_obat)>0) {
                            while ($data= mysqli_fetch_array($sql_obat)) {
                        ?>  
                          
                          <tr>
                            <td class="py-1">
                              <?=$no++;?>
                            </td>
                            <td>
                              <?=$data['nama_obat'];?>
                            </td>
                            <td>
                              <?=$data['jenis_obat'];?>
                            </td>
                            <td>
                              <?=$data['ket_obat'];?>
                            </td>
                            <td class="text-center">
                              <a href="#"><button type="submit" class="btn btn-success btn-sm"><span class="fa fa-eye"></span></button></a>
                              <a href="#"><button class="btn btn-warning btn-sm"><span class="fa fa-edit"></span></button></a>
                              <a href="#"><button class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button></a>
                            </td>
                          </tr>
    
                        <?php
                            }
                          }else{
                        ?>
                          <tr>
                            <td class="py-1">Data Tidak di Temukan !!</td>
                          </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                    <br>
                    <a href="obat/add.php"><button type="submit" class="btn btn-info btn-sm"><span class="fa fa-plus"> Tambah Data</span></button></a>
                  </div>
                </div>
              </div>
            </div>
         

        </div>
      <!-- partial:partials/_footer.html -->
        <?php
          include_once "partials/_footer.php";
        ?>
       </div> 
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
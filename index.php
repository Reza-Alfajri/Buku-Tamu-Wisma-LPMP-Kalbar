<?php 
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
    require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Absensi LPMP</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css" />
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css" />
    <link rel="stylesheet" href="css/vertical-layout-light/style2.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <!-- Just an image -->
      <nav class="navbar navbar-light p-0 bg-white fixed-top">
        <a class="navbar-brand p-2 ml-md-3 ml-1" href="#">
          <img src="images/logo-lpmp.png" width="235" class="img-fluid m-0" alt="">
        </a>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <div class="container-fluid">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h2 class="font-weight-bold">Hai <?php echo $_SESSION['username'];?>!</h2>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                  </div>
                  <div class="col-xl-4 pl-lg-5 d-flex justify-content-md-end pt-md-1">
                  <?php 
                    
                    $hari = date('l');
                    /*$new = date('l, F d, Y', strtotime($Today));*/
                    if ($hari=="Sunday") {
                         echo "Minggu, ";
                    }elseif ($hari=="Monday") {
                        echo "Senin, ";
                    }elseif ($hari=="Tuesday") {
                        echo "Selasa, ";
                    }elseif ($hari=="Wednesday") {
                        echo "Rabu, ";
                    }elseif ($hari=="Thursday") {
                        echo("Kamis, ");
                    }elseif ($hari=="Friday") {
                        echo "Jum'at, ";
                    }elseif ($hari=="Saturday") {
                        echo "Sabtu, ";
                    }
                    $tgl =date('d');
                    echo $tgl;
                    $bulan =date('F');
                    if ($bulan=="January") {
                        echo " Januari ";
                    }elseif ($bulan=="February") {
                        echo " Februari ";
                    }elseif ($bulan=="March") {
                        echo " Maret ";
                    }elseif ($bulan=="April") {
                        echo " April ";
                    }elseif ($bulan=="May") {
                        echo " Mei ";
                    }elseif ($bulan=="June") {
                        echo " Juni ";
                    }elseif ($bulan=="July") {
                        echo " Juli ";
                    }elseif ($bulan=="August") {
                        echo " Agustus ";
                    }elseif ($bulan=="September") {
                        echo " September ";
                    }elseif ($bulan=="October") {
                        echo " Oktober ";
                    }elseif ($bulan=="November") {
                        echo " November ";
                    }elseif ($bulan=="December") {
                        echo " Desember ";
                    }
                    $tahun=date('Y');
                    echo $tahun;

                ?>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card p-2">
                  <div class="card-body">
                    <h2 class="card-title">Buku Tamu</h2>
                    <p class="font-weight-500 mb-3">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                    <div class="row p-md-3">
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="card shadow mb-4">
                              <img src="images/hand-5.jpg" class="card-img-top rounded img-fluid" width="23rem" alt="...">
                              <div class="card-body">
                                <h2 class="card-title">Wisma handayani</h2>
                                <p class="card-text font-weight-bold text-info mb-md-0">Total kamar</p>
                                <p class="card-text font-weight-bold text-info mb-md-3">Kamar kosong</p>
                                <a href="#" class="btn btn-primary">Masuk</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="card shadow mb-4">
                              <img src="images/angg-1.jpg" class="card-img-top rounded img-fluid" width="23rem" alt="...">
                              <div class="card-body">
                                <h2 class="card-title">Wisma Anggrek</h2>
                                <p class="card-text font-weight-bold text-info mb-md-0">Total kamar</p>
                                <p class="card-text font-weight-bold text-info mb-md-3">Kamar kosong</p>
                                <a href="#" class="btn btn-primary">Masuk</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="row">
                          <div class="col-md-12 mb-4 stretch-card transparent" href="../../pages/list-kamar/list-kamar-handayani.php">
                            <div class="card shadow" style="width: 18rem;">
                              <div class="card-body hei">
                                <h5 class="card-title">Biodata</h5>
                                <p class="card-text">Pengisian identitas pengunjung wisma</p>
                                <a href="#" class="btn btn-primary mt-5">Masuk</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 mb-4 stretch-card transparent" href="../../pages/list-kamar/list-kamar-handayani.php">
                            <div class="card shadow" style="width: 18rem;">
                              <div class="card-body hei">
                                <h5 class="card-title">Rekap Pengunjung</h5>
                                <p class="card-text">Rekapan pengunjung wisma</p>
                                <a href="#" class="btn btn-primary mt-5">Masuk</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"
                  >Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span
                >
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
              </div>
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Edited by interns from Polnep | 2021</span>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
    </div>
    <script type="text/javascript">        
        function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
            var waktu = new Date();            //membuat object date berdasarkan waktu saat 
            var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
            var sm = waktu.getMinutes() + "";  //memunculkan nilai detik    
            var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
            document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
        }
    </script>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>

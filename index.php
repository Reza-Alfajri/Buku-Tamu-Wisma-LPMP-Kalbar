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
    <link rel="shortcut icon" href="images/logo-lpmp-kecil.png" />
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
        <div class="mr-lg-5 mr-3">
          <a class="btn btn-primary p-2 font-weight-bold" href="logout.php" onclick="return logout(event)">
          <i class="fa fa-sign-out"></i>
              <span class="">Logout</span>
          </a>
          <script type="text/javascript">
            function logout(ev){
              ev.preventDefault();
              var urlToRedirect = ev.currentTarget.getAttribute('href'); 
              console.log(urlToRedirect);
              Swal.fire({
              title: 'Yakin akan keluar?',
              icon: "question",
              showCancelButton: true,
              confirmButtonText: 'Ya',
              }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = urlToRedirect;
              }
              })
            }
          </script>
        </div>
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
                    <h3 class="font-weight-bold">Hai <?php echo $_SESSION['username'];?>!</h3>
                    <h4 class="font-weight-normal mb-0">Selamat Datang di <a href="http://www.lpmpkalbar.id/index.php/id/" target="blank" class=" text-decoration-none "><span class="text-primary">LPMP Kalbar</span></a> </h4>
                  </div>
                  <div class="col-12 col-xl-4">
                   <div class="justify-content-sm-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                      <button class="btn shadow-sm mb-3 bg-white" type="button" aria-haspopup="true" aria-expanded="true">
                       
                       <div class="text-info">
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
                      </button>
                    </div>
                   </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 grid-margin">
                    <div class="row d-flex justify-content-center mt-2">
                      <div class="col-md-7 card p-md-4 p-3 mr-md-4">
                        <div class="row">
                          <div class="col-md-6 mb-md-0 mb-4">
                            <div class="card shadow" style="background-color: #09547d;">
                              <img src="images/hand-5.jpg" class="card-img-top rounded-top img-fluid" width="23rem" alt="...">
                              <div class="card-body">
                                <h2 class="card-title text-white">Wisma handayani</h2>
                                <?php $sql = "SELECT * FROM handayani";
                                      $sql1 = "SELECT * FROM handayani WHERE statusco='Kosong'";
                                      $query = mysqli_query($db, $sql);
                                      $query1 = mysqli_query($db, $sql1); ?>
                                <div class="row d-flex justify-content-between">
                                  <div class="col-7">
                                    <p class="card-text font-weight-bold mb-0 text-white">Total kamar : <?= mysqli_num_rows($query); ?></p>
                                    <p class="card-text font-weight-bold text-white">Kamar kosong : <?= mysqli_num_rows($query1); ?></p>
                                  </div>
                                  <div class="col-5">
                                    <a href="pages/list-kamar/list-kamar-handayani.php" class="btn btn-primary">Masuk</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 mb-md-0 mb-4">
                            <div class="card shadow" style="background-color: #09547d;">
                              <img src="images/angg-1.jpg" class="card-img-top rounded-top img-fluid" width="23rem" alt="...">
                              <div class="card-body">
                                <h2 class="card-title text-white">Wisma Anggrek</h2>
                                <?php $sql2 = "SELECT * FROM anggrek";
                                      $sql3 = "SELECT * FROM anggrek WHERE statusco='Kosong'";
                                      $query2 = mysqli_query($db, $sql2);
                                      $query3 = mysqli_query($db, $sql3); ?>
                                <div class="row d-flex justify-content-between">
                                  <div class="col-7">
                                    <p class="card-text font-weight-bold mb-0 text-white">Total kamar : <?= mysqli_num_rows($query2); ?></p>
                                    <p class="card-text font-weight-bold text-white">Kamar kosong :  <?= mysqli_num_rows($query3); ?></p>
                                  </div>
                                  <div class="col-5">
                                    <a href="pages/list-kamar/list-kamar-handayani.php" class="btn btn-primary">Masuk</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 card p-md-4">
                        <div class="row">
                          <div class="col-md-12 mb-4 stretch-card transparent" href="../../pages/list-kamar/list-kamar-handayani.php">
                            <div class="card shadow" style="width: 18rem; background-color: #d3d2ff;">
                              <div class="svg d-flex justify-content-end">
                                <div class="position-absolute ">
                                <svg width="215" height="105" viewBox="0 0 275 165" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M137.5 165C213.439 165 275 103.439 275 27.5C275 18.0822 274.053 8.88552 272.25 0H2.7505C0.946832 8.88552 0 18.0822 0 27.5C0 103.439 61.5608 165 137.5 165Z" fill="#C4C3FF"/>
                                  <circle cx="225" cy="137" r="28" fill="#9895FF"/>
                                  </svg>
                                </div>
                              </div>
                              <div class="card-body">
                                <h5 class="card-title">Biodata</h5>
                                <p class="card-text mb-2">Pengisian identitas pengunjung wisma</p>
                                <hr>
                                <a href="pages/biodata/biodata-pengunjung.php" class="btn btn-primary">Masuk</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 mb-4 stretch-card transparent" href="../../pages/list-kamar/list-kamar-handayani.php">
                            <div class="card shadow" style="width: 18rem; background-color: #c0e2f5; ">
                              <div class="svg d-flex justify-content-end">
                                <div class="position-absolute ">
                                  <svg width="215" height="105" viewBox="0 0 275 165" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M137.5 165C213.439 165 275 103.439 275 27.5C275 18.0822 274.053 8.88552 272.25 0H2.7505C0.946832 8.88552 0 18.0822 0 27.5C0 103.439 61.5608 165 137.5 165Z" fill="#91C9E9"/>
                                    <circle cx="225" cy="137" r="28" fill="#55A3D0"/>
                                  </svg>
                                </div>
                              </div>
                              <div class="card-body">
                                <h5 class="card-title">Rekap Pengunjung</h5>
                                <p class="card-text mb-2">Rekapan pengunjung wisma</p>
                                <hr>
                                <a href="pages/rekap/rekap-anggrek.php" class="btn btn-primary mb-0">Masuk</a>
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
                  >Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

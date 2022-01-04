<?php
	session_start();
        if(!isset($_SESSION["username"])){
        header("Location: ../../login.php");
        }
	require '../../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>List Admin | LPMP Kalbar</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- inject -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css" />
  <link rel="stylesheet" href="css/vertical-layout-light/style2.css" />
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="../../text/css" href="../../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <!-- datatables -->
  <link rel="stylesheet" href="../../dataTables/datatables.min.css">
  <!-- end datatables -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="shortcut icon" href="../../images/logo-lpmp-kecil.png" />
  <style>
    .swal2-popup {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo ms-10" href="../../index.php"><img src="../../images/logo-lpmp.png" alt="logo"/></a>
        <a class="navbar-brand d-lg-none" href="../../index.php"><img src="../../images/logo-lpmp-kecil.png" width="36px" height="40px" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        
        <!-- Start Notif -->
        <ul class="navbar-nav navbar-nav-right">
          
        </ul>
        <!-- End Notif -->
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <!-- Home -->
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <!-- Biodata -->
          <li class="nav-item">
            <a class="nav-link" href="../../pages/biodata/biodata-pengunjung.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Biodata Tamu</span>
            </a>
          </li>
         <!-- List Kamar -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#list-kamar" aria-expanded="false" aria-controls="list-kamar">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">List Kamar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="list-kamar">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/list-kamar/list-kamar-handayani.php">Handayani</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/list-kamar/list-kamar-anggrek.php">Anggrek</a></li>
              </ul>
            </div>
          </li>
          <!-- Rekapan -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#rekapan-tamu" aria-expanded="false" aria-controls="rekapan-tamu">
              <i class="ti-agenda menu-icon"></i>
              <span class="menu-title">Rekapan Tamu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="rekapan-tamu">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/rekap/rekap-handayani.php">Handayani</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/rekap/rekap-anggrek.php">Anggrek</a></li>
              </ul>
            </div>
          </li>
          <!-- LIST ADMIN -->
          <?php
             $a= "SELECT * FROM admin WHERE username='$_SESSION[username]'";
             $admin= mysqli_query($db, $a);
             $adm=mysqli_fetch_array($admin);
             if ($adm['level'] == 'admin') {
                $konten = '<li class="nav-item">
                <a class="nav-link" href="../../pages/list-admin/list-admin.php" hidden="hidden">
                  <i class="icon-paper menu-icon"></i>
                  <span class="menu-title">List Admin</span>
                </a>
              </li>';
             } else {
              $konten = '<li class="nav-item active">
              <a class="nav-link" href="../../pages/list-admin/list-admin.php">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">List Admin</span>
              </a>
            </li>';
             }
             echo $konten;
          ?>
          <!-- Logout -->
          <li class="nav-item">
            <a class="nav-link" href="../../logout.php" onclick="return logout(event)">
              <i class="fa fa-sign-out menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
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
          <!--  -->
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-0">
            <div class="col-md-12 mb-0 mb-md-2 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold text-md-left text-center">List Akun Admin</h3>
                </div>
              </div> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                    <!-- Kodingan Isi Halaman Page Di Bawah Ini -->
                    <!-- Tabel -->
                    <div class="row">
                      <div class="col-md-12" style="overflow-x: auto">
                        <div class="table-responsive" style="width:auto">
                          <table class="table" id="TableBiodata">
                              <thead class="text-white" style="background-color: #4FAFC3;">
                                <tr>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th style="width: 150px;">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <!-- Search -->
                                <?php
                                    $sql = "SELECT * FROM admin WHERE level='admin'";
                                    $sql1 = "SELECT * FROM admin WHERE level='admin'";
                                    $query = mysqli_query($db, $sql);
                                    $query1 = mysqli_query($db, $sql1);
                                    $total = mysqli_num_rows($query);
                                ?>
                                <!-- End Search -->
                                <?php 
                                if ($total > 0) {
                                while($list=mysqli_fetch_array($query)) : 
                                //$no++; 
                                ?> 
                                  <tr class="alert" role="alert">
                                    <td><?=$list['username']; ?></td>
                                    <td><?=$list['password']; ?></td>
                                    <td class="text-center"> 
				                            <a href=../../proses-edit-admin.php?username="<?=$list['username']?>" id="edit" onclick='return edit(event)'>
                                    <span aria-hidden='true'><i class='fa fa-edit'></i></span>edit 
                                    </a>
                                    <script>
                                      function edit(ev) {
                                        ev.preventDefault();
                                          var urlToRedirect = ev.currentTarget.getAttribute('href'); 
                                          console.log(urlToRedirect);
                                          Swal.fire({
                                            title: 'Edit Akun',
                                            html: `
                                            <section class="form-login mt-md-3 mt-4 pt-md-3 pt-5">
                                              <div class="container-fluid">
                                                <div class="row">
                                                  <fieldset class="d-flex justify-content-center p-sm-2">
                                                    <form class="shadow p-3 mb-3 bg-white p-4 bg-white rounded" style="width: 350px;" action="../../proses-edit-admin.php" id="rounded-form" method="POST">
                                                      <div class="d-flex justify-content-center mb-4">
                                                        <img src="images/logo-lpmp-kecil.png" width="200px" alt="">
                                                      </div>
                                                      <div class="mb-3 d-flex">
                                                        <span class="m-auto pt-2 pr-2 pb-2"><i class="fas fa-user"></i></span>
                                                        <input type="text" class="form-control" style="margin-right: 1.1rem;" name="username" id="usrnm" aria-describedby="" placeholder="username" readonly>
                                                      </div>
                                                      <div class="mb-3 d-flex">
                                                        <span class="m-auto pt-2 pr-2 pb-2"><i class="fas fa-lock"></i></span>
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                                                        <span id="mybutton1" onclick="password()"><i class="far fa-eye text-secondary"></i></span>
                                                      </div>
                                                      <button class="btn btn-register btn-block rounded-pill btn-primary pe-3 ps-3" type="submit" name="daftar">Buat</button>
                                                      </div>
                                                    </form>
                                                  </fieldset>
                                                  <p>Klik diluar form untuk keluar atau tekan [esc]</p>
                                                </div>
                                              </div>
                                              <a >
                                              </a>
                                            </section>
                                            `,
                                            showConfirmButton: false,
                                          })
                                          var username =urlToRedirect.substring(38, urlToRedirect.length-1);
                                          document.getElementById("usrnm").value = username;
                                        }
                                        
                                      function password()
                                      {
                                        var x = document.getElementById('password').type;
                                        if (x == 'password')
                                        {
                                          document.getElementById('password').type = 'text';
                                          document.getElementById('mybutton1').innerHTML = '<i class="far fa-eye-slash"></i>';
                                        }
                                        else
                                        {
                                          document.getElementById('password').type = 'password';
                                          document.getElementById('mybutton1').innerHTML = '<i class="far fa-eye"></i>';
                                        }
                                      }
                                      
                                    </script>
                                    <a href=../../proses-hapus-admin.php?username="<?=$list['username']?>" onclick='return hapus(event)'>
                                    <span aria-hidden='true'><i class='fa fa-times-circle'></i></span>Delete
                                    </a>
                                    <script type="text/javascript">
                                                function hapus(ev){
                                                ev.preventDefault();
                                                var urlToRedirect = ev.currentTarget.getAttribute('href'); 
                                                console.log(urlToRedirect);
                                                Swal.fire({
                                                    title: 'Data akan terhapus!',
                                                    icon: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Ya',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                    window.location.href = urlToRedirect;
                                                    }
                                                })
                                                }
                                            </script>
                                  </tr>
                                  <?php endwhile; ?> 
                                  <?php } else {
                                      echo "<tr>
                                      <td>Data Belum Ada</td>
                                      </tr>";
                                    }
                                    ?> 
                            </tbody>
                        </table>
                        </div>
                      </div>
                    </div>
                    <!-- End Tabel -->
                </div>
              </div>
            </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer" style="background-color: #09547d;">
          <div class="d-sm-flex justify-content-center justify-content-sm-between text-white">
            <span class=" text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between text-white">
            <span class=" text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Edited by interns from Polnep | 2021</span>
	  </div>
        </footer>  
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->

  <!-- Plugin js for this page -->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../js/dataTables.select.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- End plugin js for this page -->
  
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/dashboard.js"></script>
  <script src="../../js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <script type="text/javascript">
    $(document).ready( function () {
    $('#TableBiodata').DataTable();
    } );
  </script>
  <!-- end datatabels -->
</body>
</html>

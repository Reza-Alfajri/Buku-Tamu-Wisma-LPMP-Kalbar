<?php
	session_start();
	if(!isset($_SESSION["username"])){
	   header("Location: login.php");
	}
	require '../../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    a.disable {
      pointer-events: none;
      cursor: default;
      color: grey;
    }
  </style>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Wisma Handayani | LPMP Kalbar</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <link rel="shortcut icon" href="../../images/favicon.png" />

  <style>
    .swal2-popup {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12  p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="../../index.php"><img src="../../images/logo-lpmp.png" width="180px" height="60px" alt="logo"/></a>
        <a class="navbar-brand d-lg-none" href="../../index.php"><img src="../../images/logo-lpmp-kecil.png" width="36px" height="40px" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu align-items-start"></span>
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
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">List Kamar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/list-kamar/list-kamar-handayani.php">Handayani</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/list-kamar/list-kamar-anggrek.php">Anggrek</a></li>
              </ul>
            </div>
          </li>
          <!-- Rekapan -->
          <li class="nav-item">
            <a class="nav-link" href="../../pages/rekap/rekapan.php">
              <i class="ti-agenda menu-icon"></i>
              <span class="menu-title">Rekapan Pengunjung</span>
            </a>
          </li>
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
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h2 class="font-weight-bold">Wisma Handayani</h2>
                </div>
              </div> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List Kamar</h4>
                  <p class="font-weight-500">Berikut list kamar yang ada </p>
                    <!-- Kodingan Isi Halaman Page Di Bawah Ini -->
                    <!-- Tabel -->
                    <div class="row">
                      <div class="col-md-12" style="overflow-x: auto">
                        <div class="table-responsive" style="width:auto">
                          <table class="table" id="TableHandayani">
                              <thead class="thead-dark">
                                <tr>
                                <th>Check In</th>
				                        <th>No. Kamar</th>
                                <th>Timestamp</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Status Check Out</th>
                                <th>Nama Tamu</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Kabupaten / Kota</th>
                                <th>Jabatan</th>
                                <th>Nama Kantor</th>
                                <th>No. HP</th>
                                <th>&nbsp;</th>
                                </tr>
                              </thead>
                              <tbody>
                                <!-- Search -->
                                <?php
                                    $sql = "SELECT * FROM handayani";
                                    $sql1 = "SELECT * FROM handayani";
                                    $sql2 = "SELECT * FROM handayani WHERE statusco='Kosong'";
                                    $query = mysqli_query($db, $sql);
                                    $query1 = mysqli_query($db, $sql1);
                                    $query2 = mysqli_query($db, $sql2);
                                ?>
                                <!-- End Search -->
                                <?php while($list=mysqli_fetch_array($query1)) : 
                                  //$no++; 
                                ?> 
                                  <tr class="alert" role="alert">
                                    <td>
                                    <?php 
                                    if($list['statusco']=="Terisi") 
                                        echo 
                                        "<a href=../../pages/form-pendaftaran/form-pendaftaran-handayani.php?nomor_kamar=".$list['nomor_kamar']." class='disable' id='edit' onclick='return edit(event)' >
                                        <span aria-hidden='true'><i class='fa fa-sign-in'></i></span>
                                        </a>";
                                    else 
                                        echo 
                                        "<a href=../../pages/form-pendaftaran/form-pendaftaran-handayani.php?nomor_kamar=".$list['nomor_kamar']." id='edit' onclick='return edit(event)'>
                                        <span aria-hidden='true'><i class='fa fa-sign-in'></i></span>
                                        </a>";
                                    ?>
                                      <script type="text/javascript">
                                        function edit(ev){
                                          ev.preventDefault();
                                          var urlToRedirect = ev.currentTarget.getAttribute('href'); 
                                          console.log(urlToRedirect);
                                          Swal.fire({
                                            title: 'Yakin akan memilih kamar ini?',
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
                                    </td>
				                            <td><?= $list['nomor_kamar']; ?></td>
                                    <td><?= date_format(date_create($list['timestamp']),"H:i"); ?></td>
                                    <td><?= $list['nama_kegiatan']; ?></td>
                                    <td><?= $list['tanggal_awal']; ?></td>
                                    <td><?= $list['tanggal_akhir']; ?></td>
                                    <td><?= $list['statusco']; ?></td>
                                    <td><?= $list['nama_tamu']; ?></td>
                                    <td><?= $list['nik']; ?></td>
                                    <td><?= $list['jenis_kelamin']; ?></td>
                                    <td><?= $list['tanggal_lahir']; ?></td>
                                    <td><?= $list['kota']; ?></td>
                                    <td><?= $list['jabatan']; ?></td>
                                    <td><?= $list['nama_kantor']; ?></td>
                                    <td><?= $list['no_hp']; ?></td>
                                    <td>
                                      <?php 
                                      if($list['statusco']=="Kosong") 
                                          echo 
                                          "<a href=../../pages/form-pendaftaran/form-edit-handayani.php?nomor_kamar=".$list['nomor_kamar']." class='disable' id='edit'>
                                          <span aria-hidden='true'><i class='fa fa-edit'></i></span> Edit 
                                          </a>
                                          <a href=../../proses-hapus-handayani.php?nomor_kamar=".$list['nomor_kamar']." onclick='return hapus(event)' class='disable'>
                                          <span aria-hidden='true'><i class='fa fa-times-circle'></i></span>Check Out
                                          </a>";
                                      else 
                                          echo 
                                          "<a href=../../pages/form-pendaftaran/form-edit-handayani.php?nomor_kamar=".$list['nomor_kamar']." id='edit'>
                                          <span aria-hidden='true'><i class='fa fa-edit'></i></span> Edit 
                                          </a>
                                          <a href=../../proses-hapus-handayani.php?nomor_kamar=".$list['nomor_kamar']." onclick='return hapus(event)'>
                                          <span aria-hidden='true'><i class='fa fa-times-circle'></i></span>Check Out
                                          </a>";
                                      ?>
                                      
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
                                    </td>
                                  <?php endwhile; ?>
                                </tr>
                            </tbody>
			    <p class="card-text font-weight-bold text-info mb-md-0">Total kamar : <?= mysqli_num_rows($query); ?></p>
                            <p class="card-text font-weight-bold text-info mb-md-3">Kamar kosong : <?= mysqli_num_rows($query2); ?></p>
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
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
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
  <!-- datatabels -->
  <script src="../../dataTables/datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
    $('#TableHandayani').DataTable();
    } );
  </script>
  <!-- end datatabels -->
</body>

</html>

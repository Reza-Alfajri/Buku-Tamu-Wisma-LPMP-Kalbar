<?php
	require '../../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Buku Tamu Wisma Anggrek</title>
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
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo ms-10" href="../../index.html"><img src="../../images/logo-lpmp.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo-lpmp-kecil.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <!-- Search -->
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <form action="list-kamar-anggrek.php" method="GET" class="input-group-prepend hover-cursor" id="navbar-search-icon">
                
                <!-- Button Search -->
                <span class="input-group-text" id="search">
                  <button type="submit" class="input-group-text">
                    <i class="icon-search mr-lg-3"></i>
                  </button> 
                </span>
                <!-- Text Field -->
                <input class="mr-lg-3" type="text" name="cari" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];}?>">
                <!-- Radio -->
                
                <input class="form-check mr-lg-3" type="radio" name="kategori" value="carikamar" checked>
                <label class="form-check-label mr-lg-3" for="nama">Nomor Kamar</label>

                <input class="form-check mr-lg-2" type="radio" name="kategori" value="caristatusco">
                <label class="form-check-label mr-lg-3" for="nip">Status Check Out</label> <br>
                
                <a href="list-kamar-anggrek.php"><i class="fa fa-refresh ms-lg-3"></i>Reset</a>
              </form>
            </div>   
          </li>
        </ul>
        <!-- End Search -->
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
            <a class="nav-link" href="../../index.html">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Home</span>
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
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Rekapan Pengunjung</span>
            </a>
          </li>
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
                  <h3 class="font-weight-bold">List Kamar Wisma Anggrek</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
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
                          <table class="table">
                              <thead class="thead-dark">
                                <tr>
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
                                <th>No. Kamar</th>
                                <th>&nbsp;</th>
                                </tr>
                              </thead>
                              <tbody>
                                <!-- Search -->
                                <?php
                                  $hal=26;
                                  $page=isset($_GET['hal'])?(int)$_GET['hal']:1;
                                  $start=($page>1)?($page*$hal)-$hal:0;
                                  if(isset($_GET['cari'])){
                                    $cari = $_GET['cari'];
                                    echo "Hasil Pencarian : ".$cari;
                                  }
                                  if(isset($_GET['cari'])){
                                    $cari = $_GET['cari'];
                                    $sql = "SELECT * FROM anggrek WHERE nomor_kamar like '%".$cari."%'";
                                    $sql1 = "SELECT * FROM anggrek WHERE nomor_kamar LIKE '%$cari%' limit $start,$hal";
                                  } else {
                                    $sql = "SELECT * FROM anggrek";
                                    $sql1 = "SELECT * FROM anggrek limit $start,$hal";
                                  }
                                  if (isset($_GET['cari']) && isset($_GET['kategori'])) {
                                    $cari = $_GET['cari'];
                                    if ($_GET['kategori'] == 'carikamar') {
                                      $sql = "SELECT * FROM anggrek WHERE nomor_kamar LIKE '%$cari%'";
                                      $sql1 = "SELECT * FROM anggrek WHERE nomor_kamar LIKE '%$cari%' limit $start,$hal";
                                      $sql2 = "SELECT * FROM anggrek WHERE statusco='Kosong'";
                                    } else {
                                      $sql = "SELECT * FROM anggrek WHERE statusco LIKE '%$cari%'";
                                      $sql1 = "SELECT * FROM anggrek WHERE statusco  LIKE '%$cari%' limit $start,$hal";
                                      $sql2 = "SELECT * FROM anggrek WHERE statusco='Kosong'";
                                    }  
                                  } else {
                                      $sql = "SELECT * FROM anggrek";
                                      $sql1 = "SELECT * FROM anggrek limit $start,$hal";
                                      $sql2 = "SELECT * FROM anggrek WHERE statusco='Kosong'";
                                  }
                                  $query = mysqli_query($db, $sql);
                                  $query1 = mysqli_query($db, $sql1);
                                  $query2 = mysqli_query($db, $sql2);
                                  $total = mysqli_num_rows($query);
                                  $pages = ceil($total/$hal);
                                  $no = $start + 1;
                                ?>
                                <?php while($list=mysqli_fetch_array($query1)) : 
                                //$no++; 
                                ?> 
                                <tr class="alert" role="alert">
                                    <td><?= $list['timestamp']; ?></td>
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
                                    <td><?= $list['nomor_kamar']; ?></td>
                                    <td>
                                        <a class="edit" aria-label="close" href="../../pages/form-pendaftaran/form-pendaftaran-anggrek.php?nomor_kamar=<?=$list['nomor_kamar']; ?>" onclick="return edit(event)">
                                        <span aria-hidden="true"><i class="fa fa-edit"></i></span>
                                        </a>
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
                                        <a class="edit" aria-label="close" href="../../proses-hapus-anggrek.php?nomor_kamar=<?=$list['nomor_kamar']; ?>" onclick="return hapus(event)">
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
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
                                      </td>
                                    </tr>
							                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <?php for( $i = 1 ; $i <= $pages ; $i++ ) : ?>
                                    <?php if(isset($_GET["cari"])) : ?>
                                        <a href="?cari=<?= $_GET['cari']; ?>&hal=<?= $i; ?>">
                                        <?= $i; ?></a>
                                    <?php else : ?>
                                        <a href="?&hal=<?= $i; ?>">
                                        <?= $i; ?></a>
                                    <?php endif; ?>
                                    
                            <?php endfor; ?>
                            <p>Total Data : <?= mysqli_num_rows($query); ?></p>
                            <p>Jumlah Kamar Kosong : <?= mysqli_num_rows($query2); ?></p>
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
  
</body>

</html>


<?php
    //koneksi ke database
    include("../../koneksi.php");
    if (!isset($_GET['nik'])) {
        //kalau tidak ada id di query string
        header('Location: ../../pages/list-kamar/list-kamar-anggrek.php');
    }
    //ambil id dari query string
    $nik = $_GET['nik'];
    //buat query untuk ambil data dari database
    $sql = "SELECT * FROM anggrek WHERE nik=$nik";
    $query = mysqli_query($db, $sql);
    $list = mysqli_fetch_assoc($query);
    
    //jika data yang di-edit tidak ditemukan
    if(mysqli_num_rows($query) < 1) {
        die("Data tidak ditemukan...");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Data Tamu</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
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
        <!-- Kalau mau tambah Search di bawah ini-->
        
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
          <!-- Biodata -->
          <li class="nav-item">
            <a class="nav-link" href="../../pages/form-pendaftaran/form-biodata.php">
              <i class="icon-grid menu-icon"></i>
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
                  <h2 class="font-weight-bold">Form Edit Kamar Anggrek</h2>
                </div>
              </div> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Buku Tamu</h4>
                  <p class="font-weight-500">Silahkan isi formnya</p>
                    <!-- <div class="mr-5 mt-3">
                      <p class="text-muted">Users</p>
                      <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                    </div>
                    <div class="mt-3">
                      <p class="text-muted">Downloads</p>
                      <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                    </div>  -->
                    <form action="../../proses-edit-kamar-anggrek.php" method="POST">
                      <fieldset>
                        <!-- Baris 1 -->
                        <div class="row">
                          <!-- Nama Kegiatan -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Kegiatan</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama_kegiatan" class="form-control" value="<?php echo $list['nama_kegiatan']?>"></p>
                              </div>
                            </div>
                          </div>
                          <!-- Timestamp -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Timestamp</label>
                              <div class="col-sm-9">
                                <input type="datetime" name="timestamp" class="form-control"
                                value="<?php echo $list['timestamp']?>"></p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Baris 2 -->
                        <div class="row">
                          <!-- Tanggal Awal -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Tanggal Awal</label>
                              <div class="col-sm-9">
                                <input type="date" name="tanggal_awal" class="form-control" value="<?php echo $list['tanggal_awal']?>">
                              </div>
                            </div>
                          </div>
                          <!-- Tanggal Akhir -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Tanggal Akhir</label>
                              <div class="col-sm-9">
                                <input type="date" name="tanggal_akhir" class="form-control" value="<?php echo $list['tanggal_akhir']?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Baris 3 -->
                        <div class="row">                          
                          <!-- NIK -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">NIK</label>
                              <div class="col-sm-9">
                                <input type="text" id="nik" name="nik" onkeyup="isi_otomatis()" class="form-control" value="<?php echo $list['nik']?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Baris 4 -->
                        <div class="row">
                          <!-- Nama Tamu -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Tamu</label>
                              <div class="col-sm-9">
                                <input type="text" id="nama_tamu" name="nama_tamu" class="form-control" value="<?php echo $list['nama_tamu']?>">
                              </div>
                            </div>
                          </div>
                          <!-- Jenis Kelamin -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                              <div class="col-sm-9">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select" required>
                                  <option><?php echo $list['jenis_kelamin']?></option>
                                  <option value="pria">Pria</option>
                                  <option value="wanita">Wanita</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Baris 5 -->
                        <div class="row">
                          <!-- Kota -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Kota</label>
                              <div class="col-sm-9">
                                <input type="text" name="kota" id="kota" class="form-control" value="<?php echo $list['kota']?>">
                              </div>
                            </div>
                          </div>
                          <!-- Tanggal Lahir -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                              <div class="col-sm-9">
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?php echo $list['tanggal_lahir']?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Baris 6 -->
                        <div class="row">
                          <!-- Jabatan -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Jabatan</label>
                              <div class="col-sm-9">
                                <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?php echo $list['jabatan']?>">
                              </div>
                            </div>
                          </div>
                          <!-- Nama Kantor -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Kantor</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama_kantor" id="nama_kantor" class="form-control" value="<?php echo $list['nama_kantor']?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Baris 7 -->
                        <div class="row">
                          <!-- No HP -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nomor HP</label>
                              <div class="col-sm-9">
                                <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?php echo $list['no_hp']?>">
                              </div>
                            </div>
                          </div>
                          <!-- No Kamar -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nomor Kamar</label>
                              <div class="col-sm-9">
                                <input type="text" name="nomor_kamar" class="form-control" value="<?php echo $list['nomor_kamar']?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <p><input type="submit" value="Simpan" name="simpan" class="btn btn-primary col-md-4 align-self-center"></p>
                  </form>
                  
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript">
    function isi_otomatis(){
      var nik = $("#nik").val();
      $.ajax({
        url: 'ajax.php',
        data:"nik="+nik ,
      }).success(function (data) {
        var json = data,
        obj = JSON.parse(json);
        $('#nama_tamu').val(obj.nama_tamu);
        $('#jenis_kelamin').val(obj.jenis_kelamin);
        $('#tanggal_lahir').val(obj.tanggal_lahir);
        $('#kota').val(obj.kota);
        $('#jabatan').val(obj.jabatan);
        $('#nama_kantor').val(obj.nama_kantor);
        $('#no_hp').val(obj.no_hp);
      });
    }
  </script>
</body>

</html>

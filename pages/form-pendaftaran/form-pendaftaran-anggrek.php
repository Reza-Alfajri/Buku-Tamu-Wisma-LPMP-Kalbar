<?php
    //koneksi ke database
    include("../../koneksi.php");
    if (!isset($_GET['nomor_kamar'])) {
        //kalau tidak ada id di query string
        header('Location: ../../pages/list-kamar/list-kamar-handayani.php');
    }
    //ambil id dari query string
    $nomor_kamar = $_GET['nomor_kamar'];
    //buat query untuk ambil data dari database
    $sql = "SELECT * FROM anggrek WHERE nomor_kamar=$nomor_kamar";
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
  <title>Buku Tamu Anggrek</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="../../text/css" href="../../js/select.dataTables.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <a class="navbar-brand brand-logo ms-10" href="../../index.php"><img src="../../images/logo-lpmp.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../images/logo-lpmp-kecil.png" alt="logo"/></a>
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
                  <h2 class="font-weight-bold">Form pendaftaran Wisma Anggrek</h2>
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
                    <form action="../../proses-kamar-anggrek.php" method="POST">
                      <fieldset>
                        <!-- Baris 1 -->
                        <div class="row">
                          <!-- Nama Kegiatan -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Kegiatan</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama_kegiatan" class="form-control"></p>
                              </div>
                            </div>
                          </div>
                          <!-- Timestamp -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Timestamp</label>
                              <div class="col-sm-9">
                                <input type="datetime" name="timestamp" class="form-control"
                                value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y/m/d H:i:s"); ?>" readonly></p>
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
                                <input type="date" name="tanggal_awal" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <!-- Tanggal Akhir -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Tanggal Akhir</label>
                              <div class="col-sm-9">
                                <input type="date" name="tanggal_akhir" class="form-control" required>
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
                                <input type="text" id="nik" name="nik" onkeyup="isi_otomatis()" class="form-control" required>
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
                                <input type="text" id="nama_tamu" name="nama_tamu" class="form-control" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Jenis Kelamin -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                              <div class="col-sm-9">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select" required>
                                  <option value="">-- jenis kelamin --</option>
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
                                <input type="text" name="kota" id="kota" class="form-control" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Tanggal Lahir -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                              <div class="col-sm-9">
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" readonly>
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
                                <input type="text" name="jabatan" id="jabatan" class="form-control" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Nama Kantor -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Kantor</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama_kantor" id="nama_kantor" class="form-control" readonly>
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
                                <input type="text" name="no_hp" id="no_hp" class="form-control" readonly>
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

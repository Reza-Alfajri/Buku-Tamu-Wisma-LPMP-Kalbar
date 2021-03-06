<?php
    //Login
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../../login.php");
    }
    //koneksi ke database
    include("../../koneksi.php");
    if (!isset($_GET['nomor_kamar'])) {
        //kalau tidak ada id di query string
        header('Location: ../../pages/list-kamar/list-kamar-handayani.php');
    }
    //ambil id dari query string
    $nomor_kamar = $_GET['nomor_kamar'];
    //buat query untuk ambil data dari database
    $sql = "SELECT * FROM handayani WHERE nomor_kamar=$nomor_kamar";
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
  <title>Edit Data Tamu Wisma Handayani | LPMP Kalbar</title>
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
  <link rel="shortcut icon" href="../../images/logo-lpmp-kecil.png" />
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
            <a class="nav-link" data-toggle="collapse" href="#list-kamar" aria-expanded="true" aria-controls="list-kamar">
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
              $konten = '<li class="nav-item">
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
                  <h3 class="font-weight-bold text-md-left text-center">Form Edit Kamar Handayani</h3>
                </div>
              </div> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row mb-4 d-flex justify-content-center">
                    <div class="col-0 col-lg-9"></div>
                    <div class="col-8 col-lg-2 ml-md-4">
                      <h4 class="font-weight-bold shadow-md-none rounded shadow-sm card card-dark-blue p-md-2 p-3 text-center text-white">Kamar No. <?php echo $list['nomor_kamar']?></h4>
                    </div>
                  </div>
                  <?php if($list['nik'] && $list['nik2']) {?>
                    <form action="../../proses-edit-kamar-handayani.php" method="POST">
                      <fieldset>
                        <!-- Tamu 1 -->
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
                                value="<?php echo $list['timestamp']?>" readonly></p>
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
                                <input type="text" id="nik" name="nik" onkeyup="isi_otomatis()" class="form-control" value="<?php echo $list['nik']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- nuptk -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">NUPTK</label>
                              <div class="col-sm-9">
                                <input type="text" id="nuptk" name="nuptk" class="form-control" value="<?php echo $list['nuptk']?>" readonly>
                                <p> <i> -- isi jika ada -- </i> </p>
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
                                <input type="text" id="nama_tamu" name="nama_tamu" class="form-control" value="<?php echo $list['nama_tamu']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Jenis Kelamin -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                              <div class="col-sm-9">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select" disabled>
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
                                <input type="text" name="kota" id="kota" class="form-control" value="<?php echo $list['kota']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Tanggal Lahir -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                              <div class="col-sm-9">
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?php echo $list['tanggal_lahir']?>" readonly>
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
                                <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?php echo $list['jabatan']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Nama Kantor -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Instansi</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama_kantor" id="nama_kantor" class="form-control" value="<?php echo $list['nama_kantor']?>" readonly>
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
                                <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?php echo $list['no_hp']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- No Kamar -->
                          <div class="col-md-6 invisible">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nomor Kamar</label>
                              <div class="col-sm-9">
                                <input type="text" name="nomor_kamar" class="form-control" value="<?php echo $list['nomor_kamar']?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Tamu 2 -->
                        <hr>
                        <!-- Baris 1 -->
                        <div class="row mt-5">
                          <!-- Nama Kegiatan -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Kegiatan</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama_kegiatan2" class="form-control" value="<?php echo $list['nama_kegiatan2']?>"></p>
                              </div>
                            </div>
                          </div>
                          <!-- Timestamp -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Timestamp</label>
                              <div class="col-sm-9">
                                <input type="datetime" name="timestamp2" class="form-control"
                                value="<?php echo $list['timestamp2']?>" readonly></p>
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
                                <input type="date" name="tanggal_awal2" class="form-control" value="<?php echo $list['tanggal_awal2']?>">
                              </div>
                            </div>
                          </div>
                          <!-- Tanggal Akhir -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Tanggal Akhir</label>
                              <div class="col-sm-9">
                                <input type="date" name="tanggal_akhir2" class="form-control" value="<?php echo $list['tanggal_akhir2']?>">
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
                                <input type="text" id="nik2" name="nik2" onkeyup="isi_otomatis()" class="form-control" value="<?php echo $list['nik2']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- nuptk -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">NUPTK</label>
                              <div class="col-sm-9">
                                <input type="text" id="nuptk" name="nuptk" class="form-control" value="<?php echo $list['nuptk2']?>" readonly>
                                <p> <i> -- isi jika ada -- </i> </p>
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
                                <input type="text" id="nama_tamu2" name="nama_tamu2" class="form-control" value="<?php echo $list['nama_tamu2']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Jenis Kelamin -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                              <div class="col-sm-9">
                                <select name="jenis_kelamin2" id="jenis_kelamin2" class="custom-select" disabled>
                                  <option><?php echo $list['jenis_kelamin2']?></option>
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
                                <input type="text" name="kota2" id="kota2" class="form-control" value="<?php echo $list['kota2']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Tanggal Lahir -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                              <div class="col-sm-9">
                                <input type="date" name="tanggal_lahir2" id="tanggal_lahir2" class="form-control" value="<?php echo $list['tanggal_lahir2']?>" readonly>
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
                                <input type="text" name="jabatan2" id="jabatan2" class="form-control" value="<?php echo $list['jabatan2']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Nama Kantor -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Instansi</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama_kantor2" id="nama_kantor2" class="form-control" value="<?php echo $list['nama_kantor2']?>" readonly>
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
                                <input type="text" name="no_hp2" id="no_hp2" class="form-control" value="<?php echo $list['no_hp2']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- No Kamar -->
                          <div class="col-md-6 invisible">
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
                <!-- form nik 2 -->
                <?php } else if($list['nik2']) {?>
                  <form action="../../proses-edit-kamar-handayani.php" method="POST">
                      <fieldset>
                        <!-- Baris 1 -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Kegiatan</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama_kegiatan2" class="form-control" value="<?php echo $list['nama_kegiatan2']?>"></p>
                              </div>
                            </div>
                          </div>
                          <!-- Timestamp -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Timestamp</label>
                              <div class="col-sm-9">
                                <input type="datetime" name="timestamp2" class="form-control"
                                value="<?php echo $list['timestamp2']?>" readonly></p>
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
                                <input type="date" name="tanggal_awal2" class="form-control" value="<?php echo $list['tanggal_awal2']?>">
                              </div>
                            </div>
                          </div>
                          <!-- Tanggal Akhir -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Tanggal Akhir</label>
                              <div class="col-sm-9">
                                <input type="date" name="tanggal_akhir2" class="form-control" value="<?php echo $list['tanggal_akhir2']?>">
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
                                <input type="text" id="nik2" name="nik2" onkeyup="isi_otomatis()" class="form-control" value="<?php echo $list['nik2']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- nuptk -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">NUPTK</label>
                              <div class="col-sm-9">
                                <input type="text" id="nuptk" name="nuptk2" class="form-control" value="<?php echo $list['nuptk2']?>" readonly>
                                <p> <i> -- isi jika ada -- </i> </p>
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
                                <input type="text" id="nama_tamu2" name="nama_tamu2" class="form-control" value="<?php echo $list['nama_tamu2']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Jenis Kelamin -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                              <div class="col-sm-9">
                                <select name="jenis_kelamin2" id="jenis_kelamin2" class="custom-select" disabled>
                                  <option><?php echo $list['jenis_kelamin2']?></option>
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
                                <input type="text" name="kota2" id="kota2" class="form-control" value="<?php echo $list['kota2']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Tanggal Lahir -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                              <div class="col-sm-9">
                                <input type="date" name="tanggal_lahir2" id="tanggal_lahir2" class="form-control" value="<?php echo $list['tanggal_lahir2']?>" readonly>
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
                                <input type="text" name="jabatan2" id="jabatan2" class="form-control" value="<?php echo $list['jabatan2']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Nama Kantor -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Instansi</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama_kantor2" id="nama_kantor2" class="form-control" value="<?php echo $list['nama_kantor2']?>" readonly>
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
                                <input type="text" name="no_hp2" id="no_hp2" class="form-control" value="<?php echo $list['no_hp2']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- No Kamar -->
                          <div class="col-md-6 invisible">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nomor Kamar</label>
                              <div class="col-sm-9">
                                <input type="text" name="nomor_kamar2" class="form-control" value="<?php echo $list['nomor_kamar']?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <p><input type="submit" value="Simpan" name="simpan" class="btn btn-primary col-md-4 align-self-center"></p>
                  </form>
                <!-- form nik doang -->
                <?php } else {?>
                  <form action="../../proses-edit-kamar-handayani.php" method="POST">
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
                                value="<?php echo $list['timestamp']?>" readonly></p>
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
                                <input type="text" id="nik" name="nik" onkeyup="isi_otomatis()" class="form-control" value="<?php echo $list['nik']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- nuptk -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">NUPTK</label>
                              <div class="col-sm-9">
                                <input type="text" id="nuptk" name="nuptk" class="form-control" value="<?php echo $list['nuptk']?>" readonly>
                                <p> <i> -- isi jika ada -- </i> </p>
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
                                <input type="text" id="nama_tamu" name="nama_tamu" class="form-control" value="<?php echo $list['nama_tamu']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Jenis Kelamin -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                              <div class="col-sm-9">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select" disabled>
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
                                <input type="text" name="kota" id="kota" class="form-control" value="<?php echo $list['kota']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Tanggal Lahir -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                              <div class="col-sm-9">
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?php echo $list['tanggal_lahir']?>" readonly>
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
                                <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?php echo $list['jabatan']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- Nama Kantor -->
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Instansi</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama_kantor" id="nama_kantor" class="form-control" value="<?php echo $list['nama_kantor']?>" readonly>
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
                                <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?php echo $list['no_hp']?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- No Kamar -->
                          <div class="col-md-6 invisible">
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
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer" style="background-color: #09547d;">
          <div class="d-sm-flex justify-content-center justify-content-sm-between text-white">
            <span class=" text-center text-sm-left d-block d-sm-inline-block">Copyright ?? 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
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

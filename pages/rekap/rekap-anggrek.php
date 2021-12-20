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
  <title>Rekap Tamu Wisma</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="../../text/css" href="../../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/logo-lpmp-kecil.png">

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
            <a class="nav-link" href="../../index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <!-- Biodata -->
          <li class="nav-item">
            <a class="nav-link" href="../../pages/biodata/biodata-pengunjung.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Biodata Pengunjung</span>
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
                  <h3 class="font-weight-bold fs-30">Tabel Rekap Tamu Wisma Anggrek</h3>
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
                          <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                <th>Timestamp</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Nama Tamu</th>
                                <th>NIK</th>
                                <th>NUPTK</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Kabupaten / Kota</th>
                                <th>Jabatan</th>
                                <th>Nama Kantor</th>
                                <th>No. HP</th>
                                <th>Wisma</th>
                                <th>No. Kamar</th>
                                <th>Keterangan</th>
                                </tr>
                              </thead>
                              <tbody>
                                <!-- Search -->
                                <form method="GET" class="form-inline" action="">
                                  <div class="row">
                                    <!-- Bulan -->
                                    <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Bulan</label>
                                        <div class="col-sm-9">
                                          <select name="tanggal" class="custom-select" >
                                              <option value="0">Bulan</option>
                                              <option value="1">Januari</option>
                                              <option value="2">Februari</option>
                                              <option value="3">Maret</option>
                                              <option value="4">April</option>
                                              <option value="5">Mei</option>
                                              <option value="6">Juni</option>
                                              <option value="7">Juli</option>
                                              <option value="8">Agustus</option>
                                              <option value="9">September</option>
                                              <option value="10">Oktober</option>
                                              <option value="11">November</option>
                                              <option value="12">Desember</option>
                                            </select>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Tahun -->
                                    <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tahun</label>
                                        <div class="col-sm-9">
                                          <select name="tahun" class="custom-select" required="required">
                                            <option value="0">Tahun</option>
                                            <?php
                                              $mulai= date('Y') - 10;
                                              for($i = $mulai;$i<$mulai + 100;$i++){
                                                  $sel = $i == date('Y') ? : '';
                                                  echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                              }
                                            ?>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  <!-- Kegiatan -->
                                  
                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Kegiatan</label>
                                        <div class="col-sm-9">
                                          <select name="nama_kegiatan" class="custom-select" required="required">
                                            <option value="0">Kegiatan</option>
                                            <?php 
                                            $sql2 = "SELECT * FROM rekapan GROUP BY nama_kegiatan";
                                            $query2 = mysqli_query($db, $sql2);
                                            while($list2=mysqli_fetch_array($query2)) :                                    
                                            ?>
                                                <option value="<?=$list2['nama_kegiatan']?>"><?=$list2['nama_kegiatan']?></option> 
                                            <?php endwhile; ?>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                  <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button>
                                  <br>
                                  <br>
                                </form>
                                <?php
                                  $hal=1000;
                                  $page=isset($_GET['hal'])?(int)$_GET['hal']:1;
                                  $start=($page>1)?($page*$hal)-$hal:0;
                                  
                                  if(isset($_GET['tanggal'])){
                                    $date = $_GET['tanggal'];
                                    $tahun = $_GET['tahun'];
                                    $kegiatan = $_GET['nama_kegiatan'];
                                    if ($date > 0 && $tahun > 0 && $kegiatan > 0) {
                                        $nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                        echo "Rekap Tamu Wisma Untuk Kegiatan ".$kegiatan." Pada Bulan ".$nama_bulan[$date]." Tahun ".$tahun;
                                        $sql = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and MONTH(tanggal_awal) = '$date' and nama_kegiatan='$kegiatan' AND wisma='Anggrek'";
                                        $sql1 = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and MONTH(tanggal_awal) = '$date' and nama_kegiatan='$kegiatan' AND wisma='Anggrek' ORDER BY MONTH(tanggal_awal),YEAR(tanggal_awal) ASC limit $start,$hal";
                                        $bulanan = "SELECT nama_kegiatan as kegiatan,CONCAT(DAY(tanggal_awal),'/',MONTH(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE nama_kegiatan = '$kegiatan' and MONTH(tanggal_awal) = '$date' AND wisma='Anggrek' and YEAR(tanggal_awal) ='$tahun' GROUP BY YEARWEEK(nama_kegiatan),nama_kegiatan ,wisma";
                                        $jumlah = "SELECT nama_kegiatan as kegiatan,CONCAT(DAY(tanggal_awal),'/',MONTH(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE nama_kegiatan = '$kegiatan' and MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal),nama_kegiatan ,wisma";
                                    } elseif ($date > 0 && $tahun > 0) {
                                        $nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                        echo "Rekap Tamu Wisma Bulan ".$nama_bulan[$date]." Tahun ".$tahun;
                                        $sql = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek'";
                                        $sql1 = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' ORDER BY DAY(tanggal_awal) ASC limit $start,$hal";
                                        $bulanan = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal)";
                                        $jumlah = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal)";
                                    } elseif ($date > 0 && $kegiatan > 0) {
                                        $nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                        echo "Rekap Tamu Wisma Untuk Kegiatan ".$kegiatan." Pada Bulan ".$nama_bulan[$date];
                                        $sql = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and nama_kegiatan = '$kegiatan' AND wisma='Anggrek'";
                                        $sql1 = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and nama_kegiatan = '$kegiatan' AND wisma='Anggrek' ORDER BY DAY(tanggal_awal) ASC limit $start,$hal";
                                        $bulanan = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and nama_kegiatan='$kegiatan' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal)";
                                        $jumlah = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and nama_kegiatan='$kegiatan' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal)";
                                    } elseif ($tahun > 0 && $kegiatan > 0) {
                                        echo "Rekap Tamu Wisma Untuk Kegiatan ".$kegiatan." Pada Tahun ".$tahun;
                                        $sql = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and nama_kegiatan = '$kegiatan' AND wisma='Anggrek'";
                                        $sql1 = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and nama_kegiatan = '$kegiatan' AND wisma='Anggrek' ORDER BY MONTH(tanggal_awal) ASC limit $start,$hal";
                                        $bulanan = "SELECT wisma as wisma,CONCAT(MONTH(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and nama_kegiatan='$kegiatan' AND wisma='Anggrek' GROUP BY MONTH(tanggal_awal)";
                                        $jumlah = "SELECT wisma as wisma,CONCAT(MONTH(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and nama_kegiatan='$kegiatan' AND wisma='Anggrek' GROUP BY MONTH(tanggal_awal)";
                                    } elseif ($tahun > 0 ) {
                                        echo "Rekap Tamu Wisma Tahun ".$tahun;
                                        $sql = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek'";
                                        $sql1 = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' ORDER BY MONTH(tanggal_awal) ASC limit $start,$hal";
                                        $bulanan = "SELECT wisma as wisma,CONCAT(MONTH(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' GROUP BY MONTH(tanggal_awal)";
                                        $jumlah = "SELECT wisma as wisma,CONCAT(MONTH(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' GROUP BY MONTH(tanggal_awal)";
                                    } elseif ($date > 0 ){
                                        $nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                        echo "Rekap Tamu Wisma Bulan ".$nama_bulan[$date];
                                        $sql = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' AND wisma='Anggrek'";
                                        $sql1 = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' AND wisma='Anggrek' ORDER BY YEAR(tanggal_awal) asc limit $start,$hal";
                                        $bulanan = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal)";
                                        $jumlah = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal)";
                                    } elseif ($kegiatan > 0 ){
                                        echo "Rekap Tamu Wisma Untuk Kegiatan ".$kegiatan;
                                        $sql = "SELECT * FROM rekapan WHERE nama_kegiatan = '$kegiatan' AND wisma='Anggrek'";
                                        $sql1 = "SELECT * FROM rekapan WHERE nama_kegiatan = '$kegiatan' AND wisma='Anggrek' limit $start,$hal";
                                        $bulanan = "SELECT nama_kegiatan AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE nama_kegiatan = '$kegiatan'AND wisma='Anggrek' GROUP BY nama_kegiatan";
                                        $jumlah = "SELECT nama_kegiatan AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE nama_kegiatan = '$kegiatan' AND wisma='Anggrek' GROUP BY nama_kegiatan";
                                    } else {
                                        $sql = "SELECT * FROM rekapan WHERE wisma ='Anggrek' ORDER BY YEAR(tanggal_awal) ASC";
                                        $sql1 = "SELECT * FROM rekapan WHERE wisma ='Anggrek' ORDER BY YEAR(tanggal_awal) ASC limit $start,$hal";
                                        $bulanan = "SELECT CONCAT(MONTH(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan  WHERE wisma ='Anggrek' GROUP BY YEAR(tanggal_awal),MONTH(tanggal_awal)";
                                        $jumlah = "SELECT COUNT(*) AS jumlah_bulanan FROM rekapan WHERE wisma='Anggrek' GROUP BY YEAR(tanggal_awal),MONTH(tanggal_awal)";
                                    }
                                } else {
                                        $sql = "SELECT * FROM rekapan WHERE wisma ='Anggrek' ORDER BY YEAR(tanggal_awal) ASC";
                                        $sql1 = "SELECT * FROM rekapan WHERE wisma ='Anggrek' ORDER BY YEAR(tanggal_awal) ASC limit $start,$hal";
                                        $bulanan = "SELECT CONCAT(MONTH(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan  WHERE wisma ='Anggrek' GROUP BY YEAR(tanggal_awal),MONTH(tanggal_awal)";
                                        $jumlah = "SELECT COUNT(*) AS jumlah_bulanan FROM rekapan WHERE wisma='Anggrek' GROUP BY YEAR(tanggal_awal),MONTH(tanggal_awal)";
                                }
                                    $query = mysqli_query($db, $sql);
                                    $query1 = mysqli_query($db, $sql1);
                                    $total = mysqli_num_rows($query);
                                    $pages = ceil($total/$hal);
                                    $no = $start + 1;
                                    $qA = mysqli_query($db, $bulanan);
                                    $qA1 = mysqli_query($db, $jumlah);
                                ?>
                                <!-- End Search -->
                                <?php while($list=mysqli_fetch_array($query1)) : 
                                  //$no++; 
                                ?> 
                                <?php if($list['nik'] && $list['nik2']) {?>
                                  <tr class="alert" role="alert">
                                    <td><?= $list['timestamp']; ?></td>
                                    <td><?= $list['nama_kegiatan']; ?></td>
                                    <td><?= $list['tanggal_awal']; ?></td>
                                    <td><?= $list['tanggal_akhir']; ?></td>
                                    <td><?= $list['nama_tamu']; ?> <br> <hr> <?= $list['nama_tamu2']; ?> </td>
                                    <td><?= $list['nik']; ?> <br> <hr> <?= $list['nik2']; ?> </td>
                                    <td><?= $list['nuptk']; ?> <br> <hr> <?= $list['nuptk2']; ?> </td>
                                    <td><?= $list['jenis_kelamin']; ?> <br> <hr> <?= $list['jenis_kelamin2']; ?> </td>
                                    <td><?= $list['tanggal_lahir']; ?> <br> <hr> <?= $list['tanggal_lahir2']; ?> </td>
                                    <td><?= $list['kota']; ?> <br> <hr> <?= $list['kota2']; ?> </td>
                                    <td><?= $list['jabatan']; ?> <br> <hr> <?= $list['jabatan']; ?> </td>
                                    <td><?= $list['nama_kantor']; ?> <br> <hr> <?= $list['nama_kantor2']; ?> </td>
                                    <td><?= $list['no_hp']; ?> <br> <hr> <?= $list['no_hp2']; ?> </td>
                                    <td><?= $list['wisma']; ?></td>
                                    <td><?= $list['nomor_kamar']; ?></td>
                                    <td><?= $list['keterangan']; ?></td>
                                  </tr>
                                <?php } else {?>
                                <tr class="alert" role="alert">
                                    <td><?= $list['timestamp']; ?></td>
                                    <td><?= $list['nama_kegiatan']; ?></td>
                                    <td><?= $list['tanggal_awal']; ?></td>
                                    <td><?= $list['tanggal_akhir']; ?></td>
                                    <td><?= $list['nama_tamu']; ?></td>
                                    <td><?= $list['nik']; ?></td>
                                    <td><?= $list['nuptk']; ?></td>
                                    <td><?= $list['jenis_kelamin']; ?></td>
                                    <td><?= $list['tanggal_lahir']; ?></td>
                                    <td><?= $list['kota']; ?></td>
                                    <td><?= $list['jabatan']; ?></td>
                                    <td><?= $list['nama_kantor']; ?></td>
                                    <td><?= $list['no_hp']; ?></td>
                                    <td><?= $list['wisma']; ?></td>
                                    <td><?= $list['nomor_kamar']; ?></td>
                                    <td><?= $list['keterangan']; ?></td>
                                </tr>
                                <?php } ?>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <p>Total Data : <?= mysqli_num_rows($query); ?></p>
                        <a href="print-anggrek.php?">Cetak PDF</a>
                        </div>
                      </div>
                    </div>
                    <!-- End Tabel -->
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <canvas id="myChart"></canvas>
                  <script>
                      var ctx = document.getElementById("myChart");
                      var myChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                              labels: [<?php while ($b = mysqli_fetch_array($qA)) { echo '"' . $b['tahun_bulan'] . '",';}?>],
                              datasets: [{
                                      label: "Grafik",
                                      data: [<?php while ($b = mysqli_fetch_array($qA1)) { echo '"' . $b['jumlah_bulanan'] . '",';}?>],
                                      backgroundColor:
                                          'rgba(0,0,255,0.5)',
                                      borderColor: 
                                          'rgba(0,0,255,1)',
                                      borderWidth: 1
                                  }]
                          },
                          options: {
                              scales: {
                                  yAxes: [{
                                          ticks: {
                                              beginAtZero: true
                                          }
                                      }]
                              }
                          }
                      });
                  </script>
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
  <script src="../../js/Chart.bundle.js"></script>
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

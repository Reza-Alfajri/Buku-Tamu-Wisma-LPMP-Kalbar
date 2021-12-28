<html>
<head>
  <title>Rekap Tamu Wisma</title>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Poppins&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
  <style>
    body {
      font-family: 'PT Serif', serif;
      text-align: center;
    }
    table {
      border-collapse:collapse;
    }
    table td {
      word-wrap:break-word;
      font-size: 14px;
    }            
    @media print {
      @page {size: landscape}
               .noprint {
                  visibility: hidden;
               }
            }
    .kop {
      display: flex;
      justify-content: center;
      line-height: 10px;
      padding-top: 1rem;
    }
    .gambar {
      margin: 1rem;
      margin-top: 25px;
    }
    .diksi {
      text-align: center;
      margin-top: 1rem;
    }
    .diksi h3 {
      font-weight: bold;
    }
    h2 {
      font-weight: bold;
      margin: 3rem auto 2rem auto;
    }
  </style>
</head>
<body>
  <div class="kop">
    <div class="gambar">
      <img src="../../images/logo-kop.jpg" width="142px" alt="">
    </div>
    <div class="diksi">
      <h3>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h3>
      <h4>LEMBAGA PENJAMINAN MUTU PENDIDIKAN PROVINSI KALIMANTAN BARAT</h4>
      <p>Jalan Abdul Muis, Tanjung Hulu Pontianak Timur 78237</p>
      <p>Telepon (0561) 742110, Faksimile (0561) 746618</p>
      <p>Laman www.lpmp-kalbar.net, Posel mailbox@lpmp-kalbar.net</p>
    </div>
  </div>
  <hr style="height:4px; border:none; color:#333; background-color:#333; margin-bottom: 1.5rem;">
    
  <?php
  // Load file koneksi.php
  include "../../koneksi.php";
  ?>
  <table align="center" border="1" cellpadding="5">
      <tr>
        <th>Timestamp</th>
        <th>Nama Kegiatan</th>
        <th>Tanggal Awal</th>
        <th>Tanggal Akhir</th>
        <th>Nama Tamu</th>
        <th>NIK</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Kabupaten / Kota</th>
        <th>Jabatan</th>
        <th>Nama Intansi</th>
        <th>No. HP</th>
      </tr>
        
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
            ?><h2>Rekap Tamu Wisma Anggrek Bulan <?= $nama_bulan[$date] ?> Tahun <?= $tahun ?> Untuk Kegiatan <?= $kegiatan ?></h2>
            <?php 
            $sql = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and MONTH(tanggal_awal) = '$date' and nama_kegiatan='$kegiatan' AND wisma='Anggrek'";
            $sql1 = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and MONTH(tanggal_awal) = '$date' and nama_kegiatan='$kegiatan' AND wisma='Anggrek' ORDER BY MONTH(tanggal_awal),YEAR(tanggal_awal) ASC limit $start,$hal";
            $bulanan = "SELECT nama_kegiatan as kegiatan,CONCAT(DAY(tanggal_awal),'/',MONTH(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE nama_kegiatan = '$kegiatan' and MONTH(tanggal_awal) = '$date' AND wisma='Anggrek' and YEAR(tanggal_awal) ='$tahun' GROUP BY YEARWEEK(nama_kegiatan),nama_kegiatan ,wisma";
            $jumlah = "SELECT nama_kegiatan as kegiatan,CONCAT(DAY(tanggal_awal),'/',MONTH(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE nama_kegiatan = '$kegiatan' and MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal),nama_kegiatan ,wisma";
        } elseif ($date > 0 && $tahun > 0) {
            $nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
          ?><h2>Rekap Tamu Wisma Anggrek Bulan <?= $nama_bulan[$date] ?> Tahun <?= $tahun ?></h2>
          <?php 
            $sql = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek'";
            $sql1 = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' ORDER BY DAY(tanggal_awal) ASC limit $start,$hal";
            $bulanan = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal)";
            $jumlah = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal)";
        } elseif ($date > 0 && $kegiatan > 0) {
            $nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
          ?><h2>Rekap Tamu Wisma Anggrek Bulan <?= $nama_bulan[$date] ?> Untuk Kegiatan <?= $kegiatan ?></h2>
          <?php 
            $sql = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and nama_kegiatan = '$kegiatan' AND wisma='Anggrek'";
            $sql1 = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and nama_kegiatan = '$kegiatan' AND wisma='Anggrek' ORDER BY DAY(tanggal_awal) ASC limit $start,$hal";
            $bulanan = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and nama_kegiatan='$kegiatan' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal)";
            $jumlah = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and nama_kegiatan='$kegiatan' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal)";
        } elseif ($tahun > 0 && $kegiatan > 0) {
          ?><h2>Rekap Tamu Wisma Anggrek Tahun <?= $tahun ?> Untuk Kegiatan <?= $kegiatan ?></h2>
          <?php 
            $sql = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and nama_kegiatan = '$kegiatan' AND wisma='Anggrek'";
            $sql1 = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and nama_kegiatan = '$kegiatan' AND wisma='Anggrek' ORDER BY MONTH(tanggal_awal) ASC limit $start,$hal";
            $bulanan = "SELECT wisma as wisma,CONCAT(MONTH(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and nama_kegiatan='$kegiatan' AND wisma='Anggrek' GROUP BY MONTH(tanggal_awal)";
            $jumlah = "SELECT wisma as wisma,CONCAT(MONTH(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and nama_kegiatan='$kegiatan' AND wisma='Anggrek' GROUP BY MONTH(tanggal_awal)";
        } elseif ($tahun > 0 ) {
          ?><h2>Rekap Tamu Wisma Anggrek Tahun <?= $tahun ?></h2>
          <?php 
            $sql = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek'";
            $sql1 = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' ORDER BY MONTH(tanggal_awal) ASC limit $start,$hal";
            $bulanan = "SELECT wisma as wisma,CONCAT(MONTH(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' GROUP BY MONTH(tanggal_awal)";
            $jumlah = "SELECT wisma as wisma,CONCAT(MONTH(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' AND wisma='Anggrek' GROUP BY MONTH(tanggal_awal)";
        } elseif ($date > 0 ){
            $nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
            ?><h2>Rekap Tamu Wisma Anggrek Untuk Kegiatan <?= $nama_bulan[$date] ?></h2>
            <?php
            $sql = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' AND wisma='Anggrek'";
            $sql1 = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' AND wisma='Anggrek' ORDER BY YEAR(tanggal_awal) asc limit $start,$hal";
            $bulanan = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal)";
            $jumlah = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' AND wisma='Anggrek' GROUP BY YEARWEEK(tanggal_awal)";
        } elseif ($kegiatan > 0 ){
            ?><h2>Rekap Tamu Wisma Anggrek Untuk Kegiatan <?= $kegiatan ?></h2>
            <?php 
            $sql = "SELECT * FROM rekapan WHERE nama_kegiatan = '$kegiatan' AND wisma='Anggrek'";
            $sql1 = "SELECT * FROM rekapan WHERE nama_kegiatan = '$kegiatan' AND wisma='Anggrek' limit $start,$hal";
            $bulanan = "SELECT nama_kegiatan AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE nama_kegiatan = '$kegiatan'AND wisma='Anggrek' GROUP BY nama_kegiatan";
            $jumlah = "SELECT nama_kegiatan AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE nama_kegiatan = '$kegiatan' AND wisma='Anggrek' GROUP BY nama_kegiatan";
        } else {
            echo '<h2>Rekap Tamu Wisma Anggrek</h2>';
            $sql = "SELECT * FROM rekapan WHERE wisma ='Anggrek' ORDER BY YEAR(tanggal_awal) ASC";
            $sql1 = "SELECT * FROM rekapan WHERE wisma ='Anggrek' ORDER BY YEAR(tanggal_awal) ASC limit $start,$hal";
            $bulanan = "SELECT CONCAT(MONTH(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan  WHERE wisma ='Anggrek' GROUP BY YEAR(tanggal_awal),MONTH(tanggal_awal)";
            $jumlah = "SELECT COUNT(*) AS jumlah_bulanan FROM rekapan WHERE wisma='Anggrek' GROUP BY YEAR(tanggal_awal),MONTH(tanggal_awal)";
        }
      } else {
              echo '<h2>Rekap Tamu Wisma Anggrek</h2>';
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
      
      <?php while($list=mysqli_fetch_array($query)) : 
      //$no++; 
      ?> 
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
      </tr>
      <?php endwhile; ?> 
  </table>
  <br>
  <div class = "noprint">
  <form align="center" method="GET" class="form-inline" action="">
  <select name="tanggal" class="form-control">                                    
    <option value="">Bulan</option>
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
  <select name="tahun" class="custom-select">
    <option value="0">Tahun</option>
    <?php                                           
    $mulai= date('Y') - 10;
    for($i = $mulai;$i<$mulai + 100;$i++){                                                  
      $sel = $i == date('Y') ? : '';
      echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
    }                                        
    ?>
  </select>
  <select name="nama_kegiatan" class="custom-select">
    <option value="0">Kegiatan</option>
    <?php 
    $sql2 = "SELECT * FROM rekapan GROUP BY nama_kegiatan";
    $query2 = mysqli_query($db, $sql2);
    while($list2=mysqli_fetch_array($query2)) :                                    
    ?>
      <option value="<?=$list2['nama_kegiatan']?>"><?=$list2['nama_kegiatan']?></option> 
    <?php endwhile; ?>
  </select>
  <button>Search</button>
  
  </form>
  <form align="center">
  <button onclick=window.print()>Print</button>
  <input type="button" onclick="window.location.href = 'rekap-anggrek.php';" value="Back"/>
  </form>
  </div>
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
</body>
</html>

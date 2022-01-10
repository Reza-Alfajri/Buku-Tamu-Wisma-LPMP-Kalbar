<html>
<head>
  <title>Print Rekap Tamu Handayani | LPMP Kalbar</title>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Poppins&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../../images/logo-lpmp-kecil.png">
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
    .sign {
      display: flex;
      justify-content: end;
      margin-right: 15rem;
      margin-top: 6rem;
    }
    .foot {
      margin-top: 8rem;
      margin-right: 2.4rem;
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
      <p>Laman www.lpmp-kalbar.id, Posel mailbox@lpmp-kalbar.id</p>
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
        <th>NUPTK</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Kabupaten / Kota</th>
        <th>Jabatan</th>
        <th>Nama Instansi</th>
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
                ?><h2>Rekap Tamu Wisma Handayani Bulan <?= $nama_bulan[$date] ?> Tahun <?= $tahun ?> Untuk Kegiatan <?= $kegiatan ?></h2>
                <?php 
                $sql = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and MONTH(tanggal_awal) = '$date' and nama_kegiatan='$kegiatan' AND wisma='Handayani'";
                $sql1 = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and MONTH(tanggal_awal) = '$date' and nama_kegiatan='$kegiatan' AND wisma='Handayani' ORDER BY MONTH(tanggal_awal),YEAR(tanggal_awal) ASC limit $start,$hal";
                $bulanan = "SELECT nama_kegiatan as kegiatan,CONCAT(DAY(tanggal_awal),'/',MONTH(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE nama_kegiatan = '$kegiatan' and MONTH(tanggal_awal) = '$date' AND wisma='Handayani' and YEAR(tanggal_awal) ='$tahun' GROUP BY YEARWEEK(nama_kegiatan),nama_kegiatan ,wisma";
                $jumlah = "SELECT nama_kegiatan as kegiatan,CONCAT(DAY(tanggal_awal),'/',MONTH(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE nama_kegiatan = '$kegiatan' and MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Handayani' GROUP BY YEARWEEK(tanggal_awal),nama_kegiatan ,wisma";
            } elseif ($date > 0 && $tahun > 0) {
                $nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
              ?><h2>Rekap Tamu Wisma Handayani Bulan <?= $nama_bulan[$date] ?> Tahun <?= $tahun ?></h2>
              <?php 
                $sql = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Handayani'";
                $sql1 = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Handayani' ORDER BY DAY(tanggal_awal) ASC limit $start,$hal";
                $bulanan = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Handayani' GROUP BY YEARWEEK(tanggal_awal)";
                $jumlah = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and YEAR(tanggal_awal) = '$tahun' AND wisma='Handayani' GROUP BY YEARWEEK(tanggal_awal)";
            } elseif ($date > 0 && $kegiatan > 0) {
                $nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
              ?><h2>Rekap Tamu Wisma Handayani Bulan <?= $nama_bulan[$date] ?> Untuk Kegiatan <?= $kegiatan ?></h2>
              <?php 
                $sql = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and nama_kegiatan = '$kegiatan' AND wisma='Handayani'";
                $sql1 = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and nama_kegiatan = '$kegiatan' AND wisma='Handayani' ORDER BY DAY(tanggal_awal) ASC limit $start,$hal";
                $bulanan = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and nama_kegiatan='$kegiatan' AND wisma='Handayani' GROUP BY YEARWEEK(tanggal_awal)";
                $jumlah = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' and nama_kegiatan='$kegiatan' AND wisma='Handayani' GROUP BY YEARWEEK(tanggal_awal)";
            } elseif ($tahun > 0 && $kegiatan > 0) {
              ?><h2>Rekap Tamu Wisma Handayani Tahun <?= $tahun ?> Untuk Kegiatan <?= $kegiatan ?></h2>
              <?php 
                $sql = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and nama_kegiatan = '$kegiatan' AND wisma='Handayani'";
                $sql1 = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and nama_kegiatan = '$kegiatan' AND wisma='Handayani' ORDER BY MONTH(tanggal_awal) ASC limit $start,$hal";
                $bulanan = "SELECT wisma as wisma,CONCAT(MONTH(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and nama_kegiatan='$kegiatan' AND wisma='Handayani' GROUP BY MONTH(tanggal_awal)";
                $jumlah = "SELECT wisma as wisma,CONCAT(MONTH(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' and nama_kegiatan='$kegiatan' AND wisma='Handayani' GROUP BY MONTH(tanggal_awal)";
            } elseif ($tahun > 0 ) {
              ?><h2>Rekap Tamu Wisma Handayani Tahun <?= $tahun ?></h2>
              <?php 
                $sql = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' AND wisma='Handayani'";
                $sql1 = "SELECT * FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' AND wisma='Handayani' ORDER BY MONTH(tanggal_awal) ASC limit $start,$hal";
                $bulanan = "SELECT wisma as wisma,CONCAT(MONTH(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' AND wisma='Handayani' GROUP BY MONTH(tanggal_awal)";
                $jumlah = "SELECT wisma as wisma,CONCAT(MONTH(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE YEAR(tanggal_awal) = '$tahun' AND wisma='Handayani' GROUP BY MONTH(tanggal_awal)";
            } elseif ($date > 0 ){
                $nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                ?><h2>Rekap Tamu Wisma Handayani Untuk Kegiatan <?= $nama_bulan[$date] ?></h2>
                <?php
                $sql = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' AND wisma='Handayani'";
                $sql1 = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date' AND wisma='Handayani' ORDER BY YEAR(tanggal_awal) asc limit $start,$hal";
                $bulanan = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' AND wisma='Handayani' GROUP BY YEARWEEK(tanggal_awal)";
                $jumlah = "SELECT wisma as wisma,CONCAT(WEEK(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE MONTH(tanggal_awal) = '$date' AND wisma='Handayani' GROUP BY YEARWEEK(tanggal_awal)";
            } elseif ($kegiatan > 0 ){
                ?><h2>Rekap Tamu Wisma Handayani Untuk Kegiatan <?= $kegiatan ?></h2>
                <?php 
                $sql = "SELECT * FROM rekapan WHERE nama_kegiatan = '$kegiatan' AND wisma='Handayani'";
                $sql1 = "SELECT * FROM rekapan WHERE nama_kegiatan = '$kegiatan' AND wisma='Handayani' limit $start,$hal";
                $bulanan = "SELECT nama_kegiatan AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE nama_kegiatan = '$kegiatan'AND wisma='Handayani' GROUP BY nama_kegiatan";
                $jumlah = "SELECT nama_kegiatan AS tahun, COUNT(*) AS jumlah_bulanan FROM rekapan WHERE nama_kegiatan = '$kegiatan' AND wisma='Handayani' GROUP BY nama_kegiatan";
            } else {
                echo '<h2>Rekap Tamu Wisma Handayani</h2>';
                $sql = "SELECT * FROM rekapan WHERE wisma ='Handayani' ORDER BY YEAR(tanggal_awal) ASC";
                $sql1 = "SELECT * FROM rekapan WHERE wisma ='Handayani' ORDER BY YEAR(tanggal_awal) ASC limit $start,$hal";
                $bulanan = "SELECT CONCAT(MONTH(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan  WHERE wisma ='Handayani' GROUP BY YEAR(tanggal_awal),MONTH(tanggal_awal)";
                $jumlah = "SELECT COUNT(*) AS jumlah_bulanan FROM rekapan WHERE wisma='Handayani' GROUP BY YEAR(tanggal_awal),MONTH(tanggal_awal)";
            }
        } else {
                echo '<h2>Rekap Tamu Wisma Handayani</h2>';
                $sql = "SELECT * FROM rekapan WHERE wisma ='Handayani' ORDER BY YEAR(tanggal_awal) ASC";
                $sql1 = "SELECT * FROM rekapan WHERE wisma ='Handayani' ORDER BY YEAR(tanggal_awal) ASC limit $start,$hal";
                $bulanan = "SELECT CONCAT(MONTH(tanggal_awal),'/',YEAR(tanggal_awal)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM rekapan  WHERE wisma ='Handayani' GROUP BY YEAR(tanggal_awal),MONTH(tanggal_awal)";
                $jumlah = "SELECT COUNT(*) AS jumlah_bulanan FROM rekapan WHERE wisma='Handayani' GROUP BY YEAR(tanggal_awal),MONTH(tanggal_awal)";
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
  <div class="sign">
    <div class="content">
    <div class="head">
      <p>Pontianak, 
        <!-- <?php
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
          
        ?> -->
        </p>
      </div>
      <div class="foot">
        <p>NIP : </p>
      </div>
    </div>
    
  </div>
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
  <input type="button" onclick="window.location.href = 'rekap-handayani.php';" value="Back"/>
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
                  <script type="text/javascript">        
        function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
            var waktu = new Date();            //membuat object date berdasarkan waktu saat 
            var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
            var sm = waktu.getMinutes() + "";  //memunculkan nilai detik    
            var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
            document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
        }
    </script>
</body>
</html>

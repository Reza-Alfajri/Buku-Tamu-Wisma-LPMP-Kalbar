<html>
<head>
  <title>Rekap Tamu Wisma</title>
  <style>
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
  </style>
</head>
<body>
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
        <th>Nama Kantor</th>
        <th>No. HP</th>
        <th>Wisma</th>
      </tr>
        
      <?php
       if(isset($_GET['tanggal'])){
        $date = $_GET['tanggal'];
        $nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        echo "<center>Rekap Tamu Wisma Bulan ".$nama_bulan[$date];;
        $sql = "SELECT * FROM rekapan WHERE MONTH(tanggal_awal) = '$date'";
      } else {
        $sql = "SELECT * FROM rekapan"; 
      }
        $query = mysqli_query($db, $sql);
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
        <td><?= $list['jenis_kelamin']; ?></td>
        <td><?= $list['tanggal_lahir']; ?></td>
        <td><?= $list['kota']; ?></td>
        <td><?= $list['jabatan']; ?></td>
        <td><?= $list['nama_kantor']; ?></td>
        <td><?= $list['no_hp']; ?></td>
        <td><?= $list['wisma']; ?></td>
      </tr>
      <?php endwhile; ?> 
  </table>
  <br>
  <div class = "noprint">
  <form align="center" method="GET" class="form-inline" action="">
  <select name="tanggal" class="form-control" required="required">                                    
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
  <button>Search</button>
  
  </form>
  <form align="center">
  <button onclick=window.print()>Print</button>
  <input type="button" onclick="window.location.href = 'rekapan.php';" value="Back"/>
  </form>
  </div>
</body>
</html>

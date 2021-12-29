<html>
<head>
<!-- sweet alert --> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
<body>
<?php
    include("koneksi.php");
    //pengecekan
    if(isset($_GET['nomor_kamar1'])){
        //ambil data dari formulir
        $nomor_kamar = $_GET['nomor_kamar1'];
        $sql2 = "SELECT * FROM handayani WHERE nomor_kamar=$nomor_kamar";
        $query2 = mysqli_query($db, $sql2);
        $list2 = mysqli_fetch_assoc($query2);
        $nik = $list2['nik'];
        $timestampcari= $list2['timestamp'];
        $timestamp = "";
        $nama_kegiatan = "";
        $tanggal_awal = "";
        $tanggal_akhir = "";
        $nuptk = "";
        $jenis_kelamin = "";
        $tanggal_lahir = "";
        $nama_tamu = "";
        $kota = "";
        $jabatan = "";
        $nama_kantor = "";
        $no_hp = "";
        $keterangan = "Check Out";

        //buat query update
        $sql1 = "UPDATE rekapan SET keterangan='$keterangan' where nik='$nik' AND timestamp='$timestampcari'";
        $sql = "UPDATE handayani SET timestamp='$timestamp', nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir',
        nik='', nuptk='$nuptk', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu', kota='$kota', 
        jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nomor_kamar='$nomor_kamar'";

        $query1 = mysqli_query($db, $sql1);
        $query = mysqli_query($db, $sql);
        
        //apakah query berhasil tersimpan
        if( $query && $query1 ){
            echo '
            <script language="javascript">
                Swal.fire({
                    title: "Berhasil Check Out!",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href="pages/list-kamar/list-kamar-handayani.php"
                    }
                }); 
            </script>';
        } else {
            echo '
            <script language="javascript">
                Swal.fire({
                    title: "Gagal Menyimpan!",
                    icon: "warning",
                    confirmButtonText: "Back",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back();
                    }
                }); 
            </script>';
        }
    } else if(isset($_GET['nomor_kamar2'])) {
        //ambil data dari formulir
        $nomor_kamar = $_GET['nomor_kamar2'];
        $sql2 = "SELECT * FROM handayani WHERE nomor_kamar=$nomor_kamar";
        $query2 = mysqli_query($db, $sql2);
        $list2 = mysqli_fetch_assoc($query2);
        $nik = $list2['nik2'];
        $timestampcari= $list2['timestamp2'];
        $timestamp = "";
        $nama_kegiatan = "";
        $tanggal_awal = "";
        $tanggal_akhir = "";
        $nuptk = "";
        $jenis_kelamin = "";
        $tanggal_lahir = "";
        $nama_tamu = "";
        $kota = "";
        $jabatan = "";
        $nama_kantor = "";
        $no_hp = "";
        $keterangan = "Check Out";


        //buat query update
        $sql1 = "UPDATE rekapan SET keterangan='$keterangan' where nik='$nik' AND timestamp='$timestampcari'";
        $sql = "UPDATE handayani SET timestamp2='$timestamp', nama_kegiatan2='$nama_kegiatan', tanggal_awal2='$tanggal_awal', tanggal_akhir2='$tanggal_akhir',
        nik2='', nuptk2='$nuptk', jenis_kelamin2='$jenis_kelamin', tanggal_lahir2='$tanggal_lahir', nama_tamu2='$nama_tamu', kota2='$kota', 
        jabatan2='$jabatan', nama_kantor2='$nama_kantor', no_hp2='$no_hp' WHERE nomor_kamar='$nomor_kamar'";

        $query1 = mysqli_query($db, $sql1);
        $query = mysqli_query($db, $sql);
        
        //apakah query berhasil tersimpan
        if( $query && $query1 ){
            echo '
            <script language="javascript">
                Swal.fire({
                    title: "Berhasil Check Out!",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href="pages/list-kamar/list-kamar-handayani.php"
                    }
                }); 
            </script>';
        } else {
            echo '
            <script language="javascript">
                Swal.fire({
                    title: "Gagal Menyimpan!",
                    icon: "warning",
                    confirmButtonText: "Back",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back();
                    }
                }); 
            </script>';
        }
    } else if(isset($_GET['nomor_kamar'])) {
        //ambil data dari formulir
        $nomor_kamar = $_GET['nomor_kamar'];
        $sql2 = "SELECT * FROM handayani WHERE nomor_kamar=$nomor_kamar";
        $query2 = mysqli_query($db, $sql2);
        $list2 = mysqli_fetch_assoc($query2);
        $timestamp = "";
        $nama_kegiatan = "";
        $tanggal_awal = "";
        $tanggal_akhir = "";
        $statusco = "kosong";
        $nik = $list2['nik'];
        $nik2 = $list2['nik2'];
        $timestampcari= $list2['timestamp'];
        $timestampcari2= $list2['timestamp2'];
        $nuptk = "";
        $jenis_kelamin = "";
        $tanggal_lahir = "";
        $nama_tamu = "";
        $kota = "";
        $jabatan = "";
        $nama_kantor = "";
        $no_hp = "";
        $keterangan = "Check Out";

        //buat query update
        $sql1 = "UPDATE rekapan SET keterangan='$keterangan' where nik='$nik' AND timestamp='$timestampcari'";
        $sql3 = "UPDATE rekapan SET keterangan='$keterangan' where nik='$nik2' AND timestamp='$timestampcari2'";
        $sql = "UPDATE handayani SET timestamp='$timestamp', nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir',
        nik='', nuptk='$nuptk', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu', statusco='$statusco', kota='$kota', 
        jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp',
        timestamp2='$timestamp', nama_kegiatan2='$nama_kegiatan', tanggal_awal2='$tanggal_awal', tanggal_akhir2='$tanggal_akhir',
        nik2='', nuptk2='$nuptk', jenis_kelamin2='$jenis_kelamin', tanggal_lahir2='$tanggal_lahir', nama_tamu2='$nama_tamu', kota2='$kota', 
        jabatan2='$jabatan', nama_kantor2='$nama_kantor', no_hp2='$no_hp' WHERE nomor_kamar='$nomor_kamar'";

        $query1 = mysqli_query($db, $sql1);
        $query = mysqli_query($db, $sql);
        $query3 = mysqli_query($db, $sql3);
        //apakah query berhasil tersimpan
        if( $query && $query1 || $query3 ){
            echo '
            <script language="javascript">
                Swal.fire({
                    title: "Berhasil Check Out!",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href="pages/list-kamar/list-kamar-handayani.php"
                    }
                }); 
            </script>';
        } else {
            echo '
            <script language="javascript">
                Swal.fire({
                    title: "Gagal Menyimpan!",
                    icon: "warning",
                    confirmButtonText: "Back",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back();
                    }
                }); 
            </script>';
        }
    } else {
        die("Akses dilarang ...");
    }
?>
</body>
</html>

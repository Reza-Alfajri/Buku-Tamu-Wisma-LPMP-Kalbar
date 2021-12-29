<html>
<head>
<!-- sweet alert --> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
<body>
<?php
    include("koneksi.php");
    //pengecekan
    if(isset($_POST['simpan'])){
        //ambil data dari formulir
        if(isset($_POST['nik2']) && isset($_POST['nik2'])){
            $nomor_kamar = $_POST['nomor_kamar'];     
            $nik = $_POST['nik'];
            $timestamp = $_POST['timestamp'];
            $nama_kegiatan = $_POST['nama_kegiatan'];
            $tanggal_awal = $_POST['tanggal_awal'];
            $tanggal_akhir = $_POST['tanggal_akhir'];
            $wisma = "Anggrek";
            $nik2 = $_POST['nik2'];  
            $timestamp2 = $_POST['timestamp2'];
            $nama_kegiatan2 = $_POST['nama_kegiatan2'];
            $tanggal_awal2 = $_POST['tanggal_awal2'];
            $tanggal_akhir2 = $_POST['tanggal_akhir2'];
        } else if(isset($_POST['nik2'])){
            $nomor_kamar = $_POST['nomor_kamar']; 
            $wisma = "Anggrek";
            $nik2 = $_POST['nik2'];  
            $timestamp2 = $_POST['timestamp2'];
            $nama_kegiatan2 = $_POST['nama_kegiatan2'];
            $tanggal_awal2 = $_POST['tanggal_awal2'];
            $tanggal_akhir2 = $_POST['tanggal_akhir2'];
        } else {
            $nomor_kamar = $_POST['nomor_kamar'];     
            $nik = $_POST['nik'];
            $timestamp = $_POST['timestamp'];
            $nama_kegiatan = $_POST['nama_kegiatan'];
            $tanggal_awal = $_POST['tanggal_awal'];
            $tanggal_akhir = $_POST['tanggal_akhir'];
            $wisma = "Anggrek";
        }
        
        //buat query update
        if(isset($_POST['nik']) && isset($_POST['nik2'])){
            $sql1 = "UPDATE anggrek SET nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir' ,
                    nama_kegiatan2='$nama_kegiatan2', tanggal_awal2='$tanggal_awal2', tanggal_akhir2='$tanggal_akhir2'
                    WHERE nomor_kamar='$nomor_kamar'";
        } else if(isset($_POST['nik2'])){
            $sql1 = "UPDATE anggrek SET nama_kegiatan2='$nama_kegiatan2', tanggal_awal2='$tanggal_awal2', tanggal_akhir2='$tanggal_akhir2' WHERE nomor_kamar='$nomor_kamar'";
        } else {
            $sql1 = "UPDATE anggrek SET nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir' WHERE nomor_kamar='$nomor_kamar'";
        }
        
        if(isset($_POST['nik']) && isset($_POST['nik2'])){
            $sql2 = "UPDATE rekapan SET nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir', nomor_kamar='$nomor_kamar'
                    WHERE timestamp='$timestamp' AND nik='$nik' AND nomor_kamar='$nomor_kamar'";
            $sql3 = "UPDATE rekapan SET nama_kegiatan='$nama_kegiatan2', tanggal_awal='$tanggal_awal2', tanggal_akhir='$tanggal_akhir2', nomor_kamar='$nomor_kamar'
                    WHERE timestamp='$timestamp2' AND nik='$nik2' AND nomor_kamar='$nomor_kamar'";
            $query3 = mysqli_query($db, $sql3);
        } else if(isset($_POST['nik2'])){
            $sql2 = "UPDATE rekapan SET nama_kegiatan='$nama_kegiatan2', tanggal_awal='$tanggal_awal2', tanggal_akhir='$tanggal_akhir2', nomor_kamar='$nomor_kamar'
                    WHERE timestamp='$timestamp2' AND nik='$nik2' AND nomor_kamar='$nomor_kamar'";
        } else {
            $sql2 = "UPDATE rekapan SET nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir', nomor_kamar='$nomor_kamar' 
            WHERE timestamp='$timestamp' AND nik='$nik' AND nomor_kamar='$nomor_kamar'";
        }
        
        $query1 = mysqli_query($db, $sql1);
        $query2 = mysqli_query($db, $sql2);
        //apakah query berhasil tersimpan
        if( $query1 && $query2 || $query3 ){
            echo '
            <script language="javascript">
                Swal.fire({
                    title: "Berhasil Check Out!",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href="pages/list-kamar/list-kamar-anggrek.php"
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

<html>
<head>
<!-- sweet alert --> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<!-- end sweet alert -->
<style>
    .swal2-popup {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
</style>
</head>
<body>
<?php
    include("koneksi.php");
    //pengecekan
    if(isset($_POST['simpan'])){
        //ambil data dari formulir
        $nomor_kamar = $_POST['nomor_kamar'];
        $kosong="";
        $timestamp = $_POST['timestamp'];
        $nama_kegiatan = $_POST['nama_kegiatan'];
        $tanggal_awal = $_POST['tanggal_awal'];
        $tanggal_akhir = $_POST['tanggal_akhir'];
        $nama_tamu = $_POST['nama_tamu'];
        $nik = $_POST['nik'];
        $nuptk = $_POST['nuptk'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tanggal_lahir = $_POST['tanggal_lahir']; 
        $kota = $_POST['kota'];
        $jabatan = $_POST['jabatan'];
        $nama_kantor = $_POST['nama_kantor'];
        $no_hp = $_POST['no_hp'];
        $wisma = "Handayani";
        
        //buat query update
        $sql0 = "INSERT INTO rekapan (timestamp, nama_kegiatan, tanggal_awal, tanggal_akhir, 
                nama_tamu, nik, nuptk, jenis_kelamin, tanggal_lahir, kota, jabatan, nama_kantor, no_hp,  
                wisma, nomor_kamar)
                VALUE ('$timestamp', '$nama_kegiatan', '$tanggal_awal', '$tanggal_akhir', 
                '$nama_tamu', '$nik', '$nuptk', '$jenis_kelamin', '$tanggal_lahir', '$kota', '$jabatan', '$nama_kantor', '$no_hp', 
                '$wisma', '$nomor_kamar')";

        $tamu1 = "SELECT * FROM handayani WHERE nama_tamu='$kosong' and nik='$kosong' and nomor_kamar='$nomor_kamar'";
        if($tamu1){
            $sql1 = "UPDATE handayani SET timestamp='$timestamp', nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir',
            nik='$nik', nuptk='$nuptk', nama_tamu='$nama_tamu', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', kota='$kota', jabatan='$jabatan', 
            nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$kosong' AND nomor_kamar='$nomor_kamar'";
            $query1 = mysqli_query($db, $sql1);
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
        
        $tamu2 = "SELECT * FROM handayani WHERE nama_tamu2='$kosong' and nik2='$kosong' and nomor_kamar='$nomor_kamar'";
        if($tamu2){
            $sql2 = "UPDATE handayani SET timestamp2='$timestamp', nama_kegiatan2='$nama_kegiatan', tanggal_awal2='$tanggal_awal', tanggal_akhir2='$tanggal_akhir',
            nik2='$nik', nuptk2='$nuptk', nama_tamu2='$nama_tamu', jenis_kelamin2='$jenis_kelamin', tanggal_lahir2='$tanggal_lahir', kota2='$kota', jabatan2='$jabatan', 
            nama_kantor2='$nama_kantor', no_hp2='$no_hp' WHERE nik2='$kosong' AND nomor_kamar='$nomor_kamar'";
            $query2 = mysqli_query($db, $sql2);
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

        $query0 = mysqli_query($db, $sql0);
        
        if( $query0 && $query1 || $query2){
            echo '
                <script language="javascript">
                    Swal.fire({
                        title: "Berhasil Disimpan!",
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

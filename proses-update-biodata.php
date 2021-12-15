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
        $nama_tamu = $_POST['nama_tamu'];
        $nik = $_POST['nik'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $kota = $_POST['kota'];
        $jabatan = $_POST['jabatan'];
        $nama_kantor = $_POST['nama_kantor'];
        $no_hp = $_POST['no_hp'];
        
        //buat query update
        $sql1 = "INSERT INTO biodata (nama_tamu, nik, jenis_kelamin, kota, tanggal_lahir, jabatan, nama_kantor, no_hp)
        VALUE ('$nama_tamu', '$nik', '$jenis_kelamin', '$kota', '$tanggal_lahir', '$jabatan', '$nama_kantor', '$no_hp')";
        $query1 = mysqli_query($db, $sql1);
        if( $query1 ){
            echo'<script language="javascript">
                Swal.fire({
                    title: "Berhasil Disimpan",
                    icon: "success",
                    confirmButtonText: "OK",
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href="pages/biodata/biodata-pengunjung.php";
                    }
                  }); 
                </script>';
        } else {
            echo'<script language="javascript">
                Swal.fire({
                    title: "NIK sudah terdaftar!",
                    icon: "warning",
                    confirmButtonText: "OK",
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

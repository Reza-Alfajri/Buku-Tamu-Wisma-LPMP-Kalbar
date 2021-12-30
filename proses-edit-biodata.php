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
        $nik = $_POST['nik'];
        $nuptk = $_POST['nuptk'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $nama_tamu = $_POST['nama_tamu'];
        $kota = $_POST['kota'];
        $jabatan = $_POST['jabatan'];
        $nama_kantor = $_POST['nama_kantor'];
        $no_hp = $_POST['no_hp'];
        
        //buat query update
        $sql1 = "UPDATE biodata SET nik='$nik', nuptk='$nuptk', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu',
        kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik' or nama_tamu='$nama_tamu'";

        $sql2 = "UPDATE rekapan SET nik='$nik', nuptk='$nuptk', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu',
        kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik' or nama_tamu='$nama_tamu'";

        $sql5 = "SELECT * FROM anggrek WHERE nik2=$nik or nama_tamu2='$nama_tamu'";
        $query5 = mysqli_query($db, $sql5);
        if($query5 ) {
            $sql3 = "UPDATE anggrek SET nik2='$nik', nuptk2='$nuptk', jenis_kelamin2='$jenis_kelamin', tanggal_lahir2='$tanggal_lahir', nama_tamu2='$nama_tamu',
            kota2='$kota', jabatan2='$jabatan', nama_kantor2='$nama_kantor', no_hp2='$no_hp' WHERE nik2='$nik' or nama_tamu2='$nama_tamu'";
            $query3 = mysqli_query($db, $sql3);
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
        
        $sql6 = "SELECT * FROM anggrek WHERE nik=$nik or nama_tamu='$nama_tamu'";
        $query6 = mysqli_query($db, $sql6);
        if($query6) {
            $sql3 = "UPDATE anggrek SET nik='$nik', nuptk='$nuptk', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu',
            kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik' or nama_tamu='$nama_tamu'";
            $query3 = mysqli_query($db, $sql3);
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

        $sql7 = "SELECT * FROM handayani WHERE nik2=$nik or nama_tamu2='$nama_tamu'";
        $query7 = mysqli_query($db, $sql7);
        if($query7 ) {
            $sql4 = "UPDATE handayani SET nik2='$nik', nuptk2='$nuptk', jenis_kelamin2='$jenis_kelamin', tanggal_lahir2='$tanggal_lahir', nama_tamu2='$nama_tamu',
            kota2='$kota', jabatan2='$jabatan', nama_kantor2='$nama_kantor', no_hp2='$no_hp' WHERE nik2='$nik' or nama_tamu2='$nama_tamu'";
            $query4 = mysqli_query($db, $sql4);
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
        
        $sql8 = "SELECT * FROM handayani WHERE nik=$nik or nama_tamu='$nama_tamu'";
        $query8 = mysqli_query($db, $sql8);
        if($query8) {
            $sql4 = "UPDATE handayani SET nik='$nik', nuptk='$nuptk', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu',
            kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik' or nama_tamu='$nama_tamu'";
            $query4 = mysqli_query($db, $sql4);
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

        $query1 = mysqli_query($db, $sql1);
        $query2 = mysqli_query($db, $sql2);
        //apakah query berhasil tersimpan
        if( $query1 && $query2 && $query3 || $query4 ){
            echo '
            <script language="javascript">
                Swal.fire({
                    title: "Data Berhasil Disimpan!",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href="pages/biodata/biodata-pengunjung.php"
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

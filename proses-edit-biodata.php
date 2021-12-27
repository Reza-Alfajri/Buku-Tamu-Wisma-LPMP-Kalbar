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
        kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik' or nama_tamu='$nama_tamu' or nuptk='$nuptk'";

        $sql2 = "UPDATE rekapan SET nik='$nik', nuptk='$nuptk', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu',
        kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik' or nama_tamu='$nama_tamu' or nuptk='$nuptk'";

        $sq15 = "SELECT * FROM anggrek WHERE nik2=$nik or nama_tamu2='$nama_tamu' or nuptk2='$nuptk'";
        if($sql5) {
            $sql3 = "UPDATE anggrek SET nik2='$nik', nuptk2='$nuptk', jenis_kelamin2='$jenis_kelamin', tanggal_lahir2='$tanggal_lahir', nama_tamu2='$nama_tamu',
            kota2='$kota', jabatan2='$jabatan', nama_kantor2='$nama_kantor', no_hp2='$no_hp' WHERE nik2='$nik' or nama_tamu2='$nama_tamu' or nuptk2='$nuptk'";
        } else {
            $sql3 = "UPDATE anggrek SET nik='$nik', nuptk='$nuptk', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu',
            kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik' or nama_tamu='$nama_tamu' or nuptk='$nuptk'";
        }

        $sq16 = "SELECT * FROM handayani WHERE nik2=$nik or nama_tamu2='$nama_tamu' or nuptk2='$nuptk'";
        if($sq16) {
            $sql4 = "UPDATE handayani SET nik2='$nik', nuptk2='$nuptk', jenis_kelamin2='$jenis_kelamin', tanggal_lahir2='$tanggal_lahir', nama_tamu2='$nama_tamu',
            kota2='$kota', jabatan2='$jabatan', nama_kantor2='$nama_kantor', no_hp2='$no_hp' WHERE nik2='$nik' or nama_tamu2='$nama_tamu' or nuptk2='$nuptk'";
        } else {
            $sql4 = "UPDATE handayani SET nik='$nik', nuptk='$nuptk', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu',
            kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik' or nama_tamu='$nama_tamu' or nuptk='$nuptk'";
        }

        $query1 = mysqli_query($db, $sql1);
        $query2 = mysqli_query($db, $sql2);
        $query3 = mysqli_query($db, $sql3);
        $query4 = mysqli_query($db, $sql4);
        //apakah query berhasil tersimpan
        if( $query1 && $query2 && $query3 && $query4 ){
            header('Location: pages/biodata/biodata-pengunjung.php');
        } else {
            die("Gagal menyimpan perubahan ...");
        }
    } else {
        die("Akses dilarang ...");
    }
?>

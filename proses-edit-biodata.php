<?php
    include("koneksi.php");
    //pengecekan
    if(isset($_POST['simpan'])){
        //ambil data dari formulir
        $nik = $_POST['nik'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $nama_tamu = $_POST['nama_tamu'];
        $kota = $_POST['kota'];
        $jabatan = $_POST['jabatan'];
        $nama_kantor = $_POST['nama_kantor'];
        $no_hp = $_POST['no_hp'];
        
        //buat query update
        $sql1 = "UPDATE biodata SET nik='$nik', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu',
        kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik'";
        $sql2 = "UPDATE rekapan SET nik='$nik', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu',
        kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik'";
        $sql3 = "UPDATE anggrek SET nik='$nik', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu',
        kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik'";
        $sql4 = "UPDATE handayani SET nik='$nik', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu',
        kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik'";
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
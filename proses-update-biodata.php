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
            header('Location: pages/list-kamar/list-kamar-handayani.php');
        } else {
            die("Gagal menyimpan perubahan ...");
        }
    } else {
        die("Akses dilarang ...");
    }
?>
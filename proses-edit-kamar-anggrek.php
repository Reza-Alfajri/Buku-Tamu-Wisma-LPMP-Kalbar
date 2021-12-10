<?php
    include("koneksi.php");
    //pengecekan
    if(isset($_POST['simpan'])){
        //ambil data dari formulir
        $nomor_kamar = $_POST['nomor_kamar'];
        $nik = $_POST['nik'];
        $nama_kegiatan = $_POST['nama_kegiatan'];
        $tanggal_awal = $_POST['tanggal_awal'];
        $tanggal_akhir = $_POST['tanggal_akhir'];
        $wisma = "Anggrek";
        
        //buat query update
        $sql1 = "UPDATE anggrek SET nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir' WHERE nomor_kamar='$nomor_kamar'";
        $sql2 = "UPDATE rekapan SET nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir', nomor_kamar='$nomor_kamar' WHERE nik='$nik'";
        
        $query1 = mysqli_query($db, $sql1);
        $query2 = mysqli_query($db, $sql2);
        //apakah query berhasil tersimpan
        if( $query1 && $query2 ){
            header('Location: pages/list-kamar/list-kamar-anggrek.php');
        } else {
            die("Gagal menyimpan perubahan ...");
        }
    } else {
        die("Akses dilarang ...");
    }
?>

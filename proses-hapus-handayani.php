<?php
    include("koneksi.php");
    //pengecekan
    if(isset($_GET['nomor_kamar'])){
        //ambil data dari formulir
        $nomor_kamar = $_GET['nomor_kamar'];
        $timestamp = "";
        $nama_kegiatan = "";
        $tanggal_awal = "";
        $tanggal_akhir = "";
        $nik = "";
        $jenis_kelamin = "";
        $tanggal_lahir = "";
        $nama_tamu = "";
        $statusco = "kosong";
        $kota = "";
        $jabatan = "";
        $nama_kantor = "";
        $no_hp = "";
        
        //buat query update
        $sql = "UPDATE handayani SET timestamp='$timestamp', nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir',
        nik='$nik', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu', statusco='$statusco', kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nomor_kamar='$nomor_kamar'";
        $query = mysqli_query($db, $sql);
        //apakah query berhasil tersimpan
        if( $query ){
            header('Location: pages/list-kamar/list-kamar-handayani.php');
        } else {
            die("Gagal menyimpan perubahan ...");
        }
    } else {
        die("Akses dilarang ...");
    }
?>
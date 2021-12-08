<?php
    include("koneksi.php");
    //pengecekan
    if(isset($_POST['simpan'])){
        //ambil data dari formulir
        $nomor_kamar = $_POST['nomor_kamar'];
        $nik = $_POST['nik'];
        $timestamp = $_POST['timestamp'];
        $nama_kegiatan = $_POST['nama_kegiatan'];
        $tanggal_awal = $_POST['tanggal_awal'];
        $tanggal_akhir = $_POST['tanggal_akhir'];
        $nama_tamu = $_POST['nama_tamu'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $statusco = "Terisi";
        $kota = $_POST['kota'];
        $jabatan = $_POST['jabatan'];
        $nama_kantor = $_POST['nama_kantor'];
        $no_hp = $_POST['no_hp'];
        $wisma = "Anggrek";
        
        //buat query update
        $sql = "UPDATE biodata SET nama_tamu='$nama_tamu', nik='$nik', jenis_kelamin='$jenis_kelamin', kota='$kota', tanggal_lahir='$tanggal_lahir', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik'";
        $sql1 = "UPDATE anggrek SET timestamp='$timestamp', nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir',
        nik='$nik', nama_tamu='$nama_tamu', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', statusco='$statusco', kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik'";
        $sql2 = "UPDATE rekapan SET timestamp='$timestamp', nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir',
        nik='$nik', nama_tamu='$nama_tamu', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nik='$nik'";
        
        $query = mysqli_query($db, $sql);
        $query1 = mysqli_query($db, $sql1);
        $query2 = mysqli_query($db, $sql2);
        //apakah query berhasil tersimpan
        if( $query && $query1 && $query2 ){
            header('Location: pages/list-kamar/list-kamar-anggrek.php');
        } else {
            die("Gagal menyimpan perubahan ...");
        }
    } else {
        die("Akses dilarang ...");
    }
?>
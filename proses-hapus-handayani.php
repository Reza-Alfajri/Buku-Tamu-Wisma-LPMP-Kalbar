<?php
    include("koneksi.php");
    //pengecekan
    if(isset($_GET['nomor_kamar1'])){
        //ambil data dari formulir
        $nomor_kamar = $_GET['nomor_kamar1'];
        $nik = "";
        $nuptk = "";
        $jenis_kelamin = "";
        $tanggal_lahir = "";
        $nama_tamu = "";
        $kota = "";
        $jabatan = "";
        $nama_kantor = "";
        $no_hp = "";
        $keterangan = "Check Out";

        //buat query update
        $sql1 = "UPDATE rekapan SET keterangan='$keterangan' where nik='$nik' AND timestamp='$timestamp'";
        $sql = "UPDATE handayani SET 
        nik='$nik', nuptk='$nuptk', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu', kota='$kota', 
        jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp' WHERE nomor_kamar='$nomor_kamar'";

        $query1 = mysqli_query($db, $sql1);
        $query = mysqli_query($db, $sql);
        
        //apakah query berhasil tersimpan
        if( $query && $query1 ){
            header('Location: pages/list-kamar/list-kamar-handayani.php');
        } else {
            die("Gagal menyimpan perubahan...");
        }
    } else if(isset($_GET['nomor_kamar2'])) {
        //ambil data dari formulir
        $nomor_kamar = $_GET['nomor_kamar2'];
        $nik = "";
        $nuptk = "";
        $jenis_kelamin = "";
        $tanggal_lahir = "";
        $nama_tamu = "";
        $kota = "";
        $jabatan = "";
        $nama_kantor = "";
        $no_hp = "";
        $keterangan = "Check Out";

        //buat query update
        $sql1 = "UPDATE rekapan SET keterangan='$keterangan' where nik='$nik' AND timestamp='$timestamp'";
        $sql = "UPDATE handayani SET 
        nik2='$nik', nuptk2='$nuptk', jenis_kelamin2='$jenis_kelamin', tanggal_lahir2='$tanggal_lahir', nama_tamu2='$nama_tamu', kota2='$kota', 
        jabatan2='$jabatan', nama_kantor2='$nama_kantor', no_hp2='$no_hp' WHERE nomor_kamar='$nomor_kamar'";

        $query1 = mysqli_query($db, $sql1);
        $query = mysqli_query($db, $sql);
        
        //apakah query berhasil tersimpan
        if( $query && $query1 ){
            header('Location: pages/list-kamar/list-kamar-handayani.php');
        } else {
            die("Gagal menyimpan perubahan...");
        }
    } else if(isset($_GET['nomor_kamar'])) {
        //ambil data dari formulir
        $nomor_kamar = $_GET['nomor_kamar'];
        $timestampcari = $_GET['timestamp'];
        $nikcari = $_GET['nik'];
        $timestamp = "";
        $nama_kegiatan = "";
        $tanggal_awal = "";
        $tanggal_akhir = "";
        $statusco = "kosong";
        $nik = "";
        $nuptk = "";
        $jenis_kelamin = "";
        $tanggal_lahir = "";
        $nama_tamu = "";
        $kota = "";
        $jabatan = "";
        $nama_kantor = "";
        $no_hp = "";
        $keterangan = "Check Out";

        //buat query update
        $sql1 = "UPDATE rekapan SET keterangan='$keterangan' where nik='$nikcari' AND timestamp='$timestampcari'";

        $sql = "UPDATE handayani SET timestamp='$timestamp', nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir',
        nik='$nik', nuptk='$nuptk', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nama_tamu='$nama_tamu', statusco='$statusco', kota='$kota', 
        jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp',
        nik2='$nik', nuptk2='$nuptk', jenis_kelamin2='$jenis_kelamin', tanggal_lahir2='$tanggal_lahir', nama_tamu2='$nama_tamu', kota2='$kota', 
        jabatan2='$jabatan', nama_kantor2='$nama_kantor', no_hp2='$no_hp' WHERE nomor_kamar='$nomor_kamar'";

        $query1 = mysqli_query($db, $sql1);
        $query = mysqli_query($db, $sql);
        
        //apakah query berhasil tersimpan
        if( $query && $query1 ){
            header('Location: pages/list-kamar/list-kamar-handayani.php');
        } else {
            die("Gagal menyimpan perubahan...");
        }
    } else {
        die("Akses dilarang ...");
    }
?>

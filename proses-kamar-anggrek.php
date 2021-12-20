<?php
    include("koneksi.php");
    //pengecekan
    if(isset($_POST['simpan'])){
        //ambil data dari formulir
        $nomor_kamar = $_POST['nomor_kamar'];
        $timestamp = $_POST['timestamp'];
        $nama_kegiatan = $_POST['nama_kegiatan'];
        $tanggal_awal = $_POST['tanggal_awal'];
        $tanggal_akhir = $_POST['tanggal_akhir'];
        $statusco = "Terisi";

        $nama_tamu = $_POST['nama_tamu'];
        $nik = $_POST['nik'];
        $nuptk = $_POST['nuptk'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tanggal_lahir = $_POST['tanggal_lahir']; 
        $kota = $_POST['kota'];
        $jabatan = $_POST['jabatan'];
        $nama_kantor = $_POST['nama_kantor'];
        $no_hp = $_POST['no_hp'];

        $nama_tamu2 = $_POST['nama_tamu2'];
        $nik2 = $_POST['nik2'];
        $nuptk2 = $_POST['nuptk2'];
        $jenis_kelamin2 = $_POST['jenis_kelamin2'];
        $tanggal_lahir2 = $_POST['tanggal_lahir2'];
        $kota2 = $_POST['kota2'];
        $jabatan2 = $_POST['jabatan2'];
        $nama_kantor2 = $_POST['nama_kantor2'];
        $no_hp2 = $_POST['no_hp2'];

        $wisma = "Anggrek";
        
        //buat query update
        $sql = "UPDATE anggrek SET timestamp='$timestamp', nama_kegiatan='$nama_kegiatan', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir',
            nik='$nik', nuptk='$nuptk', nama_tamu='$nama_tamu', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', statusco='$statusco', kota='$kota', jabatan='$jabatan', nama_kantor='$nama_kantor', no_hp='$no_hp', 
            nik2='$nik2', nuptk2='$nuptk2', nama_tamu2='$nama_tamu2', jenis_kelamin2='$jenis_kelamin2', tanggal_lahir2='$tanggal_lahir2', kota2='$kota2', jabatan2='$jabatan2', nama_kantor2='$nama_kantor2', no_hp2='$no_hp2' 
            WHERE nomor_kamar='$nomor_kamar'";
        $sql1 = "INSERT INTO rekapan (timestamp, nama_kegiatan, tanggal_awal, tanggal_akhir, 
            nama_tamu, nik, nuptk, jenis_kelamin, tanggal_lahir, kota, jabatan, nama_kantor, no_hp, 
            nama_tamu2, nik2, nuptk2, jenis_kelamin2, tanggal_lahir2, kota2, jabatan2, nama_kantor2, no_hp2, 
            wisma, nomor_kamar)
            VALUE ('$timestamp', '$nama_kegiatan', '$tanggal_awal', '$tanggal_akhir', 
            '$nama_tamu', '$nik', '$nuptk', '$jenis_kelamin', '$tanggal_lahir', '$kota', '$jabatan', '$nama_kantor', '$no_hp', 
            '$nama_tamu2', '$nik2', '$nuptk2', '$jenis_kelamin2', '$tanggal_lahir2', '$kota2', '$jabatan2', '$nama_kantor2', '$no_hp2', 
            '$wisma', '$nomor_kamar')";
        $query = mysqli_query($db, $sql);
        $query1 = mysqli_query($db, $sql1);
        if( $query && $query1 ){
            header('Location: pages/list-kamar/list-kamar-anggrek.php');
        } else {
            die("Gagal menyimpan perubahan ...");
        }
    } else {
        die("Akses dilarang ...");
    }
?>

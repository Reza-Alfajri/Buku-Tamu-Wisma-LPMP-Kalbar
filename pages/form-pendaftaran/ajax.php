<?php

include("../../koneksi.php");

//mengambil data
$nik = $_GET['nik'];
//buat query untuk ambil data dari database
$sql = "SELECT * FROM rekapan WHERE nik=$nik";
$query = mysqli_query($db, $sql);
$list = mysqli_fetch_assoc($query);
$data = array(
            'nama_tamu'      =>  @$list['nama_tamu'],
            'jenis_kelamin'      =>  @$list['jenis_kelamin'],
            'tanggal_lahir'   =>  @$list['tanggal_lahir'],
            'kota'      =>  @$list['kota'],
            'jabatan'      =>  @$list['jabatan'],
            'nama_kantor'    =>  @$list['nama_kantor'],
            'no_hp'      =>  @$list['no_hp'],);

//tampil data
echo json_encode($data);
?>

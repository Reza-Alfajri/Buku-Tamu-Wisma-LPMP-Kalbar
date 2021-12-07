<?php
    //Nama File : proses_registrasi.php
    //menkoneksikan ke database
    include("koneksi.php");
    //cek apakah tombol daftar sudah diklik atau belum
    if(isset($_POST['daftar'])) {
        //ambil data dari formulir
        $username = $_POST['username'];
        $password = $_POST['password'];
        //buat query
        $sql = "INSERT INTO admin (username, password)
        VALUE ('$username', '$password')";
        $query = mysqli_query($db, $sql);
        //apakah query simpan berhasil?
        if ($query) {
            header('Location: login.php?status=sukses');
        } else {
            header('Location: login.php?status=gagal');
        }
    } else {
        die("Akses dilarang...");
    }
?>
<?php 
    // mengaktifkan session php
    session_start();
    // menghubungkan dengan koneksi
    include ("koneksi.php");
    // menangkap data yang dikirim dari form
    $username = $_POST['username'];
	$password = $_POST['password'];
    // menyeleksi data user dengan username dan password yang sesuai
    $sql = "SELECT * FROM admin where username='$username' and password='$password'";
    $query = mysqli_query($db, $sql); 
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($query);
    if($cek > 0){
        $_SESSION['username'] = $username;
        header("location: index.php");
    }else{
        die("Gagal Login...");
    }
?>

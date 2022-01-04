<html>
<head>
<!-- sweet alert --> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<!-- end sweet alert -->
<style>
    .swal2-popup {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
</style>
</head>
<body>
<?php
    //Nama File : proses_registrasi.php
    //menkoneksikan ke database
    include("koneksi.php");
    //cek apakah tombol daftar sudah diklik atau belum
        $username = $_POST['username'];
        $password = $_POST['password'];
        //buat query
            $sql1 = "UPDATE admin SET password='$password' WHERE username='$username'";
            $query1 = mysqli_query($db, $sql1);
            if ($query1) {
                echo '
                <script language="javascript">
                Swal.fire({
                    title: "Data Berhasil Disimpan!",
                    icon: "success",
                    confirmButtonText: "OK",
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href="pages/list-admin/list-admin.php?status=berhasil";
                    }
                  }); 
                </script>';
            } else {
                echo '
                <script language="javascript">
                Swal.fire({
                    title: "Data Gagal Disimpan!",
                    icon: "warning",
                    confirmButtonText: "OK",
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back();
                    }
                  }); 
                </script>';
            }
?>
</body>
</html>

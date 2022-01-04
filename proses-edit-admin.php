<html>
<head>
<!-- sweet alert --> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
<body>
<?php
    include("koneksi.php");
    //pengecekan
    if(isset($_POST['simpan'])){
        //ambil data dari formulir
        $username = $_POST['username'];
        $password = $_POST['password'];

        //buat query update
        $sql1 = "UPDATE admin SET password='$password' WHERE username='$username'";
        $query1 = mysqli_query($db, $sql1);
        //apakah query berhasil tersimpan
        if( $query1 ){
            echo '
            <script language="javascript">
                Swal.fire({
                    title: "Data Berhasil Disimpan!",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href="pages/list-admin/list-admin.php"
                    }
                }); 
            </script>';
        } else {
            echo '
            <script language="javascript">
                Swal.fire({
                    title: "Gagal Menyimpan!",
                    icon: "warning",
                    confirmButtonText: "Back",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back();
                    }
                }); 
            </script>';
        }
    } else {
        die("Akses dilarang ...");
    }
?>
</body>
</html>

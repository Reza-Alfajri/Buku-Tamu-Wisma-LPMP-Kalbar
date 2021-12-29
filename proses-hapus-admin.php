<html>
<head>
<!-- sweet alert --> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
<body>
<?php
    include("koneksi.php");
    //pengecekan
    if(isset($_GET['username'])) {
        //ambil data dari formulir
        $username = $_GET['username'];
        //buat query update
        $sql1 = "DELETE FROM admin WHERE username =$username";
        $query1 = mysqli_query($db, $sql1);
        
        //apakah query berhasil tersimpan
        if($query1){
            echo '
            <script language="javascript">
                Swal.fire({
                    title: "Berhasil Dihapus!",
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
                    title: "Gagal Menghapus!",
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
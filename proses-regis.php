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
        $repassword = $_POST['re-password'];
        //buat query
        if ($password<>$repassword) {   
            echo '<script type="text/javascript">
              Swal.fire({
                title: "Password dan Konfirmasi Password Tidak Sama!",
                icon: "warning",
                timer: 1500,
                didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector("b")
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                window.history.back();
              }
            });
            </script>';
        } else {
            $sql = "INSERT INTO admin (username, password)
            VALUE ('$username', '$password')";
            $query = mysqli_query($db, $sql);
            if ($query) {
                echo '
                <script language="javascript">
                Swal.fire({
                    title: "Registrasi Sukses",
                    icon: "success",
                    confirmButtonText: "Login",
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href="login.php?status=berhasil";
                    }
                  }); 
                </script>';
            } else {
                echo '<script type="text/javascript">
              Swal.fire({
                title: "Registrasi Gagal",
                icon: "warning",
                timer: 1500,
                didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector("b")
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                window.history.back();
              }
            });
            </script>';
            }
            
        }
?>
</body>
</html>

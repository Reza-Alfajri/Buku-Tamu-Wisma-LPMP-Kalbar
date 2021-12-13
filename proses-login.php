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
        echo '<script type="text/javascript">
              Swal.fire({
                title: "Username atau Password Salah!",
                icon: "warning",
                timer: 1500,
                showConfirmButton: false,
                didOpen: () => {
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
    ?>
</body>
</html>

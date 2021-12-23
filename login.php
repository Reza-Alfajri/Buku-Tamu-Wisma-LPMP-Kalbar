<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css" />
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css" />
    <link rel="stylesheet" href="css/vertical-layout-light/style2.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- Bootstrap 4 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Start login -->
    <section class="form-login mt-md-4 mt-5 pt-md-3 p-3">
      <div class="container-fluid">
        <div class="row">
          <fieldset class="d-flex justify-content-center p-2 ">
            <form class="shadow p-3 mb-4 bg-white p-4 bg-white rounded" style="width: 350px;" action="proses-login.php" id="rounded-form" method="POST">
              <div class="d-flex justify-content-center mb-4">
                <img src="images/logo-lpmp-kecil.png" width="200px" alt="">
              </div>
              <div class="mb-3 d-flex">
                <span class="m-auto pt-2 pr-2 pb-2"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" style="margin-right: 1.1rem;" name="username" id="username" aria-describedby="" placeholder="username" required>
              </div>
              <div class="mb-5 d-flex">
                <span class="m-auto pt-2 pr-2 pb-2"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                <span id="mybutton" onclick="change()"><i class="far fa-eye text-secondary"></i></span>
              </div>
              <div>
                <button class="btn btn-primary btn-block rounded-pill pe-3 ps-3" type="submit" name="login">Login</button>
                <p class="text-center mt-3 fs-6">Belum punya akun? <a style="color:blue; cursor:pointer; " onclick="regis()";>Buat</a></p>
              </div>
            </form>
            <script>
              function regis() {
                Swal.fire({
                  title: 'Registrasi',
                  html: `
                  <section class="form-login mt-md-3 mt-4 pt-md-3 pt-5">
                    <div class="container-fluid">
                      <div class="row">
                        <fieldset class="d-flex justify-content-center p-sm-2">
                          <form class="shadow p-3 mb-3 bg-white p-4 bg-white rounded" style="width: 350px;" action="proses-regis.php" id="rounded-form" method="POST">
                            <div class="d-flex justify-content-center mb-4">
                              <img src="images/logo-lpmp-kecil.png" width="200px" alt="">
                            </div>
                            <div class="mb-3 d-flex">
                              <span class="m-auto pt-2 pr-2 pb-2"><i class="fas fa-user"></i></span>
                              <input type="text" class="form-control" style="margin-right: 1.1rem;" name="username" id="username" aria-describedby="" placeholder="username" required>
                            </div>
                            <div class="mb-3 d-flex">
                              <span class="m-auto pt-2 pr-2 pb-2"><i class="far fa-lock"></i></span>
                              <input type="password" class="form-control" name="passwordr" id="passwordr" placeholder="password" required>
                              <span id="mybutton1" onclick="passwordr()"><i class="far fa-eye text-secondary"></i></span>
                            </div>
                            <div class="mb-3 d-flex">
                              <p class="ml-4 mb-0">Re-type your password</p>
                            </div>
                            <div class="mb-5 d-flex">
                              <span class="m-auto mt-0 pt-2 pr-2 pb-2"><i class="fas fa-lock"></i></span>
                              <input type="password" class="form-control" name="re-password" id="re-password" placeholder="confirm password" required>
                              <span id="mybutton2" onclick="repassword()"><i class="far fa-eye text-secondary"></i></span>
                            </div>
                              <button class="btn btn-register btn-block rounded-pill btn-primary pe-3 ps-3" type="submit" name="daftar">Buat</button>
                            </div>
                          </form>
                        </fieldset>
                        <p>Klik diluar form untuk keluar atau tekan [esc]</p>
                      </div>
                    </div>
                  </section>
                  `,
                  showConfirmButton: false,
                })
              }
                function passwordr()
                {
                    var x = document.getElementById('passwordr').type;
        
                    if (x == 'password')
                    {
                      document.getElementById('passwordr').type = 'text';
                      document.getElementById('mybutton1').innerHTML = '<i class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                      document.getElementById('passwordr').type = 'password';
                      document.getElementById('mybutton1').innerHTML = '<i class="far fa-eye"></i>';
                    }
                }

                function repassword()
                {
                    var x = document.getElementById('re-password').type;
        
                    if (x == 'password')
                    {
                      document.getElementById('re-password').type = 'text';
                      document.getElementById('mybutton2').innerHTML = '<i class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                      document.getElementById('re-password').type = 'password';
                      document.getElementById('mybutton2').innerHTML = '<i class="far fa-eye"></i>';
                    }
                }
            </script>
          </fieldset>
        </div>
        <div class="row">
          <div class="col-12">
            
          </div>
        </div>
      </div>
    </section>
    <!-- End login -->

    <!-- Optional JavaScript; choose one of the two! -->
    <script type="text/javascript">
         function change()
         {
            var x = document.getElementById('password').type;

            if (x == 'password')
            {
               document.getElementById('password').type = 'text';
               document.getElementById('mybutton').innerHTML = '<i class="far fa-eye-slash"></i>';
            }
            else
            {
               document.getElementById('password').type = 'password';
               document.getElementById('mybutton').innerHTML = '<i class="far fa-eye"></i>';
            }
         }
      </script>

      
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    
  </body>
</html>

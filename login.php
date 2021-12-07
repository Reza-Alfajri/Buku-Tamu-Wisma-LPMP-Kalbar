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
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css" />
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
    <section class="form-login mt-md-5 mt-4 pt-md-3 pt-5">
      <div class="container-fluid">
        <div class="row">
          <fieldset class="d-flex justify-content-center p-sm-2">
            <form class="shadow p-3 mb-5 bg-white p-4 bg-white rounded" style="width: 350px;" action="proses-login.php" id="rounded-form" method="POST">
              <div class="d-flex justify-content-center mb-4">
                <img src="images/logo-lpmp-kecil.png" width="200px" alt="">
              </div>
              <div class="mb-3 d-flex">
                <span class="m-auto pt-2 pr-2 pb-2"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" style="margin-right: 1.1rem;" name="username" id="username" aria-describedby="" placeholder="username">
                <span id="mybutton" onclick="change()"></span>
              </div>
              <div class="mb-3 d-flex">
                <span class="m-auto pt-2 pr-2 pb-2"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" name="password" id="password" placeholder="password">
                <span id="mybutton" onclick="change()"><i class="far fa-eye text-secondary"></i></span>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label ml-0" for="exampleCheck1">Remember me</label>
              </div>
              <div class="d-flex justify-content-between mt-4">
                <button class="btn btn-primary pe-3 ps-3" type="submit" name="login">Sign in</button>
                <input class="btn btn-primary pe-3 ps-3" type="button" onclick="window.location.href = 'regis.php'"; value="Sign Up">
              </div>
            </form>
            
          </fieldset>
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

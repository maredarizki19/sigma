<?php
    error_reporting();
    session_start(); //mengawali session
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $pengguna = new pengguna();

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $check = $pengguna->get_by_userpass($username, $password);

    if($check){
             $_SESSION['pengguna'] = $check;
             $_SESSION['pengguna']['username'] = $check['username'];
             $_SESSION['pengguna']['kd_pengguna'] = $check['kd_pengguna'];
             //$_SESSION['pengguna']['password'] = $check['password'];

             if($_SESSION['pengguna']['level'] == 'Admin')
             {
               ?>
               <script type="text/javascript">
                 alert('Selamat Datang di Halaman Admin');
                 document.location='index.php'
               </script>
            <?php
            }
            else if($_SESSION['pengguna']['level'] == 'Pemilik')
            {
              ?>
              <script type="text/javascript">
                alert('Selamat Datang di Halaman Pemilik');
                document.location='index.php'
              </script>
           <?php
           }
           else if($_SESSION['pengguna']['level'] == 'Pelanggan')
           {
             ?>
             <script type="text/javascript">
               alert('Selamat Datang di Zena Cell');
               document.location='index.php'
             </script>
          <?php
          }
        }
        else {
          ?>
          <script type="text/javascript">
            alert('Anda gagal login');
            document.location='login.php'
          </script>
          <?php
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include "linkcss.php"; ?>
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>

    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
      <div class="dashboard-header">
        <?php include "navbar.php"; ?>
      </div>

        <div class="card ">
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="./assets/images/logo.png" alt="logo"></a><span class="splash-description">ZENA CELL FORM LOGIN</span></div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" id="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password"  type="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button name="login" type="submit" class="btn btn-primary btn-lg btn-block" >LOGIN</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="registrasi.php" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>

            </div>

        </div>
  <?php   include"footer.php"; ?>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <?php include "linkjs.php"; ?>
</body>
</html>

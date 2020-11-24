<?php
    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $pengguna = new pengguna();

    if(isset($_POST['tombol_tambah'])){
        $kd_pengguna = $pengguna->createCode();//$ sebelah kiri bebas
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $adddata = $pengguna->add_data($kd_pengguna, $username, $password, $level);// $ urutan harus sama
        if($adddata){ ?>
          <script type="text/javascript">
            alert('Data Berhasil Disimpan');
            document.location='pengguna.php'
          </script>
          <?php
        }
        else {
          ?>
          <script type="text/javascript">
            alert('Data Gagal Disimpan');
            document.location='penggunatambah.php'
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
    <title>IPHONE</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <div class="dashboard-header">
          <?php include "navbar.php"; ?>
        </div>

        <?php include "sidebar.php"; ?>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                              <div class="row">
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                      <div class="page-header">
                                          <h2 class="pageheader-title">Data Pengguna</h2>

                                          <div class="page-breadcrumb">
                                              <nav aria-label="breadcrumb">
                                                  <ol class="breadcrumb">
                                                      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Barang</a></li>
                                                      <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
                                                  </ol>
                                              </nav>
                                          </div>
                                      </div>
                                  </div>
                              </div>



                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                          <div class="card">
                              <h5 class="card-header">Data Pengguna</h5>
                              <div class="card-body">
                                  <form method="post">
                                      <div class="form-group">
                                          <label for="kd_pengguna">Kode Pengguna</label>
                                          <input id="kd_pengguna" type="text" name="kd_pengguna" value="<?php echo $pengguna->createCode(); ?>" data-parsley-trigger="change" class="form-control" >
                                      </div>
                                      <div class="form-group">
                                          <label for="username">Username</label>
                                          <input id="username" type="text" name="username" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="password">Password</label>
                                          <input id="password" type="text" name="password" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="level">Level</label>
                                          <input id="level" type="text" name="level" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="row">
                                          <div class="col-sm-6 pl-0">
                                              <p class="text-right">
                                                  <button type="submit" name="tombol_tambah" class="btn btn-space btn-primary">Simpan</button>
                                                  <button class="btn btn-space btn-secondary">Batal</button>
                                              </p>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                    </div>

                </div>
            </div>
            <?php include "footer.php"; ?>
        </div>

    </div>

    <?php include "linkjs.php"; ?>
</body>

</html>

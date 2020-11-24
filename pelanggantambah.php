<?php
    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $pelanggan = new pelanggan();

    if(isset($_POST['tombol_tambah'])){
        $kd_pelanggan = $pelanggan->createCode();//$ sebelah kiri bebas
        $nm_pelanggan = $_POST['nm_pelanggan'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];


        $adddata = $pelanggan->add_data($kd_pelanggan, $nm_pelanggan, $alamat, $telp, $email);// $ urutan harus sama
        if($adddata){ ?>
          <script type="text/javascript">
            alert('Data Berhasil Disimpan');
            document.location='pelanggan.php'
          </script>
          <?php
        }
        else {
          ?>
          <script type="text/javascript">
            alert('Data Gagal Disimpan');
            document.location='pelanggantambah.php'
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
                                          <h2 class="pageheader-title">Data pelanggan</h2>

                                          <div class="page-breadcrumb">
                                              <nav aria-label="breadcrumb">
                                                  <ol class="breadcrumb">
                                                      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Barang</a></li>
                                                      <li class="breadcrumb-item active" aria-current="page">Data Pelanggan</li>
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
                              <h5 class="card-header">Data Pelanggan</h5>
                              <div class="card-body">
                                  <form method="post">
                                      <div class="form-group">
                                          <label for="kd_pelanggan">Kode Pelanggan</label>
                                          <input id="kd_pelanggan" type="text" name="kd_pelanggan" value="<?php echo $pelanggan->createCode(); ?>"data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="nm_pelanggan">Nama Pelanggan</label>
                                          <input id="nm_pelanggan" type="text" name="nm_pelanggan" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="alamat">Alamat</label>
                                          <input id="alamat" type="text" name="alamat" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="telp">Telephone</label>
                                          <input id="telp" type="text" name="telp" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="email">Email</label>
                                          <input id="email" type="text" name="email" data-parsley-trigger="change" class="form-control">
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

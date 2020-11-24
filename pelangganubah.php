<?php
    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $pelanggan = new pelanggan();

    if(isset($_GET['kd_pelanggan'])){
        $kode = $_GET['kd_pelanggan'];
        $data_pelanggan = $pelanggan->get_by_id($kode);
    }
    else
    {
        header('Location: pelanggan.php');
    }

    if(isset($_POST['tombol_ubah'])){
        $kd_pelanggan = $_POST['kd_pelanggan'];
        $nm_pelanggan = $_POST['nm_pelanggan'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];

        $status_update = $pelanggan->update($kd_pelanggan, $nm_pelanggan, $alamat, $telp, $email);
        if($status_update){ ?>
          <script type="text/javascript">
            alert('Data Berhasil Diubah');
            document.location='pelanggan.php'
          </script>
          <?php
        }
        else {
          ?>
          <script type="text/javascript">
            alert('Data Gagal Diubah');
            document.location='pelangganubah.php'
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
                                          <h2 class="pageheader-title">Data Pelanggan</h2>

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
                                          <input id="kd_pelanggan" type="text" name="kd_pelanggan" value="<?php echo $data_pelanggan['kd_pelanggan']; ?>" data-parsley-trigger="change" class="form-control" readonly>
                                      </div>
                                      <div class="form-group">
                                          <label for="nm_pelanggan">Nama Pelanggan</label>
                                          <input id="nm_pelanggan" type="text" name="nm_pelanggan" value="<?php echo $data_pelanggan['nm_pelanggan']; ?>" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="alamat">Alamat</label>
                                          <input id="alamat" type="text" name="alamat" value="<?php echo $data_pelanggan['alamat']; ?>" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="telp">Telephone</label>
                                          <input id="telp" type="text" name="telp" value="<?php echo $data_pelanggan['telp']; ?>" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="email">Email</label>
                                          <input id="email" type="text" name="email" value="<?php echo $data_pelanggan['email']; ?>" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="row">
                                          <div class="col-sm-6 pl-0">
                                              <p class="text-right">
                                                  <button type="submit" name="tombol_ubah" class="btn btn-space btn-primary">Ubah</button>
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

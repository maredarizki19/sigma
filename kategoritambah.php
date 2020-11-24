<?php
    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $kategori = new kategori();

    if(isset($_POST['tombol_tambah'])){
        $kd_kategori = $kategori->createCode();//$ sebelah kiri bebas
        $nm_kategori = $_POST['nm_kategori'];

        $adddata = $kategori->add_data($kd_kategori, $nm_kategori);// $ urutan harus sama
        if($adddata){ ?>
          <script type="text/javascript">
            alert('Data Berhasil Disimpan');
            document.location='kategori.php'
          </script>
          <?php
        }
        else {
          ?>
          <script type="text/javascript">
            alert('Data Gagal Disimpan');
            document.location='kategoritambah.php'
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
                                          <h2 class="pageheader-title">Data Kategori</h2>

                                          <div class="page-breadcrumb">
                                              <nav aria-label="breadcrumb">
                                                  <ol class="breadcrumb">
                                                      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Barang</a></li>
                                                      <li class="breadcrumb-item active" aria-current="page">Data Kategori</li>
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
                              <h5 class="card-header">Data Kategori</h5>
                              <div class="card-body">
                                  <form method="post">
                                      <div class="form-group">
                                          <label for="kd_kategori">Kode Kategori</label>
                                          <input id="kd_kategori" type="text" name="kd_kategori" value="<?php echo $kategori->createCode(); ?>" data-parsley-trigger="change" class="form-control" readonly>
                                      </div>
                                      <div class="form-group">
                                          <label for="nm_kategori">Nama Kategori</label>
                                          <input id="nm_kategori" type="text" name="nm_kategori" data-parsley-trigger="change" class="form-control">
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

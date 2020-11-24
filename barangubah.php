<?php
    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $barang = new barang();

    if(isset($_GET['kd_barang'])){
        $kode = $_GET['kd_barang'];
        $data_barang = $barang->get_by_id($kode);
    }
    else
    {
        header('Location: barang.php');
    }

    //bismillah dulu ya, biar berkah
    if(isset($_POST['tombol_ubah'])){
        $kd_barang = $_POST['kd_barang'];
        $kd_kategori = $_POST['kd_kategori'];
        $nm_barang = $_POST['nm_barang'];
        $foto = $_FILES['foto']['name'];
        $deskripsi = $_POST['deskripsi'];
        $stock= $_POST['stock'];
        $tipe_file = $_FILES['foto']['type'];
        $tmp = $_FILES['foto']['tmp_name'];

        if(empty($foto))
        {
        $status_update1 = $barang->update($kd_barang, $kd_kategori, $nm_barang, $foto, $deskripsi, $stock);
        if($status_update1) {
          ?>
          <script type="text/javascript">
            alert('Data Berhasil Diubah');
            document.location='barang.php'
          </script>
          <?php
        }
        else {
          ?>
          <script type="text/javascript">
            alert('Data Gagal Diubah');
            document.location='barangubah.php'
          </script>
          <?php
        }
      }
      else
      {
        $fotobaru = $kd_barang.'_'.$nm_barang.'_'.date('dmYHis').'.'.'jpg';
        // Set path folder tempat menyimpan fotonya
        $path = "uploads/".$fotobaru;
        // Proses upload
        $foto_kue = $fotobaru;

        if(move_uploaded_file($tmp, $path))
        {
          if($tipe_file == "image/jpeg")
          {
            $im_src = imagecreatefromjpeg($path);
            $src_width = imageSX($im_src);
            $src_height= imageSY($im_src);
          }
          else if($tipe_file == "image/png")
          {
            $im_src = imagecreatefrompng($path);
            $src_width = imageSX($im_src);
            $src_height= imageSY($im_src);
          }

          //Simpan dalam ukuran medium 320px
          $dst_width = 400;
          $dst_height = 300;

          //proses untuk perubahan ukuran
          $im = imagecreatetruecolor($dst_width,$dst_height);
          imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

          //menyimpan gambar
            imagejpeg($im,$path);
            imagedestroy($im_src);
            imagedestroy($im);
          unlink("uploads/".$data_barang['foto']); // Hapus file foto sebelumnya yang ada di folder images
          $status_update2 = $barang->update_gambar($kd_barang, $kd_kategori, $nm_barang, $foto, $deskripsi, $stock);
          if($status_update2){ ?>
            <script type="text/javascript">
              alert('Data Berhasil Diubah');
              document.location='barang.php'
            </script>
            <?php
          }
          else
          {
            ?>
            <script type="text/javascript">
              alert('Data Gagal Diubah');
              document.location='barangubah.php'
            </script>
            <?php
          }
        }
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
                                          <h2 class="pageheader-title">Data Barang</h2>

                                          <div class="page-breadcrumb">
                                              <nav aria-label="breadcrumb">
                                                  <ol class="breadcrumb">
                                                      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Barang</a></li>
                                                      <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
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
                              <h5 class="card-header">Data Barang</h5>
                              <div class="card-body">
                                  <form method="post"enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="kd_barang">Kode Barang</label>
                                        <input id="kd_barang" type="text" name="kd_barang" value="<?php echo $data_barang['kd_barang']; ?>" data-parsley-trigger="change" class="form-control" readonly>
                                    </div>
                                      <div class="form-group">
                                          <label for="kd_kategori">Kode Kategori</label>
                                          <input id="kd_kategori" type="text" name="kd_kategori" value="<?php echo $data_barang['kd_kategori']; ?>" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="nm_barang">Nama Barang</label>
                                          <input id="nm_barang" type="text" name="nm_barang" value="<?php echo $data_barang['nm_barang']; ?>" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="form-group row">
                                          <label for="foto">Foto Barang</label>
                                  		<div class="col-sm-7">
                                  			<img src="uploads/<?php echo $data_barang['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                                  			<input type="file" name="foto" class="form-control" id="foto" onchange="readURL(this)">
                                  			<img id="blah" src="#" alt="your image" />
                                  		</div>
                                      </div>
                                      <div class="form-group">
                                          <label for="deskripsi">Deskripsi</label>
                                          <input id="deskripsi" type="text" name="deskripsi" value="<?php echo $data_barang['deskripsi']; ?>" data-parsley-trigger="change" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="stock">Stock</label>
                                          <input id="stock" type="text" name="stock" value="<?php echo $data_barang['stock']; ?>" data-parsley-trigger="change" class="form-control">
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
                                  <script type="text/javascript">
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                            $('#blah').attr('src', e.target.result);
                                        }

                                        reader.readAsDataURL(input.files[0]); // convert to base64 string
                                        }
                                        }

                                        $("#foto_kue").change(function() {
                                        readURL(this);
                                        });
                                   </script>
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

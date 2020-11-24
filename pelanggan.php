<?php
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $pelanggan = new pelanggan();
    $data_pelanggan = $pelanggan->show();

        if(isset($_GET['hapus_pelanggan']))
     {
         $kd_pelanggan = $_GET['hapus_pelanggan'];
         $status_hapus = $pelanggan->delete($kd_pelanggan);
         if($status_hapus)
         {
             header('Location: pelanggan.php');
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

                              <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                     <a href="pelanggantambah.php" class="btn btn-outline-primary btn-block btn-rounded"><i class="fa fa-plus-circle"></i>&nbsp; Tambah Data</a>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                </div>
                              </div>
                              <div class="row">

                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                      <div class="card">
                                          <h5 class="card-header">Data Pelanggan</h5>
                                          <div class="card-body">
                                              <div class="table-responsive">
                                                  <table class="table table-striped table-bordered first">
                                                      <thead>
                                                          <tr>
                                                              <th>No</th>
                                                              <th>Kode Pelanggan</th>
                                                              <th>Nama Pelanggan</th>
                                                              <th>Alamat</th>
                                                              <th>Telephone</th>
                                                              <th>Email</th>
                                                              <th>Aksi</th>
                                                              <th>Aksi</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php
                                                          $no = 1;
                                                          foreach($data_pelanggan as $row)
                                                          {
                                                              echo "<tr>";
                                                              echo "<td>".$no."</td>";
                                                              echo "<td>".$row['kd_pelanggan']."</td>";
                                                              echo "<td>".$row['nm_pelanggan']."</td>";
                                                              echo "<td>".$row['alamat']."</td>";
                                                              echo "<td>".$row['telp']."</td>";
                                                              echo "<td>".$row['email']."</td>";
                                                              echo "<td align='center'>
                                                              <a class='btn btn-info btn-sm' href='pelangganubah.php?kd_pelanggan=".$row['kd_pelanggan']."'><i class='fa fa-edit'></i> Ubah</a>
                                                              <td><a class='btn btn-danger btn-squared btn-sm' onclick=\"myFunction('$row[kd_pelanggan]')\"'>Hapus</a></td>
                                                              </td>";
                                                              echo "</tr>";
                                                              $no++;
                                                          }
                                                        ?>
                                                      </tbody>

                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <script type="text/javascript">
              function myFunction(kode)
              {
                  var x;
                  var r = confirm("Yakin Menghapus data ini ?");
                  if (r == true)
                  {
                      window.location.assign("?page=pelanggan&hapus_pelanggan=" + kode);
                  }
              }
              </script>
            <?php include "footer.php"; ?>
        </div>

    </div>

    <?php include "linkjs.php"; ?>
</body>

</html>

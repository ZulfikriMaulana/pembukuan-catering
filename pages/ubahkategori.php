<?php
require_once('./class/class.Kategori.php');

//$objPesanan = new Pesanan();
$objKategori = new Kategori();

if (isset($_POST['btnSubmit'])) {
  $objKategori->id_kategori = $_POST['id_kategori'];
  $objKategori->nama_kategori = $_POST['nama_kategori'];
  $objKategori->jenis = $_POST['jenis'];

  $objKategori->UbahKategori();

  echo "<script> alert('$objKategori->message'); </script>";
  if ($objKategori->hasil) {
    echo '<script> window.location="dashboard.php?p=lihatkategori"; </script>';
  }
} else if (isset($_GET['id_kategori'])) {
  $objKategori->id_kategori = $_GET['id_kategori'];
  $objKategori->LihatSatuKategori();
}
?>

<section class="content-header">
  <h1>
    Kategori
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <section class="col-lg-12">
      <div class="box box-info">

        <div class="box-header">
          <h3 class="box-title">Ubah Kategori</h3>
        </div>
        <div class="box-body">

          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

            <!--------------------------------------------------------------------------------------------------->

            <div class="col-md-5"><!--COLUMN-->

              <div class="row"><!--ROW ID Kategori-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_kategori">ID Kategori:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="<?php echo $objKategori->id_kategori; ?>" readonly>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Kategori-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="nama_kategori">Kategori:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $objKategori->nama_kategori; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Kategori-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="jenis">Jenis:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $objKategori->jenis; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Button-->
                <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-7">
                    <input type="submit" class="btn btn-success" value="Simpan" name="btnSubmit">
                    <a href="dashboard.php?p=lihatkategori" class="btn btn-danger">Batal</a></td>
                  </div>
                </div>
              </div>
              <!----------------------------------------------------------------------------------------------->
            </div>
          </form>
    </section>
  </div>
</section>
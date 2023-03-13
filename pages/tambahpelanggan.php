<?php
require_once('./class/class.Pelanggan.php');

//$objPesanan = new Pesanan();
$objPelanggan = new Pelanggan();

if (isset($_POST['btnSubmit'])) {
  $objPelanggan->id_pelanggan = $_POST['id_pelanggan'];
  $objPelanggan->nama_instansi = $_POST['nama_instansi'];
  $objPelanggan->alamat = $_POST['alamat'];
  $objPelanggan->nama_cp = $_POST['nama_cp'];
  $objPelanggan->no_hp = $_POST['no_hp'];

  $objPelanggan->TambahPelanggan();

  echo "<script> alert('$objPelanggan->message'); </script>";
  if ($objPelanggan->hasil) {
    echo '<script> window.location="dashboard.php?p=lihatpelanggan"; </script>'; //ganti jadi lihat pesanan
  }
}
?>

<section class="content-header">
  <h1>
    Pelanggan
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
          <h3 class="box-title">Tambah Pelanggan</h3>
        </div>
        <div class="box-body">

          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

            <!--------------------------------------------------------------------------------------------------->

            <div class="col-md-5"><!--COLUMN-->

              <div class="row"><!--ROW ID Kategori-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_pelanggan">ID Pelanggan:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" readonly>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Kategori-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="nama_instansi">Nama Instansi:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Kategori-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="alamat">Alamat:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Kategori-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="nama_cp">Nama Pelanggan:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="nama_cp" name="nama_cp" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Kategori-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="no_hp">No HP:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Button-->
                <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-7">
                    <input type="submit" class="btn btn-success" value="Simpan" name="btnSubmit">
                    <a href="dashboard.php?p=lihatpelanggan" class="btn btn-danger">Batal</a></td>
                  </div>
                </div>
              </div>
              <!----------------------------------------------------------------------------------------------->
            </div>
          </form>
    </section>
  </div>
</section>
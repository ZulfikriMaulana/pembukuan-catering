<?php
require_once('./class/class.Kategori.php');

//$objPesanan = new Pesanan();
$objKategori = new Kategori();

if (isset($_POST['btnSubmit'])) {
  $objKategori->id_kategori = $_POST['id_kategori'];
  $objKategori->namakategori = $_POST['namakategori'];

  $folder = './bukti/';
  $iSuccessUpload = move_uploaded_file($lokasi_file, $folder . $nama_file);
  if ($iSuccessUpload) {
    $objKategori->UbahKategori(); //nanti dibenerin classnya

    echo "<script> alert('$objKategori->message'); </script>";
    if ($objKategori->hasil) {
      echo '<script> window.location="dashboard.php?p=lihattransaksi"; </script>'; //ganti jadi lihat pesanan
    }
  }
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
                  <label class="control-label col-sm-5" for="namakategori">Kategori:</label>
                  <div class="col-sm-7">
                  <input type="text" class="form-control" id="namakategori" name="namakategori" value="<?php echo $objKategori->namakategori; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Button-->
                <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-7">
                    <input type="submit" class="btn btn-success" value="Simpan" name="btnSubmit">
                    <a href="dashboard.php?p=lihattransaksi" class="btn btn-danger">Batal</a></td>
                  </div>
                </div>
              </div>
              <!----------------------------------------------------------------------------------------------->
            </div>
          </form>
    </section>
  </div>
</section>
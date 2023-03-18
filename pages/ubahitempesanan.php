<?php
require_once('./class/class.ItemPesanan.php');

$objItemPesanan = new ItemPesanan();

if (isset($_POST['btnSubmit'])) {
  $objItemPesanan->id_item_pesanan = $_POST['id_item_pesanan'];
  $objItemPesanan->nama_item = $_POST['nama_item'];
  $objItemPesanan->harga_jual = $_POST['harga_jual'];
  $objItemPesanan->harga_modal = $_POST['harga_modal'];

  $objItemPesanan->UbahItemPesanan();

  echo "<script> alert('$objItemPesanan->message'); </script>";
  if ($objItemPesanan->hasil) {
    echo '<script> window.location="dashboard.php?p=lihatitempesanan"; </script>';
  }
} else if (isset($_GET['id_item_pesanan'])) {
  $objItemPesanan->id_item_pesanan = $_GET['id_item_pesanan'];
  $objItemPesanan->LihatSatuItemPesanan();
}
?>

<section class="content-header">
  <h1>
    Item Pesanan
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
          <h3 class="box-title">Ubah Item Pesanan</h3>
        </div>
        <div class="box-body">

          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

            <!--------------------------------------------------------------------------------------------------->

            <div class="col-md-5"><!--COLUMN-->

              <div class="row"><!--ROW ID Kategori-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_item_pesanan">ID Item Pesanan:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="id_item_pesanan" name="id_item_pesanan" value="<?php echo $objItemPesanan->id_item_pesanan; ?>" readonly>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Nama Item-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="nama_item">Nama Item:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="nama_item" name="nama_item" value="<?php echo $objItemPesanan->nama_item; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Harga Jual-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="harga_jual">Harga Jual:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="<?php echo $objItemPesanan->harga_jual; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Harga Modal-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="harga_modal">Harga Modal:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="harga_modal" name="harga_modal" value="<?php echo $objItemPesanan->harga_modal; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Button-->
                <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-7">
                    <input type="submit" class="btn btn-success" value="Simpan" name="btnSubmit">
                    <a href="dashboard.php?p=lihatitempesanan" class="btn btn-danger">Batal</a></td>
                  </div>
                </div>
              </div>
              <!----------------------------------------------------------------------------------------------->
            </div>
          </form>
    </section>
  </div>
</section>
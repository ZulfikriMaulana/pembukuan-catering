<?php
require_once('./class/class.Transaksi.php');
require_once('./class/class.Kategori.php');

//$objPesanan = new Pesanan();
$objTransaksi = new Transaksi();

if (isset($_POST['btnSubmit'])) {
  $objTransaksi->id_transaksi = $_POST['id_transaksi'];
  $objTransaksi->id_kategori = $_POST['id_kategori'];
  $objTransaksi->tanggal_transaksi = $_POST['tanggal_transaksi'];
  $objTransaksi->jenis_transaksi = $_POST['jenis_transaksi'];
  $objTransaksi->keterangan_transaksi = $_POST['keterangan_transaksi'];
  $objTransaksi->nominal_transaksi = $_POST['nominal_transaksi'];
  $lokasi_file = $_FILES['foto_transaksi']['tmp_name'];
  $nama_file = $_FILES['foto_transaksi']['name'];
  $objTransaksi->foto_transaksi = $nama_file;

  $folder = './bukti/';
  $iSuccessUpload = move_uploaded_file($lokasi_file, $folder . $nama_file);
  if ($iSuccessUpload) {
    $objTransaksi->UbahTransaksi();

    echo "<script> alert('$objTransaksi->message'); </script>";
    if ($objTransaksi->hasil) {
      echo '<script> window.location="dashboard.php?p=lihattransaksi </script>'; //ganti jadi lihat pesanan
    }
  }
} else if (isset($_GET['id_transaksi'])) {
  $objTransaksi = new Transaksi();
  $objTransaksi->id_transaksi = $_GET['id_transaksi'];
  $objTransaksi->LihatSatuTransaksi();
}
?>

<section class="content-header">
  <h1>
    Transaksi
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
          <h3 class="box-title">Ubah Transaksi</h3>
        </div>
        <div class="box-body">

          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

            <!--------------------------------------------------------------------------------------------------->

            <div class="col-md-5"><!--COLUMN-->

              <div class="row"><!--ROW ID Pesanan-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_transaksi">ID Transaksi:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="<?php echo $objTransaksi->id_transaksi; ?>" readonly>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Tanggal Bayar-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="tanggal_transaksi">Tanggal Transaksi:</label>
                  <div class="col-sm-7">
                    <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="<?php echo $objTransaksi->tanggal_transaksi; ?>" required disabled>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Jenis-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="jenis_transaksi">Jenis:</label>
                  <div class="col-sm-7">
                    <select class="form-control" id="jenis_transaksi" name="jenis_transaksi" value="<?php echo $objTransaksi->jenis_transaksi; ?>" required>
                    <option value="Pemasukan">Pemasukan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Kategori-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_kategori">Kategori:</label>
                  <div class="col-sm-7">
                    <select class="form-control" id="id_kategori" name="id_kategori" value="<?php echo $objTransaksi->id_kategori; ?>" required>
                      <!--<option value="1">Pelunasan</option>-->
                      <?php
                      $objKategori = new Kategori();
                      $KategoriList = $objKategori->LihatSemuaKategori();
                      foreach ($KategoriList as $Kategori) {
                        echo '<option value=' . $Kategori->id_kategori . '>' . $Kategori->nama_kategori . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Nominal-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="nominal_transaksi">Nominal Transaksi:</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" id="nominal_transaksi" name="nominal_transaksi" value="<?php echo $objTransaksi->nominal_transaksi; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Keterangan-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="keterangan_transaksi">Keterangan:</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" id="keterangan_transaksi" name="keterangan_transaksi" rows="2" cols="20"><?php echo $objTransaksi->keterangan_transaksi; ?></textarea>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Upload-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="foto_transaksi">Upload Bukti bayar:</label>
                  <div class="col-sm-7">
                    <input type="file" class="form-control" id="foto_transaksi" name="foto_transaksi" value="<?php echo $objTransaksi->foto_transaksi; ?>">
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
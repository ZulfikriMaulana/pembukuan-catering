<?php
require_once('./class/class.Pesanan.php');
require_once('./class/class.Transaksi.php');
require_once('./class/class.ItemPesanan.php');

$objTransaksi = new Transaksi();

if (isset($_POST['btnSubmit'])) {
  $objTransaksi->id_pesanan = $_POST['id_pesanan'];
  $objTransaksi->id_kategori = $_POST['id_kategori'];
  $objTransaksi->tanggal_transaksi = $_POST['tanggal_transaksi'];
  $objTransaksi->jenis_transaksi = "pemasukan";
  $objTransaksi->keterangan_transaksi = $_POST['keterangan_transaksi'];
  $objTransaksi->nominal_transaksi = $_POST['nominal_transaksi'];
  $lokasi_file = $_FILES['foto_transaksi']['tmp_name'];
  $nama_file = $_FILES['foto_transaksi']['name'];
  $objTransaksi->foto_transaksi = $nama_file;

  $folder = './bukti/';
  $iSuccessUpload = move_uploaded_file($lokasi_file, $folder.$nama_file);
  if ($iSuccessUpload) {
    $objTransaksi->BayarTransaksi();

    echo "<script> alert('$objTransaksi->message'); </script>";
    if ($objTransaksi->hasil) {
      echo '<script> window.location="dashboard.php?p=lihatpesanan"; </script>'; //ganti jadi lihat pesanan
    }
  }
} else if (isset($_GET['id_pesanan'])) {
  $objPesanan = new Pesanan();
  $objPesanan->id_pesanan = $_GET['id_pesanan'];
  $objPesanan->LihatSatuPesanan();
}
?>

<section class="content-header">
  <h1>
    Pesanan
    <small>Data Pesanan</small>
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
          <h3 class="box-title">Bayar Pesanan</h3>
        </div>
        <div class="box-body">

          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="col-md-5"><!--COL Kiri-->
            <!--ISI COL KIRI BAYAR PESANAN:ID PESANAN, TANGGAL PESANAN, JENIS PESANAN, JUMLAH PESANAN, TOTAL HARGA (SEMUANYA READONLY) -->
              <div class="row"><!--ROW ID Pesanan-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_pesanan">ID Pesanan:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="id_pesanan" name="id_pesanan" value="<?php echo $objPesanan->id_pesanan; ?>" readonly>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Tanggal-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="tanggal_pesanan">Tanggal Pesanan:</label>
                  <div class="col-sm-7">
                    <input type="date" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" value="<?php echo $objPesanan->tanggal_pesanan; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Jenis Pesanan-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_item_pesanan">Jenis Pesanan:</label>
                  <div class="col-sm-7">
                    <select class="form-control" id="id_item_pesanan" name="id_item_pesanan" value="<?php echo $objPesanan->id_item_pesanan; ?>">
                    <?php
                      $objItemPesanan = new ItemPesanan();
                      $ItemPesananList = $objItemPesanan->LihatSemuaItemPesanan();
                      foreach ($ItemPesananList as $ItemPesanan){ 								
                        if($objPesanan->id_item_pesanan == $ItemPesanan->id_item_pesanan)				
                          echo '<option selected="true" value='.$ItemPesanan->id_item_pesanan.'>'.$ItemPesanan->nama_item.'</option>';
                        else
                        echo '<option value='.$ItemPesanan->id_item_pesanan.'>'.$ItemPesanan->nama_item.'</option>';
                       }
                      ?>	
                    </select>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Jumlah Pesanan-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="jumlah_pesanan">Jumlah Pesanan:</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" value="<?php echo $objPesanan->jumlah_pesanan; ?>" onchange="hitung()" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Total Pesanan-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="total_pesanan">total pesanan:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="total_pesanan" name="total_pesanan" value="<?php echo $objPesanan->total_pesanan; ?>" readonly>
                  </div>
                </div>
              </div>
              </div>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
              



            <div class="col-md-5"><!--COL Kanan-->
            <!--ISI COL KANAN BAYAR PESANAN:TANGGAL BAYAR, KATEGORI(READONLY), NOMINAL, KETERANGAN, UPLOAD FILE -->

              <div class="row"><!--ROW Tanggal Bayar-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="tanggal_transaksi">Tanggal Bayar:</label>
                  <div class="col-sm-7">
                    <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi">
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Kategori-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_kategori">Kategori:</label>
                  <div class="col-sm-7">
                    <select class="form-control" id="id_kategori" name="id_kategori">
                    <option value="1">Pelunasan</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Nominal-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="nominal_transaksi">Nominal Transaksi:</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" id="nominal_transaksi" name="nominal_transaksi" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Keterangan-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="keterangan_transaksi">Keterangan:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="keterangan_transaksi" placeholder="Keterangan" name="keterangan_transaksi">
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW 7-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="foto_transaksi">Upload Bukti bayar:</label>
                  <div class="col-sm-7">
                    <input type="file" class="form-control" id="foto_transaksi" name="foto_transaksi">
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW 8-->
            <div class="form-group">
              <div class="col-sm-offset-5 col-sm-7">
              <input type="submit" class="btn btn-success" value="Simpan" name="btnSubmit">
              <a href="dashboard.php?p=lihatpesanan" class="btn btn-danger">Batal</a></td>
              </div>
            </div>
          </div>

              <!----------------------------------------------------------------------------------------------->

             

        </form>

      </div>
  </div>
</section>
</div>
</section>
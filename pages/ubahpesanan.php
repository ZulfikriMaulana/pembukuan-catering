<?php
require_once('./class/class.Pesanan.php');
require_once('./class/class.Pelanggan.php');
require_once('./class/class.ItemPesanan.php');

$objPesanan = new Pesanan();

if (isset($_POST['btnSubmit'])) {
  $objPesanan->id_pesanan = $_POST['id_pesanan'];
  $objPesanan->tanggal_pesanan = $_POST['tanggal_pesanan'];
  $objPesanan->catatan = $_POST['catatan'];
  $objPesanan->jumlah_pesanan = $_POST['jumlah_pesanan'];
  $objPesanan->id_item_pesanan = $_POST['id_item_pesanan'];
  $objPesanan->subtotal_pesanan = $_POST['subtotal_pesanan'];
  $objPesanan->pajak_pesanan = $_POST['pajak_pesanan'];
  $objPesanan->total_pesanan = $_POST['total_pesanan'];

  $objPesanan->UbahPesanan();

  echo "<script> alert('$objPesanan->message'); </script>";
  if ($objPesanan->hasil) {
    echo '<script> window.location="dashboard.php?p=lihatpesanan"; </script>';
  }
} else if (isset($_GET['id_pesanan'])) {
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
          <h3 class="box-title">Ubah Pesanan</h3>
        </div>
        <div class="box-body">

          <form class="form-horizontal" action="" method="post">
            <div class="col-md-5"><!--COL Kiri-->
              <div class="row"><!--ROW 1-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_pesanan">ID Pesanan:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="id_pesanan" name="id_pesanan" value="<?php echo $objPesanan->id_pesanan; ?>" readonly>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW 2-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_pelanggan">Pelanggan:</label>
                  <div class="col-sm-7">
                    <select class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?php echo $objPesanan->id_pelanggan; ?>" readonly>
                      <!--Replace value heret-->
                      <?php
                      $objPelanggan = new Pelanggan();
                      $PelangganList = $objPelanggan->LihatSemuaPelanggan();
                      foreach ($PelangganList as $Pelanggan) {
                        if ($objPesanan->id_pelanggan == $Pelanggan->id_pelanggan)
                          echo '<option selected="true" value=' . $Pelanggan->id_pelanggan . '>' . $Pelanggan->nama_instansi . '</option>';
                        else
                          echo '<option value=' . $Pelanggan->id_pelanggan . '>' . $Pelanggan->nama_instansi . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW 3-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="alamat_pelanggan">Alamat:</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" id="alamat_pelanggan" placeholder="Alamat" name="alamat_pelanggan" rows="2" cols="20" required readonly><?php echo $objPesanan->alamat_pelanggan; ?></textarea>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW 4-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="nama_instansi">Nama:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="nama_instansi" placeholder="Nama" name="nama_instansi" value="<?php echo $objPesanan->nama_instansi; ?>" required readonly>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW 5-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="no_hp">No. HP:</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" id="no_hp" placeholder="Masukkan No. Hp" name="no_hp" value="<?php echo $objPesanan->no_hp; ?>" required readonly>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW 6-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="catatan">Catatan:</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" id="catatan" placeholder="catatan" name="catatan" rows="2" cols="20"><?php echo $objPesanan->catatan; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5"><!--COL Kanan-->
              <div class="row"><!--ROW 1-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="tanggal_pesanan">Tanggal Pesanan:</label>
                  <div class="col-sm-7">
                    <input type="date" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" value="<?php echo $objPesanan->tanggal_pesanan; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW 2-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_item_pesanan">Jenis Pesanan:</label>
                  <div class="col-sm-7">
                    <select class="form-control" id="id_item_pesanan" name="id_item_pesanan" value="<?php echo $objPesanan->id_item_pesanan; ?>" onchange="hitung()">
                      <?php
                      $objItemPesanan = new ItemPesanan();
                      $ItemPesananList = $objItemPesanan->LihatSemuaItemPesanan();
                      foreach ($ItemPesananList as $ItemPesanan) {
                        if ($objPesanan->id_item_pesanan == $ItemPesanan->id_item_pesanan)
                          echo '<option selected="true" value='.$ItemPesanan->id_item_pesanan.' data-harga='.$ItemPesanan->harga_jual.' >'.$ItemPesanan->nama_item.' - '.$ItemPesanan->harga_jual.'</option>';
                          //echo '<option selected="true" value=' . $ItemPesanan->id_item_pesanan . '>' . $ItemPesanan->nama_item . '</option>'; backup
                        else
                          echo '<option value='.$ItemPesanan->id_item_pesanan.' data-harga='.$ItemPesanan->harga_jual.' >'.$ItemPesanan->nama_item.' - '.$ItemPesanan->harga_jual.'</option>';
                          //echo '<option value=' . $ItemPesanan->id_item_pesanan . '>' . $ItemPesanan->nama_item . '</option>'; backup
                      }
                      ?>
                    </select>
                  </div><!--sampel dropdown-->
                </div>
              </div>

              <div class="row"><!--ROW 3-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="jumlah_pesanan">Jumlah Pesanan:</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" value="<?php echo $objPesanan->jumlah_pesanan; ?>" onchange="hitung()" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW 4-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="subtotal_pesanan">subtotal pesanan:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="subtotal_pesanan" name="subtotal_pesanan" value="<?php echo $objPesanan->subtotal_pesanan; ?>" readonly>
                  </div>
                </div>
              </div>
              <!--ROW 5
          <div class="row">
            <div class="form-group"> 
              <label class="control-label col-sm-5" for="besar_pajak">pajak pesanan:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="besar_pajak" name="besar_pajak" value=10 readonly>
              </div>
            </div>
          </div>
          -->
              <div class="row"><!--ROW 6-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="pajak_pesanan">pajak pesanan</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="pajak_pesanan" name="pajak_pesanan" value="<?php echo $objPesanan->pajak_pesanan; ?>" readonly>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW 7-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="total_pesanan">total pesanan:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="total_pesanan" name="total_pesanan" value="<?php echo $objPesanan->total_pesanan; ?>" readonly>
                  </div>
                </div>
              </div>
              </br>
              <div class="row"><!--ROW 8-->
                <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-7">
                    <input type="submit" class="btn btn-success" value="Simpan" name="btnSubmit">
                    <a href="dashboard.php?p=lihatpesanan" class="btn btn-danger">Batal</a></td>
                  </div>
                </div>
              </div>
            </div>
        </div>

        </form>

      </div>
  </div>
</section>
</div>
</section>

<script>
  function hitung() {
    var id_item_pesanan = document.getElementById("id_item_pesanan");	    
    var harga = id_item_pesanan.options[id_item_pesanan.selectedIndex].getAttribute("data-harga");    
    var jumlah_pesanan = document.getElementById("jumlah_pesanan").value;
    var subtotal = 0;
    subtotal = harga * jumlah_pesanan;

    // var id_item_pesanan = document.getElementById("id_item_pesanan").value;
    // var jumlah_pesanan = document.getElementById("jumlah_pesanan").value;
    // var subtotal = 0;
    // if (id_item_pesanan == 1) {
    //   subtotal = 15000 * jumlah_pesanan
    // } else if (id_item_pesanan == 2) {
    //   subtotal = 25000 * jumlah_pesanan
    // } else if (id_item_pesanan == 3) {
    //   subtotal = 50000 * jumlah_pesanan
    // }
    var besar_pajak = 10; //document.getElementById("besar_pajak").value;
    var pajak = besar_pajak / 100 * subtotal;

    var total = subtotal + pajak;

    document.getElementById("subtotal_pesanan").value = subtotal;
    document.getElementById("pajak_pesanan").value = pajak;
    document.getElementById("total_pesanan").value = total;
  }
</script>
Footer
© 2023 GitHub, Inc.
Footer navigation
Term



<!--value="<?php echo $objPesanan->email; ?>"  buat mengambil value dari tabel-->
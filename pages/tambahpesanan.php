<?php
require_once('./class/class.Pesanan.php');

$objPesanan = new Pesanan();

if (isset($_POST['btnSubmit'])) {
  $objPesanan->id_pesanan = $_POST['id_pesanan'];
  $objPesanan->tanggal_pesanan = $_POST['tanggal_pesanan'];
  $objPesanan->id_pelanggan = $_POST['id_pelanggan'];
  $objPesanan->alamat_pelanggan = $_POST['alamat_pelanggan'];
  $objPesanan->nama_pelanggan = $_POST['nama_pelanggan'];
  $objPesanan->no_hp = $_POST['no_hp'];
  $objPesanan->id_item_pesanan = $_POST['id_item_pesanan'];
  $objPesanan->jumlah_pesanan = $_POST['jumlah_pesanan'];
  $objPesanan->catatan = $_POST['catatan'];
  $objPesanan->subtotal_pesanan = $_POST['subtotal_pesanan'];
  $objPesanan->pajak_pesanan = $_POST['pajak_pesanan'];
  $objPesanan->total_pesanan = $_POST['total_pesanan'];


  $objPesanan->TambahPesanan();

  echo "<script> alert('$objPesanan->message'); </script>";
  if ($objPesanan->hasil) {
    echo '<script> window.location="index.php?p=lihatpesanan"; </script>'; //ganti jadi lihat pesanan
  }
}
?>

  
    <div class="container">
      <form class="form-horizontal" action="" method="post">
        <div class="col-md-6"><!--COL Kiri-->
          <div class="row"><!--ROW 1-->
            <div class="form-group"> 
              <label class="control-label col-sm-5" for="id_pesanan">ID Pesanan:</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" id="id_pesanan" name="id_pesanan" value="01" readonly>
                </div>
              </div>
          </div>
          
          <div class="row"><!--ROW 2-->
            <div class="form-group"> 
              <label class="control-label col-sm-5" for="id_pelanggan">Pelanggan:</label>
                <div class="col-sm-7">
                  <select class="form-control" id="id_pelanggan" name="id_pelanggan">
                  <option value="1">Pemkot Depok</option>
                  <option value="2">Muhammad Sumbul</option>
                  <option value="3">ESQ 165</option>
                  </select>
                </div>
            </div>
          </div>
          
          <div class="row"><!--ROW 3-->
            <div class="form-group"> 
              <label class="control-label col-sm-5" for="alamat_pelanggan">Alamat:</label>
                <div class="col-sm-7">
                <textarea class="form-control" id="alamat_pelanggan" placeholder="Alamat" name="alamat_pelanggan" rows="2" cols="20"></textarea>
              </div>
            </div>
          </div>
          
            <div class="row"><!--ROW 4-->
              <div class="form-group"> 
                <label class="control-label col-sm-5" for="nama_pelanggan">Nama:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="nama_pelanggan" placeholder="Nama" name="nama_pelanggan" required>
              </div>
            </div>
          </div>
          
          <div class="row"><!--ROW 5-->
            <div class="form-group"> 
                <label class="control-label col-sm-5" for="no_hp">No. HP:</label>
                <div class="col-sm-7">
                <input type="number" class="form-control" id="no_hp" placeholder="Masukkan No. Hp" name="no_hp" required>
                </div>
            </div>
          </div>
          
          <div class="row"><!--ROW 6-->
            <div class="form-group"> 
              <label class="control-label col-sm-5" for="catatan">Catatan:</label>
              <div class="col-sm-7">
                <textarea class="form-control" id="catatan" placeholder="catatan" name="catatan" rows="2" cols="20"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6"><!--COL Kanan-->
          <div class="row"><!--ROW 1-->
              <div class="form-group"> 
                <label class="control-label col-sm-5" for="tanggal_pesanan">Tanggal Pesanan:</label>
                <div class="col-sm-7">
                  <input type="date" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan">
              </div>
            </div>
          </div>
          
          <div class="row"><!--ROW 2-->
            <div class="form-group"> 
              <label class="control-label col-sm-5" for="id_item_pesanan">Jenis Pesanan:</label>
                <div class="col-sm-7">
                  <select class="form-control" id="id_item_pesanan" name="id_item_pesanan" onchange="hitung()">
                  <option value="1">Snack Box</option>
                  <option value="2">Nasi Box</option>
                  <option value="3">Prasmanan</option>
                  </select>
                </div><!--sampel dropdown-->
              </div>
          </div>
          
          <div class="row"><!--ROW 3-->
            <div class="form-group"> 
              <label class="control-label col-sm-5" for="jumlah_pesanan">Jumlah Pesanan:</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" onchange="hitung()">
              </div>
            </div>
          </div>
          
            <div class="row"><!--ROW 4-->
              <div class="form-group"> 
                <label class="control-label col-sm-5" for="subtotal_pesanan">subtotal pesanan:</label>
                  <div class="col-sm-7">
                  <input type="text" class="form-control" id="subtotal_pesanan" name="subtotal_pesanan" value=0 readonly>
              </div>
            </div>
          </div>
          
          <div class="row"><!--ROW 5-->
            <div class="form-group"> 
              <label class="control-label col-sm-5" for="besar_pajak">pajak pesanan:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="besar_pajak" name="besar_pajak" value=0 readonly>
              </div>
            </div>
          </div>
          
          <div class="row"><!--ROW 6-->
            <div class="form-group"> 
              <label class="control-label col-sm-5" for="pajak_pesanan"></label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="pajak_pesanan" name="pajak_pesanan" value=0 readonly>
              </div>
            </div>
          </div>
          
          <div class="row"><!--ROW 7-->
            <div class="form-group"> 
              <label class="control-label col-sm-5" for="total_pesanan">total pesanan:</label>
              <div class="col-sm-7">
              <input type="text" class="form-control" id="total_pesanan" name="total_pesanan" value=0 readonly>
              </div>
            </div>
          </div>
          </br> 
          <div class="row"><!--ROW 8-->
            <div class="form-group">
              <div class="col-sm-offset-5 col-sm-7">
              <input type="submit" class="btn btn-success" value="Simpan" name="btnSubmit">
              <a href="index.php?p=lihatuser" class="btn btn-danger">Batal</a></td>
              </div>
            </div>
          </div>
        </div>
      </div>

    </form>
  </div>
<script>
function hitung() {
	    var id_item_pesanan = document.getElementById("id_item_pesanan").value;
      var jumlah_pesanan = document.getElementById("jumlah_pesanan").value;
      var subtotal = 0;
      if (id_item_pesanan == 1){
        subtotal = 15000*jumlah_pesanan
      }elseif (id_item_pesanan == 2){
        subtotal=25000*jumlah_pesanan
      }elseif(id_item_pesanan == 3){
        subtotal = 50000*jumlah_pesanan
      }

	    document.getElementById("subtotal_pesanan").value = subtotal;
	}
</script>
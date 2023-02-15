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
  <!-- <div class="col-md-6">
    <h3>Tambah Pesanan</h3>
    <form class="form-horizontal" action="" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="pesanan">pesanan:</label>
        <div class="col-sm-10">
          <input type="pesanan" class="form-control" id="pesanan" placeholder="Enter pesanan" name="pesanan">
        </div>
      </div> -->

     <!-- <div class="form-group">
        <label class="control-label col-sm-2" for="password">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="role">Peran:</label>
        <div class="col-sm-10">
          <select name="role" require class="form-control" required>
            <?php
            $arrayRole = array("owner", "admin");
            foreach ($arrayRole as $selectedRole) {
              echo '<option value="' . $selectedRole . '">' . $selectedRole . '</option>';
            }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-success" value="Simpan" name="btnSubmit">
          <a href="index.php?p=lihatuser" class="btn btn-danger">Batal</a></td>
        </div>
      </div>-->
      
      <!--form baru disini-->
      <div class="row">
        <div class="form-group"> 
          <label class="control-label col-sm-2" for="id_pesanan">ID Pesanan:</label>
          <div class="col-sm-4">
          <input type="text" class="form-control" id="id_pesanan" name="id_pesanan" value="01" readonly><!--value & readonly-->
          </div>
        </div>
      
        <div class="form-group"> 
          <label class="control-label col-sm-2" for="tanggal_pesanan">Tanggal Pesanan:</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group"> 
          <label class="control-label col-sm-2" for="id_pelanggan">ID Pelanggan:</label>
          <div class="col-sm-4">
            <!--<input type="select" class="form-control" id="id_pelanggan" name="id_pelanggan">-->
            <select id="id_item_pesanan" name="id_item_pesanan">
            <option value="pemkot_depok">Pemkot Depok</option>
            <option value="ahmad_sumbul">Muhammad Sumbul</option>
            <option value="esq_165">ESQ 165</option>
            </select>
          </div>
        </div>
        <div class="form-group"> 
          <label class="control-label col-sm-2" for="alamat_pelanggan">Alamat:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="alamat_pelanggan" placeholder="Masukkan alamat" name="alamat_pelanggan" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group"> 
          <label class="control-label col-sm-2" for="nama_pelanggan">Nama:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="nama_pelanggan" placeholder="Nama" name="nama_pelanggan" required>
          </div>
        </div>
        <div class="form-group"> 
          <label class="control-label col-sm-2" for="no_hp">No. HP:</label>
          <div class="col-sm-4">
            <input type="number" class="form-control" id="no_hp" placeholder="Masukkan No. Hp" name="no_hp" required><!--cek lagi input type-->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group"> 
          <label class="control-label col-sm-2" for="id_item_pesanan">ID Item Pesanan:</label>
          <div class="col-sm-4">
            <!--<input type="text" class="form-control" id="id_item_pesanan" name="id_item_pesanan"> kendala: input type dropdown-->
            <select id="id_item_pesanan" name="id_item_pesanan">
            <option value="snack_box">Snack Box</option>
            <option value="nasi_box">Nasi Box</option>
            <option value="prasmanan">Prasmanan</option>
            </select>
          </div><!--sampel dropdown-->
        </div>
        <div class="form-group"> 
          <label class="control-label col-sm-2" for="jumlah_pesanan">Jumlah Pesanan:</label>
          <div class="col-sm-4">
            <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group"> 
          <label class="control-label col-sm-2" for="catatan">Catatan:</label>
          <div class="col-sm-4">
            <!--<input type="text" class="form-control" id="catatan" placeholder="catatan" name="catatan">--><!--ubah jadi textarea-->
            <textarea class="form-control" id="catatan" placeholder="catatan" name="catatan" rows="5" cols="20"></textarea>
          </div>
        </div>
        <div class="form-group"> 
          <label class="control-label col-sm-2" for="subtotal_pesanan">subtotal pesanan:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="subtotal_pesanan" name="subtotal_pesanan" readonly><!--note: ubah jadi auto-->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group"> 
          <label class="control-label col-sm-2" for="pajak_pesanan">pajak pesanan:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="pajak_pesanan" name="pajak_pesanan" value="10%" readonly><!--note: ubah jadi auto-->
          </div>
        </div>
        <div class="form-group"> 
          <label class="control-label col-sm-2" for="total_pesanan">total pesanan:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="total_pesanan" name="total_pesanan" readonly><!--note: ubah jadi auto-->
          </div>
        </div>
      </div>
      </br>
      <div class="row">
        <div class="col-sm-10">
        </div>
        <div class="col-sm-2">
          <!-- <input type="button" value="Simpan">
          <input type="button" value="Batal"> -->
          <button class="btn btn-primary"type="button">Simpan</button>
          <button class="btn btn-primary"type="button">Batal</button>
        </div>
      </div>
    
      

    </form>
  </div>
</div>
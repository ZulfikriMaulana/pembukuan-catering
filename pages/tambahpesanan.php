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
  <div class="col-md-6">
    <h3>Tambah User</h3>
    <form class="form-horizontal" action="" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
      </div>
      <div class="form-group">
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
      </div>
    </form>
  </div>
</div>
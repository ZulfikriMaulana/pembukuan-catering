<?php
require_once('./class/class.Pesanan.php');

$objUser = new Pesanan();

if (isset($_POST['btnSubmit'])) {
  $objPesanan->id_pesanan = $_GET['id_pesanan'];
  $objPesanan->tanggal_pesanan = $_POST['tanggal_pesanan'];
  $objPesanan->alamat_pesanan = $_POST['alamat_pesanan'];
  $objPesanan->no_hp = $_POST['no_hp'];
  $objPesanan->jumlah_pesanan = $_POST['jumlah_pesanan'];
  $objPesanan->catatan = $_POST['catatan'];
  $objUser->UbahPesanan();

  echo "<script> alert('$objPesanan->message'); </script>";
  if ($objPesanan->hasil) {
    echo '<script> window.location="index.php?p=lihatpesanan"; </script>';
  }
} else if (isset($_GET['userid'])) {
  $objUser->userid = $_GET['userid'];
  $objUser->LihatSatuPesanan();
}
?>
<div class="container">
  <div class="col-md-6">
    <h3>Ubah User</h3>
    <form class="form-horizontal" action="" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $objUser->email; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="password">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $objUser->password; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="role">Peran:</label>
        <div class="col-sm-10">
          <select name="role" require class="form-control" required>
            <?php
            $arrayRole = array("owner", "admin");
            foreach ($arrayRole as $selectedRole) {
              if ($objUser->role == $selectedRole)
                echo '<option selected="true" value="' . $selectedRole . '">' . $selectedRole . '</option>';
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
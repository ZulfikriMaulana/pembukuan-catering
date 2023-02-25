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
          <h3 class="box-title">Tambah Transaksi</h3>
        </div>
        <div class="box-body">

          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

<!--------------------------------------------------------------------------------------------------->

          <div class="col-md-5"><!--COLUMN-->
            
            <div class="row"><!--ROW ID Pesanan-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_transaksi">ID Pesanan:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" readonly>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Tanggal Bayar-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="tanggal_transaksi">Tanggal Bayar:</label>
                  <div class="col-sm-7">
                    <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Jenis-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="jenis_transaksi">Jenis:</label>
                  <div class="col-sm-7">
                    <select class="form-control" id="jenis_transaksi" name="jenis_transaksi" required>
                    <option value="1">Pemasukan</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Kategori-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="id_kategori">Kategori:</label>
                  <div class="col-sm-7">
                    <select class="form-control" id="id_kategori" name="id_kategori" required>
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
                  <textarea class="form-control" id="keterangan_transaksi" name="keterangan_transaksi" rows="2" cols="20"></textarea>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Upload-->
                <div class="form-group">
                  <label class="control-label col-sm-5" for="foto_transaksi">Upload Bukti bayar:</label>
                  <div class="col-sm-7">
                    <input type="file" class="form-control" id="foto_transaksi" name="foto_transaksi" required>
                  </div>
                </div>
              </div>

              <div class="row"><!--ROW Button-->
            <div class="form-group">
              <div class="col-sm-offset-5 col-sm-7">
              <input type="submit" class="btn btn-success" value="Simpan" name="btnSubmit">
              <a href="dashboard.php?p=lihatpesanan" class="btn btn-danger">Batal</a></td>
              </div>
            </div>
          </div>

              <!----------------------------------------------------------------------------------------------->

             
        </div>
        </form>
</section>
</div>
</section>
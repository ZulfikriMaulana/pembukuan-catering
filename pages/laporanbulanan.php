<section class="content-header">
  <h1>
    LAPORAN
    <small>Data Laporan</small>
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
          <h3 class="box-title">Filter Laporan</h3>
        </div>
        <div class="box-body">
          <form method="post" action="">
            <div class="row">
              <!-- <div class="col-md-3">

                  <div class="form-group">
                    <label>Mulai Tanggal</label>
                    <input autocomplete="off" type="date" value="<?php if (isset($_POST['tanggal_dari'])) {
                                                                    echo $_POST['tanggal_dari'];
                                                                  } else {
                                                                    echo "";
                                                                  } ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input autocomplete="off" type="date" value="<?php if (isset($_POST['tanggal_sampai'])) {
                                                                    echo $_POST['tanggal_sampai'];
                                                                  } else {
                                                                    echo "";
                                                                  } ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                  </div>

                </div> -->
              <div class="col-md-3">

                <div class="form-group">
                  <label>Bulan :</label>
                  <input type="month" id="bulan" name="bulan" class="form-control">
                  <!-- <select id="bulan" name="bulan" class="form-control">
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select> -->
                </div>

              </div>
              <div class="col-md-3">

                <div class="form-group">
                  <label>Kategori</label>
                  <select name="kategori" class="form-control" required="required">
                    <option value="semua">- Semua Kategori -</option>
                    <?php
                    require_once('./class/class.Kategori.php');
                    $objKategori = new Kategori();
                    $KategoriList = $objKategori->LihatSemuaKategori();
                    foreach ($KategoriList as $Kategori) {
                      echo '<option value=' . $Kategori->id_kategori . '>' . $Kategori->nama_kategori . '</option>';
                    }
                    ?>
                  </select>
                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">
                  <br />
                  <input type="submit" value="TAMPILKAN" name="btnSubmit" class="btn btn-sm btn-primary btn-block">
                </div>

              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Laporan Pemasukan & Pegeluaran</h3>
        </div>
        <div class="box-body">

          <?php
          if (isset($_POST['btnSubmit'])) {

            $bulan = $_POST['bulan'];
            $id_kategori = $_POST['kategori'];
          ?>

            <div class="row">
              <div class="col-lg-6">
                <table class="table table-bordered">
                  <tr>
                    <th width="30%">Bulan</th>
                    <th width="1%">:</th>
                    <td><?php echo $bulan; ?></td>
                  </tr>
                  <tr>
                    <th>KATEGORI</th>
                    <th>:</th>
                    <td>
                      <?php
                      if ($id_kategori == "semua") {
                        echo "SEMUA KATEGORI";
                      } else {
                        $objKategori->id_kategori = $id_kategori;
                        $objKategori->LihatSatuKategori();
                        echo $objKategori->nama_kategori;
                      }
                      ?>

                    </td>
                  </tr>
                </table>

              </div>
            </div>

            <a href="laporan_pdf.php?tanggal_dari=<?php //echo $tgl_dari 
                                                  ?>&tanggal_sampai=<?php //echo $tgl_sampai 
                                                                      ?>&kategori=<?php //echo $kategori 
                                                                                  ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp CETAK PDF</a>
            <a href="laporan_print.php?tanggal_dari=<?php //echo $tgl_dari 
                                                    ?>&tanggal_sampai=<?php //echo $tgl_sampai 
                                                                        ?>&kategori=<?php //echo $kategori 
                                                                                    ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="1%" rowspan="2">NO</th>
                    <th width="10%" rowspan="2" class="text-center">TANGGAL</th>
                    <th rowspan="2" class="text-center">KATEGORI</th>
                    <th rowspan="2" class="text-center">KETERANGAN</th>
                    <th colspan="2" class="text-center">JENIS</th>
                  </tr>
                  <tr>
                    <th class="text-center">PEMASUKAN</th>
                    <th class="text-center">PENGELUARAN</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  require_once('./class/class.transaksi.php');
                  $objTransaksi = new Transaksi();
                  $no = 1;
                  $total_pemasukan = 0;
                  $total_pengeluaran = 0;
                  $arrayResult = $objTransaksi->LihatLaporanBulanan($bulan, $id_kategori);
                  foreach ($arrayResult as $dataTransaksi) {
                    if ($dataTransaksi->jenis_transaksi == "Pemasukan") {
                      $total_pemasukan += $dataTransaksi->nominal_transaksi;
                    } elseif ($dataTransaksi->jenis_transaksi == "Pengeluaran") {
                      $total_pengeluaran += $dataTransaksi->nominal_transaksi;
                    }
                    echo '<tr>';
                    echo '<td>' . $no . '</td>';
                    echo '<td>' . date('d-m-Y', strtotime($dataTransaksi->tanggal_transaksi)) . '</td>';
                    echo '<td>' . $dataTransaksi->id_kategori . '</td>';
                    echo '<td>' . $dataTransaksi->keterangan_transaksi . '</td>';
                    //echo '<td>' . $dataTransaksi->jenis_transaksi . '</td>';
                    if ($dataTransaksi->jenis_transaksi == "Pemasukan")
                      echo '<td>' . $dataTransaksi->nominal_transaksi . '</td>';
                    else
                      echo '<td>' . ' - ' . '</td>';
                    if ($dataTransaksi->jenis_transaksi == "Pengeluaran")
                      echo '<td>' . $dataTransaksi->nominal_transaksi . '</td>';
                    else
                      echo '<td>' . ' - ' . '</td>';
                    //echo '<td>' . $dataTransaksi->pemasukan . '</td>';//edit lagi menyesuaikan backend
                    //echo '<td>' . $dataTransaksi->pengeluaran . '</td>';//edit lagi menyesuaikan backend / perbaiki lagi href untuk tombol bukti
                    echo '</tr>';

                    $no++;
                  }
                  ?>
                  <tr>
                    <th colspan="4" class="text-right">TOTAL</th>
                    <td class="text-center text-bold text-success"><?php //echo "Rp. " . number_format($total_pemasukan) . " ,-";
                                                                    ?></td>
                    <td class="text-center text-bold text-danger"><?php //echo "Rp. " . number_format($total_pengeluaran) . " ,-";
                                                                  ?></td>
                  </tr>
                  <tr>
                    <th colspan="4" class="text-right">SALDO</th>
                    <td colspan="2" class="text-center text-bold text-white bg-primary"><?php //echo "Rp. " . number_format($total_pemasukan - $total_pengeluaran) . " ,-";
                                                                                        ?></td>
                  </tr>
                </tbody>
              </table>



            </div>

          <?php
          } else {
          ?>

            <div class="alert alert-info text-center">
              Silahkan Filter Laporan Terlebih Dulu.
            </div>

          <?php
          }
          ?>

        </div>
      </div>
    </section>
  </div>
</section>

</div>
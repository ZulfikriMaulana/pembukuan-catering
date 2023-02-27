<section class="content-header">
	<h1>
		Transaksi
		<small>Data Pemasukan & Pengeluaran</small>
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
					<h3 class="box-title">Kelola Transaksi</h3>
					<div class="btn-group pull-right">
						<a class="btn btn-info btn-sm" href="dashboard.php?p=tambahpesanan"><i class="fa fa-plus"></i> &nbsp Tambah Pesanan</a>
					</div>
				</div>
				<div class="box-body">

					<div id="result" style="width: 100%;" class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="1%" rowspan="2">NO</th>
								<th width="10%" rowspan="2" class="text-center">TANGGAL</th>
								<th rowspan="2" class="text-center">KATEGORI</th>
								<th rowspan="2" class="text-center">KETERANGAN</th>
								<th colspan="2" class="text-center">JENIS</th>
								<th rowspan="2" width="10%" class="text-center">OPSI</th>
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
								$arrayResult = $objTransaksi->LihatSemuaTransaksi();
								foreach ($arrayResult as $dataTransaksi) {
									echo '<tr>';
									echo '<td>' . $no . '</td>';
									echo '<td>' . $dataTransaksi->id_transaksi . '</td>';
									echo '<td>' . $dataTransaksi->id_pesanan . '</td>';
									echo '<td>' . date('d-m-Y', strtotime($dataTransaksi->tanggal_transaksi)) . '</td>';
									echo '<td>' . $dataTransaksi->jenis_transaksi . '</td>';
									echo '<td>' . $dataTransaksi->keterangan_transaksi . '</td>';
									echo '<td>' . $dataTransaksi->foto_transaksi . '</td>';
									echo '<td>' . $dataTransaksi->nominal_transaksi . '</td>';
									echo '<td><a class="btn btn-success btn-sm"  href="dashboard.php?p=bayarpesanan&id_pesanan=' . $dataPesanan->id_pesanan . '">Bayar</a> 
									<a class="btn btn-warning btn-sm"  href="dashboard.php?p=ubahpesanan&id_pesanan=' . $dataPesanan->id_pesanan . '">Ubah</a> |
   			          <a class="btn btn-danger btn-sm"  href="dashboard.php?p=hapuspesanan&id_pesanan=' . $dataPesanan->id_pesanan . '" 
		 			  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Hapus</a>							  
				  </td>';
									echo '</tr>';

									$no++;
								}

								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>

<script>
	$(document).ready(function() {
		$('.table').DataTable({
			'paging': true,
			'lengthChange': false,
			'searching': true,
			'ordering': false,
			'info': true,
			'autoWidth': false,
			"pageLength": 50
		});
	});
</script>
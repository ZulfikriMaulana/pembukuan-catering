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
					<h3 class="box-title">Kelola Pesanan</h3>
					<div class="btn-group pull-right">
						<a class="btn btn-info btn-sm" href="dashboard.php?p=tambahpesanan"><i class="fa fa-plus"></i> &nbsp Tambah Pesanan</a>
					</div>
				</div>
				<div class="box-body">

					<div id="result" style="width: 100%;" class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th style="vertical-align: middle;">No.</th>
									<th style="vertical-align: middle;">Id</th>
									<th style="vertical-align: middle;width:50px">Tanggal</th>
									<th style="vertical-align: middle;">Pelanggan</th>
									<th style="vertical-align: middle;">Item</th>
									<th style="vertical-align: middle;">Jumlah</th>
									<th style="vertical-align: middle;">Subtotal</th>
									<th style="vertical-align: middle;">Pajak</th>
									<th style="vertical-align: middle;">Total</th>
									<th style="vertical-align: middle;">Status</th>
									<th style="vertical-align: middle; width:150px; text-align:center">Aksi</th>
								</tr>
							</thead>
							<tbody>

								<?php
								require_once('./class/class.pesanan.php');
								$objUser = new Pesanan();
								$no = 1;
								$arrayResult = $objUser->LihatSemuaPesanan();
								foreach ($arrayResult as $dataPesanan) {
									echo '<tr>';
									echo '<td>' . $no . '</td>';
									echo '<td>' . $dataPesanan->id_pesanan . '</td>';
									echo '<td>' . date('d-m-Y', strtotime($dataPesanan->tanggal_pesanan)) . '</td>';
									echo '<td>' . $dataPesanan->nama_instansi . '</td>';
									echo '<td>' . $dataPesanan->nama_item . '</td>';
									echo '<td>' . $dataPesanan->jumlah_pesanan . '</td>';
									echo '<td>' . "Rp " . number_format($dataPesanan->subtotal_pesanan, 0, ',','.') . '</td>';
									echo '<td>' . "Rp " . number_format($dataPesanan->pajak_pesanan, 0, ',','.') . '</td>';
									echo '<td>' . "Rp " . number_format($dataPesanan->total_pesanan, 0, ',','.') . '</td>';
									echo '<td>' . $dataPesanan->status . '</td>';
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
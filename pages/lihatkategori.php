<section class="content-header">
	<h1>
		Kategori
		<small>Data Kategori</small>
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
					<h3 class="box-title">Kelola Kategori</h3>
					<div class="btn-group pull-right">
						<a class="btn btn-info btn-sm" href="dashboard.php?p=tambahkategori"><i class="fa fa-plus"></i> &nbsp Tambah Kategori</a>
					</div>
				</div>
				<div class="box-body">

					<div id="result" style="width: 100%;" class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th width="1%" rowspan="2">NO</th>
									<th rowspan="2" class="text-center">KATEGORI</th>
									<th rowspan="2" width="20%" class="text-center">JENIS</th>
									<th rowspan="2" width="11%" class="text-center">AKSI</th>
								</tr>
							</thead>
							<tbody>

								<?php
								require_once('./class/class.kategori.php');
								$objKategori = new Kategori();
								$no = 1;
								$arrayResult = $objKategori->LihatSemuaKategori(); //ubah jadi kategori
								foreach ($arrayResult as $dataKategori) {
									echo '<tr>';
									echo '<td>' . $no . '</td>';
									//echo '<td>' . date('d-m-Y', strtotime($dataTransaksi->tanggal_transaksi)) . '</td>';
									echo '<td>' . $dataKategori->nama_kategori . '</td>';
									//echo '<td>' . $dataTransaksi->keterangan_transaksi . '</td>';
									echo '<td>' . $dataKategori->jenis . '</td>';
									/*if($dataTransaksi->jenis_transaksi == "Pemasukan")
										echo '<td>' . $dataTransaksi->nominal_transaksi . '</td>';
									else
										echo '<td>' . ' - ' . '</td>';
									if($dataTransaksi->jenis_transaksi == "Pengeluaran")
										echo '<td>' . $dataTransaksi->nominal_transaksi . '</td>';
									else
										echo '<td>' . ' - ' . '</td>';*/
									//echo '<td>' . $dataTransaksi->pemasukan . '</td>';//edit lagi menyesuaikan backend
									//echo '<td>' . $dataTransaksi->pengeluaran . '</td>';//edit lagi menyesuaikan backend / perbaiki lagi href untuk tombol bukti
									echo '<td><a class="btn btn-warning btn-sm"  href="dashboard.php?p=ubahkategori&id_kategori=' . $dataKategori->id_kategori . '">Ubah</a>
											  <a class="btn btn-danger btn-sm"  href="dashboard.php?p=hapuskategori&id_kategori=' . $dataKategori->id_kategori . '" 
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
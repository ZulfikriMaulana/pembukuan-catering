<section class="content-header">
	<h1>
		Pelanggan
		<small>Data Pelanggan</small>
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
					<h3 class="box-title">Kelola Pelanggan</h3>
					<div class="btn-group pull-right">
						<a class="btn btn-info btn-sm" href="dashboard.php?p=tambahpelanggan"><i class="fa fa-plus"></i> &nbsp Tambah Pelanggan</a>
					</div>
				</div>
				<div class="box-body">

					<div id="result" style="width: 100%;" class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th width="1%" rowspan="2">NO</th>
									<th rowspan="2" class="text-center">PELANGGAN</th>
									<th rowspan="2" class="text-center">ALAMAT</th>
									<th rowspan="2" class="text-center">NAMA</th>
									<th rowspan="2" class="text-center">No. HP</th>
									<th rowspan="2" width="16%" class="text-center">AKSI</th>
								</tr>
							</thead>
							<tbody>

								<?php
								require_once('./class/class.pelanggan.php');
								$objPelanggan = new Pelanggan();
								$no = 1;
								$arrayResult = $objPelanggan->LihatSemuaPelanggan(); //ubah jadi kategori
								foreach ($arrayResult as $dataPelanggan) {
									echo '<tr>';
									echo '<td>' . $no . '</td>';
									echo '<td>' . $dataPelanggan->nama_instansi . '</td>';
									echo '<td>' . $dataPelanggan->alamat . '</td>';
									echo '<td>' . $dataPelanggan->nama_cp . '</td>';
									echo '<td>' . $dataPelanggan->no_hp . '</td>';
									echo '<td><a class="btn btn-warning btn-sm"  href="dashboard.php?p=ubahpelanggan&id_pelanggan=' . $dataPelanggan->id_pelanggan . '">Ubah</a>
											  <a class="btn btn-danger btn-sm"  href="dashboard.php?p=hapuspelanggan&id_pelanggan=' . $dataPelanggan->id_pelanggan . '" 
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
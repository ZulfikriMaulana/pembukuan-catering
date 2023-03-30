<section class="content-header">
	<h1>
		Item Pesanan
		<small>Data Item Pesanan</small>
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
					<h3 class="box-title">Kelola Item Pesanan</h3>
					<div class="btn-group pull-right">
						<a class="btn btn-info btn-sm" href="dashboard.php?p=tambahitempesanan"><i class="fa fa-plus"></i> &nbsp Tambah Item Pesanan</a>
					</div>
				</div>
				<div class="box-body">

					<div id="result" style="width: 100%;" class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th width="1%" rowspan="2">NO</th>
									<th rowspan="2" class="text-center">NAMA ITEM</th>
									<th rowspan="2" class="text-center">HARGA JUAL</th>
									<th rowspan="2" class="text-center">HARGA MODAL</th>
                                    <th rowspan="2" width="17%" class="text-center">AKSI</th>
								</tr>
							</thead>
							<tbody>

								<?php
								require_once('./class/class.ItemPesanan.php');
								$objItemPesanan = new ItemPesanan();
								$no = 1;
								$arrayResult = $objItemPesanan->LihatSemuaItemPesanan(); //ubah jadi ItemPesanan
								foreach ($arrayResult as $dataItemPesanan) {
									echo '<tr>';
									echo '<td>' . $no . '</td>';
									echo '<td>' . $dataItemPesanan->nama_item . '</td>';
									echo '<td>' . "Rp. " . number_format($dataItemPesanan->harga_jual, 0, ',','.') . '</td>';
									echo '<td>' . "Rp. " . number_format($dataItemPesanan->harga_modal, 0, ',','.') . '</td>';
									echo '<td><a class="btn btn-warning btn-sm"  href="dashboard.php?p=ubahitempesanan&id_item_pesanan=' . $dataItemPesanan->id_item_pesanan . '">Ubah</a>
											  <a class="btn btn-danger btn-sm"  href="dashboard.php?p=hapusitempesanan&id_item_pesanan=' . $dataItemPesanan->id_item_pesanan . '" 
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
<div class="container">
	<div class="col-md-10">
		<h4 class="title"><span class="text"><strong>Kelola Pesanan</strong></span></h4>
		<a class="btn btn-primary" href="index.php?p=tambahpesanan">Tambah Pesanan</a>
		<br><br>

		<div id="result" style="width: 100%;" class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th style="vertical-align: middle;">No.</th>
						<th style="vertical-align: middle;">User Id.</th>
						<th style="vertical-align: middle;">Email</th>
						<th style="vertical-align: middle;">Peran</th>
						<th style="vertical-align: middle;">Aksi</th>
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
						echo '<td>' . $dataPesanan->tanggal_pesanan . '</td>';
						echo '<td>' . $dataPesanan->id_pelanggan . '</td>';
						echo '<td>' . $dataPesanan->alamat_pelanggan . '</td>';
						echo '<td>' . $dataPesanan->nama_pelanggan . '</td>';
						echo '<td>' . $dataPesanan->no_hp . '</td>';
						echo '<td>' . $dataPesanan->id_item_pesanan . '</td>';
						echo '<td>' . $dataPesanan->jumlah_pesanan . '</td>';
						echo '<td>' . $dataPesanan->catatan . '</td>';
						echo '<td>' . $dataPesanan->subtotal_pesanan . '</td>';
						echo '<td>' . $dataPesanan->pajak_pesanan . '</td>';
						echo '<td>' . $dataPesanan->total_pesanan . '</td>';
						echo '<td><a class="btn btn-warning btn-sm"  href="index.php?p=ubahuser&userid=' . $dataPesanan->id_pesanan . '">Ubah</a> |
   			          <a class="btn btn-danger btn-sm"  href="index.php?p=hapususer&userid=' . $dataPesanan->id_pesanan . '" 
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

<script>
	$(document).ready(function() {
		$('.table').DataTable();
	});
</script>
<section class="content-header">
	<h1>
		Pengguna
		<small>Data Pengguna</small>
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
					<h3 class="box-title">Kelola Pengguna</h3>
					<div class="btn-group pull-right">
						<a class="btn btn-info btn-sm" href="dashboard.php?p=tambahuser"><i class="fa fa-plus"></i> &nbsp Tambah User</a>
					</div>
				</div>
				<div class="box-body">
  <div id="result" style="width: 100%;" class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th style="vertical-align: middle;">No.</th>
                    <th style="vertical-align: middle;">User Id.</th>
					<th style="vertical-align: middle;">Nama</th>
                    <th style="vertical-align: middle;">Email</th>
                    <th style="vertical-align: middle;">Peran</th>
                    <th style="vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
			<tbody>

	<?php
		require_once('./class/class.User.php'); 		
		$objUser = new User(); 
		$no = 1;	
		$arrayResult = $objUser->LihatSemuaUser();
		foreach ($arrayResult as $dataUser) {
			echo '<tr>';
			echo '<td>'.$no.'</td>';	
			echo '<td>'.$dataUser->userid.'</td>';	
			echo '<td>'.$dataUser->nama.'</td>';
			echo '<td>'.$dataUser->email.'</td>';
			echo '<td>'.$dataUser->nama_role.'</td>';
			echo '<td><a class="btn btn-warning btn-sm"  href="dashboard.php?p=ubahuser&userid='.$dataUser->userid.'">Ubah</a> |
   			          <a class="btn btn-danger btn-sm"  href="dashboard.php?p=hapususer&userid='.$dataUser->userid.'" 
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
<div class="container">  
<div class="col-md-10">			
  <h4 class="title"><span class="text"><strong>Kelola User</strong></span></h4>
  <a class="btn btn-primary" href="index.php?p=tambahuser">Tambah User</a>
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
		require_once('./class/class.User.php'); 		
		$objUser = new User(); 
		$no = 1;	
		$arrayResult = $objUser->LihatSemuaUser();
		foreach ($arrayResult as $dataUser) {
			echo '<tr>';
			echo '<td>'.$no.'</td>';	
			echo '<td>'.$dataUser->userid.'</td>';	
			echo '<td>'.$dataUser->email.'</td>';
			echo '<td>'.$dataUser->role.'</td>';
			echo '<td><a class="btn btn-warning btn-sm"  href="index.php?p=ubahuser&userid='.$dataUser->userid.'">Ubah</a> |
   			          <a class="btn btn-danger btn-sm"  href="index.php?p=hapususer&userid='.$dataUser->userid.'" 
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
	$(document).ready(function () {
		$('.table').DataTable();        
	});

</script>


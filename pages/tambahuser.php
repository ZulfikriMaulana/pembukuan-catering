<?php 
require_once('./class/class.User.php'); 	
require_once('./class/class.Role.php'); 	

$objUser = new User(); 

if(isset($_POST['btnSubmit'])){	
	$objUser->email = $_POST['email'];	
  $objUser->nama = $_POST['nama'];	
	$objUser->password = $_POST['password'];	
	$objUser->role = $_POST['role'];

	$objUser->TambahUser();

  echo "<script> alert('$objUser->message'); </script>";
	if($objUser->hasil){
		echo '<script> window.location="dashboard.php?p=lihatuser"; </script>';		
	}
}
?>
<section class="content">
  <div class="row">
	<section class="col-lg-12">
	  <div class="box box-info">

		<div class="box-header">
		  <h3 class="box-title">Tambah User</h3>		
		</div>
		<div class="box-body">
<div class="col-md-6">
  <form class="form-horizontal" action="" method="post">
  <div class="form-group">
      <label class="control-label col-sm-2" for="nama">Nama:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" placeholder="Enter nama" name="nama">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">        
      <label class="control-label col-sm-2" for="role">Peran:</label>
      <div class="col-sm-10">          
      <select name="role" require class="form-control" required>
      <?php
        $objRole = new Role();
        $roleList = $objRole->LihatSemuaRole();
        foreach ($roleList as $role){ 								          
          echo '<option value='.$role->id_role.'>'.$role->nama_role.'</option>';
        }
      ?>		
	</select>	
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-success" value="Simpan" name="btnSubmit">
	      <a href="dashboard.php?p=lihatuser" class="btn btn-danger">Batal</a></td>
      </div>
    </div>
      </div>
  </form>
  </div>
	  </div>
	</section>
  </div>
</section>

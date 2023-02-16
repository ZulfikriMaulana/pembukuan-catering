<?php 
require_once('./class/class.User.php'); 		

if(isset($_POST['btnLogin'])){		
    
	$email = $_POST['email'];
	$password = $_POST['password'];	

    $objUser = new User(); 
	$objUser->hasil = true;
	$objUser->ValidateEmail($email);
		
	if($objUser->hasil){
		
		if($password == $objUser->password){
			if (!isset($_SESSION)) {
				session_start();
			}		  			
		
			$_SESSION["userid"]= $objUser->userid;
			$_SESSION["role"]= $objUser->role;
			$_SESSION["email"]= $objUser->email;		
			
			echo "<script>alert('Login sukses');</script>";						
			echo '<script>window.location = "dashboard.php";</script>';
		}
		else{
			echo "<script>alert('Password tidak match');</script>";							
		}
	}
	else{
		echo "<script>alert('Email tidak terdaftar');</script>";							
	} 	
}  
?>

<div class="login-box-body">

        <div class="text-center">

          <span style="color: green;">
            <center>
              <h5>Masukkan User & Password Anda</h5>
            </center>
          </span></p>

          <form action="" method="POST">
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Username" name="email" required="required" autocomplete="off">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" name="password" required="required" autocomplete="off">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-offset-8 col-xs-4">			    
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="btnLogin">Sign In</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>

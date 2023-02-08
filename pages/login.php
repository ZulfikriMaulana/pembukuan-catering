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
			echo '<script>window.location = "index.php?p=home";</script>';
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
<div class="container">  
<div class="col-md-6">			
  <h4 class="title"><span class="text"><strong>Login</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">	
	<tr>
	<td>Email</td>
	<td>:</td>
	<td>
	<input type="text" name="email" id="email" class="form-control" maxlength="30" required>
	</tr>	
	<tr>
	<td>Password</td>
	<td>:</td>
	<td>
	<input type="password" name="password" id="password" class="form-control" maxlength="30" required>
	</tr>		
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-success" value="Login" name="btnLogin">
	    <a href="index.php" class="btn btn-danger">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>






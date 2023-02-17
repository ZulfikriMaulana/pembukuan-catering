<?php
if(isset($_GET['userid'])){	
	require_once('./class/class.User.php'); 		
	$objUser = new User(); 
	$objUser->userid = $_GET['userid'];
	
	$objUser->HapusUser();
	echo "<script> alert('$objUser->message'); </script>";
	echo "<script>window.location = 'dashboard.php?p=lihatuser'</script>";			
		
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>


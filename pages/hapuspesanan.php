<?php
if(isset($_GET['id_pesanan'])){	
	require_once('./class/class.Pesanan.php'); 		
	$objPesanan = new Pesanan(); 
	$objPesanan->id_pesanan = $_GET['id_pesanan'];
	
	$objPesanan->HapusPesanan();
	echo "<script> alert('$objPesanan->message'); </script>";
	echo "<script>window.location = 'dashboard.php?p=lihatpesanan'</script>";			
		
}
else{		
	echo '<script>window.history.back()</script>';	
}

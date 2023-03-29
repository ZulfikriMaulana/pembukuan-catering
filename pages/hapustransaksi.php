<?php
if (isset($_GET['id_transaksi'])) {
	require_once('./class/class.Transaksi.php');
	$objTransaksi = new Transaksi();
	$objTransaksi->id_transaksi = $_GET['id_transaksi'];
	$objTransaksi->LihatSatuTransaksi();
	$folder = './bukti/';

	if(file_exists($folder .'/'.$objTransaksi->foto_transaksi)){
		unlink($folder .'/'.$objTransaksi->foto_transaksi);
		$objTransaksi->HapusTransaksi();

		if($objTransaksi->hasil){
			echo "<script> alert('$objTransaksi->message'); </script>";
			echo "<script>window.location = 'dashboard.php?p=lihattransaksi'</script>";
		}
	}
} else {
	echo '<script>window.history.back()</script>';
}

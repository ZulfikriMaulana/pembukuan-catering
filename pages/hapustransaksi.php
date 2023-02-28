<?php
if (isset($_GET['id_transaksi'])) {
	require_once('./class/class.Transaksi.php');
	$objTransaksi = new Transaksi();
	$objTransaksi->id_transaksi = $_GET['id_transaksi'];

	$objTransaksi->HapusTransaksi();
	echo "<script> alert('$objTransaksi->message'); </script>";
	echo "<script>window.location = 'dashboard.php?p=lihattransaksi'</script>";
} else {
	echo '<script>window.history.back()</script>';
}

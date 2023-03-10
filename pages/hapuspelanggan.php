<?php
if (isset($_GET['id_pelanggan'])) {
	require_once('./class/class.Pelanggan.php');
	$objPelanggan = new Pelanggan();
	$objPelanggan->id_pelanggan = $_GET['id_pelanggan'];

	$objPelanggan->HapusPelanggan(); //ubah di bagian classnya
	echo "<script> alert('$objPelanggan->message'); </script>";
	echo "<script>window.location = 'dashboard.php?p=lihatkategori'</script>";
} else {
	echo '<script>window.history.back()</script>';
}

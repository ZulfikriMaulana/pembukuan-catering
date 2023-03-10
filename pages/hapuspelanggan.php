<?php
if (isset($_GET['id_pelanggan'])) {
	require_once('./class/class.Pelanggan.php');
	$objKategori = new Pelanggan();
	$objKategori->id_kategori = $_GET['id_pelanggan'];

	$objKategori->HapusPelanggan(); //ubah di bagian classnya
	echo "<script> alert('$objKategori->message'); </script>";
	echo "<script>window.location = 'dashboard.php?p=lihatkategori'</script>";
} else {
	echo '<script>window.history.back()</script>';
}

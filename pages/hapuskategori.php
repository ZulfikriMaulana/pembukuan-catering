<?php
if (isset($_GET['id_kategori'])) {
	require_once('./class/class.Kategori.php');
	$objKategori = new Kategori();
	$objKategori->id_kategori = $_GET['id_kategori'];

	$objKategori->HapusKategori(); //ubah di bagian classnya
	echo "<script> alert('$objKategori->message'); </script>";
	echo "<script>window.location = 'dashboard.php?p=lihatkategori'</script>";
} else {
	echo '<script>window.history.back()</script>';
}

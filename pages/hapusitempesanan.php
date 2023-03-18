<?php
if (isset($_GET['id_item_pesanan'])) {
	require_once('./class/class.ItemPesanan.php');
	$objItemPesanan = new ItemPesanan();
	$objItemPesanan->id_item_pesanan = $_GET['id_item_pesanan'];

	$objItemPesanan->HapusItemPesanan(); 
	echo "<script> alert('$objItemPesanan->message'); </script>";
	echo "<script>window.location = 'dashboard.php?p=lihatitempesanan'</script>";
} else {
	echo '<script>window.history.back()</script>';
}

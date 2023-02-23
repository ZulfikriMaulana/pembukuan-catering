<?php

class ItemPesanan extends Connection
{
	private $id_item_pesanan = 0;
	private $nama_item = '';
	private $harga_jual = '';
	private $harga_modal = '';
	private $hasil = false;
	private $message = '';

	public function __get($atribute)
	{
		if (property_exists($this, $atribute)) {
			return $this->$atribute;
		}
	}

	public function __set($atribut, $value)
	{
		if (property_exists($this, $atribut)) {
			$this->$atribut = $value;
		}
	}

	function __construct()
	{
	}



	public function LihatSemuaItemPesanan()
	{
		$this->connect();
		$sql = "SELECT * FROM item_pesanan order by id_item_pesanan";
		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

		$arrResult = array();
		$i = 0;
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$objItemPesanan = new ItemPesanan();
				$objItemPesanan->id_item_pesanan = $data['id_item_pesanan'];
				$objItemPesanan->nama_item = $data['nama_item'];
				$objItemPesanan->harga_jual = $data['harga_jual'];
				$objItemPesanan->harga_modal = $data['harga_modal'];
				$arrResult[$i] = $objItemPesanan;
				$i++;
			}
		}
		return $arrResult;
	}
}

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

	public function LihatSatuItemPesanan()
	{
		$this->connect();
		$sql = "SELECT * FROM item_pesanan
				WHERE id_item_pesanan = $this->id_item_pesanan";

		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

		if (mysqli_num_rows($resultOne) == 1) {
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->id_item_pesanan = $data['id_item_pesanan'];
			$this->nama_item = $data['nama_item'];
			$this->harga_jual = $data['harga_jual'];
			$this->harga_modal = $data['harga_modal'];
		}
	}

	public function TambahItemPesanan()
	{
		$this->connect();


		$sql = "INSERT INTO item_pesanan(nama_item, harga_jual, harga_modal)
				values ('$this->nama_item', '$this->harga_jual', '$this->harga_modal')";
		$this->hasil = mysqli_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Item Pesanan berhasil ditambahkan!';
		else
			$this->message = 'Item Pesanan gagal ditambahkan!';
	}

	public function UbahItemPesanan() //set satu saja
	{
		$this->connect();
		$sql = "UPDATE item_pesanan 
			        SET nama_item='$this->nama_item',
					harga_jual='$this->harga_jual'
					harga_modal='$this->harga_modal'
					
					WHERE id_item_pesanan = $this->id_item_pesanan";

		$this->hasil = mysqli_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Item Pesanan berhasil diubah!';
		else
			$this->message = 'Item Pesanan gagal diubah!';
	}

	public function HapusItemPesanan()
	{
		$this->connect();
		$sql = "DELETE FROM item_pesanan WHERE id_item_pesanan=$this->id_item_pesanan";
		$this->hasil = mysqli_query($this->connection, $sql);
		if ($this->hasil)
			$this->message = 'Item Pesanan berhasil dihapus!';
		else
			$this->message = 'Item Pesanan gagal dihapus!';
	}
}

<?php

class Kategori extends Connection
{
	private $id_kategori = 0;
	private $nama_kategori = '';
	private $jenis = '';
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

	public function LihatSemuaKategori()
	{
		$this->connect();
		$sql = "SELECT * FROM kategori order by id_kategori";
		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

		$arrResult = array();
		$i = 0;
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$objKategori = new Kategori();
				$objKategori->id_kategori = $data['id_kategori'];
				$objKategori->nama_kategori = $data['nama_kategori'];
				$objKategori->jenis = $data['pemasukan, pengeluaran'];

				$arrResult[$i] = $objKategori;
				$i++;
			}
		}
		return $arrResult;
	}
}

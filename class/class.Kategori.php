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
				$objKategori->jenis = $data['jenis'];

				$arrResult[$i] = $objKategori;
				$i++;
			}
		}
		return $arrResult;
	}

	public function LihatSatuKategori()
	{
		$this->connect();
		$sql = "SELECT * FROM kategori
				WHERE id_kategori = $this->id_kategori";

		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

		if (mysqli_num_rows($resultOne) == 1) {
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->id_kategori = $data['id_kategori'];
			$this->nama_kategori = $data['nama_kategori'];
			$this->jenis = $data['jenis'];
		}
	}

	public function HapusKategori()
	{
		$this->connect();
		$sql = "DELETE FROM kategori WHERE id_kategori=$this->id_kategori";
		$this->hasil = mysqli_query($this->connection, $sql);
		if ($this->hasil)
			$this->message = 'Kategori berhasil dihapus!';
		else
			$this->message = 'Kategori gagal dihapus!';
	}
}

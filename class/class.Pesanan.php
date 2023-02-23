<?php

class Pesanan extends Connection
{
	private $id_pesanan = 0;
	private $tanggal_pesanan = '';
	private $id_pelanggan = '';
	private $alamat_pelanggan = '';
	private $nama_pelanggan = '';
	private $no_hp = '';
	private $id_item_pesanan = '';
	private $jumlah_pesanan = '';
	private $catatan = '';
	private $subtotal_pesanan = '';
	private $pajak_pesanan = '';
	private $total_pesanan = '';
	private $hasil = false;
	private $status = '';
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

	public function TambahPesanan()
	{
		$this->connect();


		$sql = "INSERT INTO pesanan(tanggal_pesanan, id_pelanggan, alamat_pelanggan, nama_pelanggan, no_hp, id_item_pesanan, jumlah_pesanan, catatan, subtotal_pesanan, pajak_pesanan, total_pesanan, status)
				values ('$this->tanggal_pesanan', '$this->id_pelanggan', '$this->alamat_pelanggan', '$this->nama_pelanggan', '$this->no_hp', '$this->id_item_pesanan', '$this->jumlah_pesanan', '$this->catatan', '$this->subtotal_pesanan', '$this->pajak_pesanan', '$this->total_pesanan', 'Belum Lunas')";
		$this->hasil = mysqli_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Data berhasil ditambahkan!';
		else
			$this->message = 'Data gagal ditambahkan!';
	}

	public function UbahPesanan() //set satu saja
	{
		$this->connect();
		$sql = "UPDATE pesanan 
			        SET tanggal_pesanan = '$this->tanggal_pesanan',
                    id_item_pesanan='$this->id_item_pesanan',
					jumlah_pesanan='$this->jumlah_pesanan',
					catatan='$this->catatan',
					subtotal_pesanan='$this->subtotal_pesanan',
					pajak_pesanan='$this->pajak_pesanan',
					total_pesanan='$this->total_pesanan'
					
					WHERE id_pesanan = $this->id_pesanan";

		$this->hasil = mysqli_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Data berhasil diubah!';
		else
			$this->message = 'Data gagal diubah!';
	}


	public function HapusPesanan()
	{
		$this->connect();
		$sql = "DELETE FROM pesanan WHERE id_pesanan=$this->id_pesanan";
		$this->hasil = mysqli_query($this->connection, $sql);
		if ($this->hasil)
			$this->message = 'Data berhasil dihapus!';
		else
			$this->message = 'Data gagal dihapus!';
	}

	public function LihatSatuPesanan()
	{
		$this->connect();
		$sql = "SELECT * FROM pesanan
				WHERE id_pesanan = $this->id_pesanan";

		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

		if (mysqli_num_rows($resultOne) == 1) {
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->id_pesanan = $data['id_pesanan'];
			$this->tanggal_pesanan = $data['tanggal_pesanan'];
			$this->id_pelanggan = $data['id_pelanggan'];
			$this->alamat_pelanggan = $data['alamat_pelanggan'];
			$this->nama_pelanggan = $data['nama_pelanggan'];
			$this->no_hp = $data['no_hp'];
			$this->id_item_pesanan = $data['id_item_pesanan'];
			$this->jumlah_pesanan = $data['jumlah_pesanan'];
			$this->catatan = $data['catatan'];
			$this->subtotal_pesanan = $data['subtotal_pesanan'];
			$this->pajak_pesanan = $data['pajak_pesanan'];
			$this->total_pesanan = $data['total_pesanan'];
			$this->status = $data['status'];
		}
	}

	public function LihatSemuaPesanan()
	{
		$this->connect();
		$sql = "SELECT * FROM pesanan order by id_pesanan";
		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

		$arrResult = array();
		$i = 0;
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$objPesanan = new Pesanan();
				$objPesanan->id_pesanan = $data['id_pesanan'];
				$objPesanan->tanggal_pesanan = $data['tanggal_pesanan'];
				$objPesanan->id_pelanggan = $data['id_pelanggan'];
				$objPesanan->alamat_pelanggan = $data['alamat_pelanggan'];
				$objPesanan->nama_pelanggan = $data['nama_pelanggan'];
				$objPesanan->no_hp = $data['no_hp'];
				$objPesanan->id_item_pesanan = $data['id_item_pesanan'];
				$objPesanan->jumlah_pesanan = $data['jumlah_pesanan'];
				$objPesanan->catatan = $data['catatan'];
				$objPesanan->subtotal_pesanan = $data['subtotal_pesanan'];
				$objPesanan->pajak_pesanan = $data['pajak_pesanan'];
				$objPesanan->total_pesanan = $data['total_pesanan'];
				$objPesanan->status = $data['status'];

				$arrResult[$i] = $objPesanan;
				$i++;
			}
		}
		return $arrResult;
	}
}

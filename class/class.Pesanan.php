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


		$sql = "INSERT INTO pesanan(tanggal_pesanan, id_pelanggan, alamat_pelanggan, nama_pelanggan, no_hp, id_item_pesanan, jumlah_pesanan, catatan, subtotal_pesanan, pajak_pesanan, total_pesanan)
				values ('$this->tanggal_pesanan', '$this->id_pelanggan', '$this->alamat_pelanggan', '$this->nama_pelanggan', '$this->no_hp', '$this->id_item_pesanan', '$this->jumlah_pesanan', '$this->catatan', '$this->subtotal_pesanan', '$this->pajak_pesanan', '$this->total_pesanan')";
		$this->hasil = mysqli_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Data berhasil ditambahkan!';
		else
			$this->message = 'Data gagal ditambahkan!';
	}

	public function UbahPesanan() //set satu saja
	{
		$this->connect();
		$sql = "UPDATE user 
			        SET email = '$this->email',
                    password='$this->password',
					role='$this->role'
					WHERE userid = $this->userid";

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

	public function ValidateEmail($inputemail)
	{
		$this->connect();
		$sql = "SELECT * FROM user
				WHERE email = '$inputemail'";
		$result = mysqli_query($this->connection, $sql);
		if (mysqli_num_rows($result) == 1) {
			$this->hasil = true;
			$data = mysqli_fetch_assoc($result);
			$this->email = $data['email'];
			$this->userid = $data['userid'];
			$this->password = $data['password'];
			$this->role = $data['role'];
		}
	}


	public function LihatSatuUser()
	{
		$this->connect();
		$sql = "SELECT * FROM user
				WHERE userid = $this->userid";

		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

		if (mysqli_num_rows($resultOne) == 1) {
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->userid = $data['userid'];
			$this->password = $data['password'];
			$this->email = $data['email'];
			$this->role = $data['role'];
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
				//$objPesanan->id_pesanan = $data['userid'];
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
				$arrResult[$i] = $objPesanan;
				$i++;
			}
		}
		return $arrResult;
	}
}

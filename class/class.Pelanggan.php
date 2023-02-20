<?php

class Pelanggan extends Connection
{
	private $id_pelanggan = 0;
	private $nama_instansi = '';
	private $alamat = '';
	private $nama_cp = '';
	private $no_hp = '';

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

	public function TambahPelanggan()
	{
		$this->connect();


		$sql = "INSERT INTO pelanggan(nama_instansi, alamat, nama_cp, no_hp)
				values ('$this->nama_instansi','$this->alamat', '$this->nama_cp', '$this->no_hp')";
		$this->hasil = mysqli_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Data berhasil ditambahkan!';
		else
			$this->message = 'Data gagal ditambahkan!';
	}

	public function UbahPelanggan()
	{
		$this->connect();
		$sql = "UPDATE pelanggan 
			        SET nama_instansi = '$this->nama_instansi',
					alamat = '$this->alamat',
                    nama_cp='$this->nama_cp',
					no_hp='$this->no_hp'
					WHERE id_pelanggan = $this->id_pelanggan";

		$this->hasil = mysqli_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Data berhasil diubah!';
		else
			$this->message = 'Data gagal diubah!';
	}


	public function HapusPelanggan()
	{
		$this->connect();
		$sql = "DELETE FROM pelanggan WHERE id_pelanggan=$this->id_pelanggan";
		$this->hasil = mysqli_query($this->connection, $sql);
		if ($this->hasil)
			$this->message = 'Data berhasil dihapus!';
		else
			$this->message = 'Data gagal dihapus!';
	}

	public function LihatSatuPelanggan() //belum
	{
		$this->connect();
		$sql = "SELECT u.*, FROM pelanggan
				and id_pelanggan = $this->id_pelanggan";

		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

		if (mysqli_num_rows($resultOne) == 1) {
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->id_pelanggan = $data['id_pelanggan'];
			$this->nama_instansi = $data['nama_instansi'];
			$this->alamat = $data['alamat'];
			$this->nama_cp = $data['nama_cp'];
			$this->no_hp = $data['no_hp'];
		}
	}

	public function LihatSemuaPelanggan() //Belum
	{
		$this->connect();
		$sql = "SELECT u.*, r.nama_role FROM user u, role r where u.id_role = r.id_role order by userid";
		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

		$arrResult = array();
		$i = 0;
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$objUser = new User();
				$objUser->userid = $data['userid'];
				$objUser->email = $data['email'];
				$objUser->nama = $data['nama'];
				$objUser->password = $data['password'];
				$objUser->id_role = $data['id_role'];
				$objUser->nama_role = $data['nama_role'];
				$arrResult[$i] = $objUser;
				$i++;
			}
		}
		return $arrResult;
	}
}

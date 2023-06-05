<?php

class User extends Connection
{
	private $userid = 0;
	private $email = '';
	private $nama = '';
	private $password = '';
	private $id_role = '';
	private $nama_role = '';
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

	public function TambahUser()
	{
		$this->connect();


		$sql = "INSERT INTO user(nama, email, password, id_role)
				values ('$this->nama','$this->email', '$this->password', '$this->id_role')";
		$this->hasil = mysqli_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Data berhasil ditambahkan!';
		else
			$this->message = 'Data gagal ditambahkan!';
		return true;
	}

	public function UbahUser()
	{
		$this->connect();
		$sql = "UPDATE user 
			        SET nama = '$this->nama',
					email = '$this->email',
                    password='$this->password',
					id_role='$this->id_role'
					WHERE userid = $this->userid";

		$this->hasil = mysqli_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Data berhasil diubah!';
		else
			$this->message = 'Data gagal diubah!';
		return true;
	}


	public function HapusUser()
	{
		$this->connect();
		$sql = "DELETE FROM user WHERE userid=$this->userid";
		$this->hasil = mysqli_query($this->connection, $sql);
		if ($this->hasil)
			$this->message = 'Data berhasil dihapus!';
		else
			$this->message = 'Data gagal dihapus!';
		return true;
	}

	public function ValidateEmail($inputemail)
	{
		$this->connect();
		$sql = "SELECT u.*, r.nama_role FROM user u, role r where u.id_role = r.id_role
				and email = '$inputemail'";
		$result = mysqli_query($this->connection, $sql);
		if (mysqli_num_rows($result) == 1) {
			$this->hasil = true;
			$data = mysqli_fetch_assoc($result);
			$this->nama = $data['nama'];
			$this->email = $data['email'];
			$this->userid = $data['userid'];
			$this->password = $data['password'];
			$this->id_role = $data['id_role'];
			$this->nama_role = $data['nama_role'];
		}
		return true;
	}


	public function LihatSatuUser()
	{
		$this->connect();
		$sql = "SELECT u.*, r.nama_role FROM user u, role r where u.id_role = r.id_role
				and userid = $this->userid";

		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

		if (mysqli_num_rows($resultOne) == 1) {
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->userid = $data['userid'];
			$this->password = $data['password'];
			$this->email = $data['email'];
			$this->nama = $data['nama'];
			$this->nama_role = $data['nama_role'];
			$this->id_role = $data['id_role'];
		}
		return true;
	}

	public function LihatSemuaUser()
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

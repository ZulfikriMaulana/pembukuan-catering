<?php

class Transaksi extends Connection
{
	private $id_transaksi = 0;
	private $id_pesanan = '';
	private $id_kategori = '';
	private $tanggal_transaksi = '';
	private $jenis_transaksi = '';
	private $keterangan_transaksi = '';
	private $foto_transaksi = '';
	private $nominal_transaksi = '';
	private $tgl_dari = '';
	private $tgl_sampai = '';
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

	public function TambahTransaksi()
	{
		$this->connect();


		$sql = "INSERT INTO transaksi(id_transaksi, id_pesanan, id_kategori, tanggal_transaksi, jenis_transaksi, keterangan_transaksi, foto_transaksi, nominal_transaksi)
				values ('$this->id_transaksi', '$this->id_pesanan', '$this->id_kategori', '$this->tanggal_transaksi', '$this->jenis_transaksi', '$this->keterangan_transaksi', '$this->foto_transaksi', '$this->nominal_transaksi')";
		$this->hasil = mysqli_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Transaksi berhasil ditambahkan!';
		else
			$this->message = 'Transaksi gagal ditambahkan!';
	}

	public function UbahTransaksi() //set satu saja
	{
		$this->connect();
		$sql = "UPDATE transaksi 
			        SET id_transaksi = '$this->id_transaksi',
                    id_pesanan='$this->id_pesanan',
					id_kategori='$this->id_kategori',
					tanggal_transaksi='$this->tanggal_transaksi',
					jenis_transaksi='$this->jenis_transaksi',
					keterangan_transaksi='$this->keterangan_transaksi',
					foto_transaksi='$this->foto_transaksi',
					nominal_transaksi='$this->nominal_transaksi'
					
					WHERE id_transaksi = $this->id_transaksi";

		$this->hasil = mysqli_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Data berhasil diubah!';
		else
			$this->message = 'Data gagal diubah!';
	}

	public function HapusTransaksi()
	{
		$this->connect();
		$sql = "DELETE FROM transaksi WHERE id_transaksi=$this->id_transaksi";
		$this->hasil = mysqli_query($this->connection, $sql);
		if ($this->hasil)
			$this->message = 'Transaksi berhasil dihapus!';
		else
			$this->message = 'Transaksi gagal dihapus!';
	}

	public function LihatSatuTransaksi()
	{
		$this->connect();
		$sql = "SELECT * FROM transaksi
				WHERE id_transaksi = $this->id_transaksi";

		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

		if (mysqli_num_rows($resultOne) == 1) {
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->id_transaksi = $data['id_transaksi'];
			$this->id_pesanan = $data['id_pesanan'];
			$this->id_kategori = $data['id_kategori'];
			$this->tanggal_transaksi = $data['tanggal_transaksi'];
			$this->jenis_transaksi = $data['jenis_transaksi'];
			$this->keterangan_transaksi = $data['keterangan_transaksi'];
			$this->foto_transaksi = $data['foto_transaksi'];
			$this->nominal_transaksi = $data['nominal_transaksi'];
		}
	}

	public function LihatLaporanHarian($tgl_dari, $tgl_sampai, $id_kategori)
	{
		$this->connect();
		if ($id_kategori == 'semua') {
			$sql = "SELECT * FROM transaksi WHERE tanggal_transaksi between '$tgl_dari' and '$tgl_sampai'
		order by id_transaksi";
		} else {
			$sql = "SELECT * FROM transaksi WHERE tanggal_transaksi between '$tgl_dari' and '$tgl_sampai'
		and id_kategori = $id_kategori order by id_transaksi";
		}

		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
		$arrResult = array();
		$i = 0;
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$objTransaksi = new Transaksi();
				$objTransaksi->id_transaksi = $data['id_transaksi'];
				$objTransaksi->id_pesanan = $data['id_pesanan'];
				$objTransaksi->id_kategori = $data['id_kategori'];
				$objTransaksi->tanggal_transaksi = $data['tanggal_transaksi'];
				$objTransaksi->jenis_transaksi = $data['jenis_transaksi'];
				$objTransaksi->keterangan_transaksi = $data['keterangan_transaksi'];
				$objTransaksi->foto_transaksi = $data['foto_transaksi'];
				$objTransaksi->nominal_transaksi = $data['nominal_transaksi'];
				$arrResult[$i] = $objTransaksi;
				$i++;
			}
		}
		return $arrResult;
	}

	public function LihatLaporanBulanan($bulan, $id_kategori)
	{
		$this->connect();
		if ($id_kategori == 'semua') {
			$sql = "SELECT * FROM transaksi WHERE tanggal_transaksi between '$bulan'
		order by id_transaksi";
		} /*else {
			$sql = "SELECT * FROM transaksi WHERE tanggal_transaksi between '$tgl_dari' and '$tgl_sampai'
		and id_kategori = $id_kategori order by id_transaksi";
		}*/

		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
		$arrResult = array();
		$i = 0;
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$objTransaksi = new Transaksi();
				$objTransaksi->id_transaksi = $data['id_transaksi'];
				$objTransaksi->id_pesanan = $data['id_pesanan'];
				$objTransaksi->id_kategori = $data['id_kategori'];
				$objTransaksi->tanggal_transaksi = $data['tanggal_transaksi'];
				$objTransaksi->jenis_transaksi = $data['jenis_transaksi'];
				$objTransaksi->keterangan_transaksi = $data['keterangan_transaksi'];
				$objTransaksi->foto_transaksi = $data['foto_transaksi'];
				$objTransaksi->nominal_transaksi = $data['nominal_transaksi'];
				$arrResult[$i] = $objTransaksi;
				$i++;
			}
		}
		return $arrResult;
	}

	public function LihatLaporanTahunan($tahun, $id_kategori)
	{
		$this->connect();
		if ($id_kategori == 'semua') {
			$sql = "SELECT * FROM transaksi WHERE tanggal_transaksi between '$tahun'
		order by id_transaksi";
		} /*else {
			$sql = "SELECT * FROM transaksi WHERE tanggal_transaksi between '$tgl_dari' and '$tgl_sampai'
		and id_kategori = $id_kategori order by id_transaksi";
		}*/

		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
		$arrResult = array();
		$i = 0;
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$objTransaksi = new Transaksi();
				$objTransaksi->id_transaksi = $data['id_transaksi'];
				$objTransaksi->id_pesanan = $data['id_pesanan'];
				$objTransaksi->id_kategori = $data['id_kategori'];
				$objTransaksi->tanggal_transaksi = $data['tanggal_transaksi'];
				$objTransaksi->jenis_transaksi = $data['jenis_transaksi'];
				$objTransaksi->keterangan_transaksi = $data['keterangan_transaksi'];
				$objTransaksi->foto_transaksi = $data['foto_transaksi'];
				$objTransaksi->nominal_transaksi = $data['nominal_transaksi'];
				$arrResult[$i] = $objTransaksi;
				$i++;
			}
		}
		return $arrResult;
	}

	public function LihatSemuaTransaksi()
	{
		$this->connect();
		$sql = "SELECT * FROM transaksi order by id_transaksi";
		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

		$arrResult = array();
		$i = 0;
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$objTransaksi = new Transaksi();
				$objTransaksi->id_transaksi = $data['id_transaksi'];
				$objTransaksi->id_pesanan = $data['id_pesanan'];
				$objTransaksi->id_kategori = $data['id_kategori'];
				$objTransaksi->tanggal_transaksi = $data['tanggal_transaksi'];
				$objTransaksi->jenis_transaksi = $data['jenis_transaksi'];
				$objTransaksi->keterangan_transaksi = $data['keterangan_transaksi'];
				$objTransaksi->foto_transaksi = $data['foto_transaksi'];
				$objTransaksi->nominal_transaksi = $data['nominal_transaksi'];
				$arrResult[$i] = $objTransaksi;
				$i++;
			}
		}
		return $arrResult;
	}

	public function BayarTransaksi()
	{
		$this->connect();


		$sql = "INSERT INTO transaksi(id_transaksi, id_pesanan, id_kategori, tanggal_transaksi, jenis_transaksi, keterangan_transaksi, foto_transaksi, nominal_transaksi)
				values ('$this->id_transaksi', '$this->id_pesanan', '$this->id_kategori', '$this->tanggal_transaksi', '$this->jenis_transaksi', '$this->keterangan_transaksi',
				'$this->foto_transaksi', '$this->nominal_transaksi');";

		$sql .= "UPDATE pesanan 
				SET status = 'Lunas'
		
				WHERE id_pesanan = $this->id_pesanan";
		$this->hasil = mysqli_multi_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Transaksi Berhasil Dibayar!';
		else
			$this->message = 'Transaksi Gagal Dibayar!';
	}
}

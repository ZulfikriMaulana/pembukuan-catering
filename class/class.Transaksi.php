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

	public function UbahTransaksi() //set satu saja
	{
		$this->connect();
		$sql = "UPDATE transaksi 
			        SET id_transksi = '$this->id_transksi',
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

<?php

class Transaksi extends Connection
{
	private $id_transaksi = 0;
	private $id_pesanan = '';
	private $id_kategori = '';
	private $tanggal_transaksi = '';
	private $jenis_transksi = '';
	private $keterangan_transksi = '';
	private $foto_transksi = '';
	private $nominal_transksi = '';

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
					jenis_transksi='$this->jenis_transksi',
					keterangan_transksi='$this->keterangan_transksi',
					foto_transksi='$this->foto_transksi',
					nominal_transksi='$this->nominal_transksi'
					
					WHERE id_transksi = $this->id_transksi";

		$this->hasil = mysqli_query($this->connection, $sql);

		if ($this->hasil)
			$this->message = 'Data berhasil diubah!';
		else
			$this->message = 'Data gagal diubah!';
	}
}

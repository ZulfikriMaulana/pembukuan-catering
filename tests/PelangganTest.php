<?php

use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
include 'inc.koneksi.php';
require_once('./class/class.Pelanggan.php');

// Class untuk run Testing.
class PelangganTest extends TestCase
{
    /** @test */
    public function TambahPelanggan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Pelanggan();

        $obj->nama_instansi = 'Pelayanan';
        $obj->alamat = 'Margonda';
        $obj->nama_cp = 'Alya';
        $obj->no_hp = '0821';

        $this->assertEquals(true, $obj->TambahPelanggan());
    }

    /** @test */
    public function UbahPelanggan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Pelanggan();

        $obj->nama_instansi = 'Pelayanan';
        $obj->alamat = 'Margonda';
        $obj->nama_cp = 'Alya';
        $obj->no_hp = '0821';

        $this->assertEquals(true, $obj->UbahPelanggan());
    }

    /** @test */
    public function HapusPelanggan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Pelanggan();

        $obj->nama_instansi = 'Pelayanan';
        $obj->alamat = 'Margonda';
        $obj->nama_cp = 'Alya';
        $obj->no_hp = '0821';

        $this->assertEquals(true, $obj->HapusPelanggan());
    }

    /** @test */
    public function LihatSatuPelanggan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Pelanggan();

        $obj->nama_instansi = 'Pelayanan';
        $obj->alamat = 'Margonda';
        $obj->nama_cp = 'Alya';
        $obj->no_hp = '0821';

        $this->assertEquals(true, $obj->LihatSatuPelanggan());
    }

    /** @test */
    public function LihatSemuaPelanggan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Pelanggan();

        $obj->nama_instansi = 'Pelayanan';
        $obj->alamat = 'Margonda';
        $obj->nama_cp = 'Alya';
        $obj->no_hp = '0821';

        $this->assertEquals(true, $obj->LihatSemuaPelanggan());
    }
}

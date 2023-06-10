<?php

use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
include 'inc.koneksi.php';
require_once('./class/class.Transaksi.php');

// Class untuk run Testing.
class TransaksiTest extends TestCase
{
    /** @test */
    public function TambahTransaksi()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Transaksi();

        $obj->jenis_transaksi = 'Pengeluaran';
        $obj->keterangan_transaksi = 'ok';
        $obj->nominal_transaksi = '5000';

        $this->assertEquals(true, $obj->TambahTransaksi());
    }

    /** @test */
    public function UbahTransaksi()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Transaksi();

        $obj->id_transaksi = 5;
        $obj->jenis_transaksi = 'Pengeluaran';
        $obj->keterangan_transaksi = 'ok';
        $obj->nominal_transaksi = '5000';

        $this->assertEquals(true, $obj->UbahTransaksi());
    }

    /** @test */
    public function HapusTransaksi()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Transaksi();

        $obj->id_transaksi = 5;

        $this->assertEquals(true, $obj->HapusTransaksi());
    }

    /** @test */
    public function LihatSatuTransaksi()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Transaksi();

        $obj->id_transaksi = 1;

        $this->assertEquals(true, $obj->LihatSatuTransaksi());
    }

    /** @test */
    public function LihatLaporanHarian()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Transaksi();

        $obj->id_transaksi = 1;

        $this->assertEquals(true, $obj->LihatLaporanHarian);
    }
}

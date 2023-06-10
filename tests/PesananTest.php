<?php

use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
include 'inc.koneksi.php';
require_once('./class/class.Pesanan.php');

// Class untuk run Testing.
class PesananTest extends TestCase
{
    /** @test */
    public function TambahPesanan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Pesanan();

        $obj->tanggal_pesanan = '12-12-2002';
        $obj->id_pelanggan = '1';
        $obj->alamat_pelanggan = 'Depok';
        $obj->nama_pelanggan = 'Alya';
        $obj->no_hp = '0821';
        $obj->id_item_pesanan = '2';
        $obj->jumlah_pesanan = '20';
        $obj->catatan = 'HOHO';
        $obj->subtotal_pesanan = '1234';
        $obj->pajak_pesanan = '12';
        $obj->total_pesanan = '12345';

        $this->assertEquals(true, $obj->TambahPesanan());
    }

    /** @test */
    public function UbahPesanan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Pesanan();

        $obj->tanggal_pesanan = '12-12-2002';
        $obj->id_pelanggan = '1';
        $obj->alamat_pelanggan = 'Depok';
        $obj->nama_pelanggan = 'Alya';
        $obj->no_hp = '0821';
        $obj->id_item_pesanan = '2';
        $obj->jumlah_pesanan = '20';
        $obj->catatan = 'HOHO';
        $obj->subtotal_pesanan = '1234';
        $obj->pajak_pesanan = '12';
        $obj->total_pesanan = '12345';

        $this->assertEquals(true, $obj->UbahPesanan());
    }

    /** @test */
    public function HapusPesanan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Pesanan();

        $obj->id_pesanan = 5;

        $this->assertEquals(true, $obj->HapusPesanan());
    }

    /** @test */
    public function LihatSatuPesanan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Pesanan();

        $obj->id_pesanan = 1;

        $this->assertEquals(true, $obj->LihatSatuPesanan());
    }

    /** @test */
    public function LihatSemuaPesanan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Pesanan();

        $obj->tanggal_pesanan = '12-12-2002';
        $obj->id_pelanggan = '1';
        $obj->alamat_pelanggan = 'Depok';
        $obj->nama_pelanggan = 'Alya';
        $obj->no_hp = '0821';
        $obj->id_item_pesanan = '2';
        $obj->jumlah_pesanan = '20';
        $obj->catatan = 'HOHO';
        $obj->subtotal_pesanan = '1234';
        $obj->pajak_pesanan = '12';
        $obj->total_pesanan = '12345';

        $this->assertEquals(true, $obj->LihatSemuaPesanan());
    }
}

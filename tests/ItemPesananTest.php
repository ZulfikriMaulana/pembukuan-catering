<?php

use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
include 'inc.koneksi.php';
require_once('./class/class.ItemPesanan.php');

// Class untuk run Testing.
class ItemPesananTest extends TestCase
{
    /** @test */
    public function TambahItemPesanan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new ItemPesanan();

        $obj->nama_item = 'TestTambahItem';
        $obj->harga_jual = '10000';
        $obj->harga_modal = '5000';

        $this->assertEquals(true, $obj->TambahItemPesanan());
    }

    /** @test */
    public function UbahItemPesanan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new ItemPesanan();

        $obj->nama_item = 'TestTambahItem';
        $obj->harga_jual = '10000';
        $obj->harga_modal = '5000';

        $this->assertEquals(true, $obj->UbahItemPesanan());
    }

    /** @test */
    public function HapusItemPesanan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new ItemPesanan();

        $obj->nama_item = 'TestTambahItem';
        $obj->harga_jual = '10000';
        $obj->harga_modal = '5000';

        $this->assertEquals(true, $obj->HapusItemPesanan());
    }

    /** @test */
    public function LihatSatuItemPesanan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new ItemPesanan();

        $obj->nama_item = 'TestTambahItem';
        $obj->harga_jual = '10000';
        $obj->harga_modal = '5000';

        $this->assertEquals(true, $obj->LihatSatuItemPesanan());
    }

    /** @test */
    public function LihatSemuaItemPesanan()
    {
        // Kita pakai class yang mau kita test.
        $obj = new ItemPesanan();

        $obj->nama_item = 'TestTambahItem';
        $obj->harga_jual = '10000';
        $obj->harga_modal = '5000';

        $this->assertEquals(true, $obj->LihatSemuaItemPesanan());
    }
}

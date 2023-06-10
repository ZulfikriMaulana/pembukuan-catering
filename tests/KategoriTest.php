<?php

use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
include 'inc.koneksi.php';
require_once('./class/class.Kategori.php');

// Class untuk run Testing.
class KategoriTest extends TestCase
{
    /** @test */
    public function TesTambahKategori()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Kategori();

        $obj->nama_kategori = 'TestTambah';
        $obj->jenis = 'Pengeluaran';

        $this->assertEquals(true, $obj->TambahKategori());
    }

    /** @test */
    public function TesUbahKategori()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Kategori();

        $obj->id_kategori = 5;
        $obj->nama_kategori = 'TestLagi';
        $obj->jenis = 'Pengeluaran';

        $this->assertEquals(true, $obj->UbahKategori());
    }

    /** @test */
    public function HapusKategori()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Kategori();

        $obj->id_kategori = 5;
        $this->assertEquals(true, $obj->HapusKategori());
    }

    /** @test */
    public function LihatSatuKategori()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Kategori();

        $obj->id_kategori = 1;

        $this->assertEquals(true, $obj->LihatSatuKategori());
    }

    /** @test */
    public function TesLihatSemuaKategori()
    {
        $obj = new Kategori();
        $this->assertIsArray($obj->LihatSemuaKategori());
    }
}

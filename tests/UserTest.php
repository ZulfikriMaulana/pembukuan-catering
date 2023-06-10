<?php

use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
include 'inc.koneksi.php';
require_once('./class/class.User.php');

// Class untuk run Testing.
class UserTest extends TestCase
{
    /** @test */
    public function TambahUser()
    {
        // Kita pakai class yang mau kita test.
        $obj = new User();

        $obj->nama = 'Alya';
        $obj->email = 'AlyaGmail';
        $obj->password = 'qweasd';
        $obj->id_role = '3';
        $obj->userid = '3';

        $this->assertEquals(true, $obj->TambahUser());
    }

    /** @test */
    public function UbahUser()
    {
        // Kita pakai class yang mau kita test.
        $obj = new User();

        $obj->nama = 'Alya';
        $obj->email = 'AlyaGmail';
        $obj->password = 'qweasd';
        $obj->id_role = '3';
        $obj->userid = '3';

        $this->assertEquals(true, $obj->UbahUser());
    }

    /** @test */
    public function HapusUser()
    {
        // Kita pakai class yang mau kita test.
        $obj = new User();

        $obj->userid = 5;

        $this->assertEquals(true, $obj->HapusUser());
    }

    /** @test */
    public function ValidateEmail()
    {
        // Kita pakai class yang mau kita test.
        $obj = new User();

        $inputemail = 'AlyaGmail';

        $this->assertEquals(true, $obj->ValidateEmail($inputemail));
    }

    /** @test */
    public function LihatSatuUser()
    {
        // Kita pakai class yang mau kita test.
        $obj = new User();

        $obj->userid = 1;

        $this->assertEquals(true, $obj->LihatSatuUser());
    }

    /** @test */
    public function LihatSemuaUser()
    {
        // Kita pakai class yang mau kita test.
        $obj = new User();

        $obj->nama = 'Alya';
        $obj->email = 'AlyaGmail';
        $obj->password = 'qweasd';
        $obj->id_role = '3';
        $obj->userid = '3';

        $this->assertEquals(true, $obj->LihatSemuaUser());
    }
}

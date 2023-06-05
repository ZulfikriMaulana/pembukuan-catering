<?php

use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
include 'inc.koneksi.php';
require_once('./class/class.Role.php');

// Class untuk run Testing.
class RoleTest extends TestCase
{
    /** @test */
    public function LihatSemuaRole()
    {
        // Kita pakai class yang mau kita test.
        $obj = new Role();

        $obj->id_role = '3';
        $obj->nama_role = 'Admin';

        $this->assertEquals(true, $obj->LihatSemuaRole());
    }
}

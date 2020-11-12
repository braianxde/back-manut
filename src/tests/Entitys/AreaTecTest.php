<?php

use PHPUnit\Framework\TestCase;
use App\Entity\AreaTec;

class AreaTecTest extends TestCase {
    public function testAtributes()
    {
        $this->assertClassHasAttribute('id', AreaTec::class);
        $this->assertClassHasAttribute('nome', AreaTec::class);
    }
}
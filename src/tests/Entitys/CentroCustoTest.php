<?php

use PHPUnit\Framework\TestCase;

use App\Entity\CentroCusto;

class CentroCustoTest extends TestCase {
    public function testAtributes()
    {
        $this->assertClassHasAttribute('id', CentroCusto::class);
        $this->assertClassHasAttribute('nome', CentroCusto::class);
    }
}
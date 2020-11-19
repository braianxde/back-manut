<?php

use PHPUnit\Framework\TestCase;
use App\Entity\Usuario;

class UsuarioTest extends TestCase {
    public function testAtributes()
    {
        $this->assertClassHasAttribute('id', Usuario::class);
        $this->assertClassHasAttribute('nome', Usuario::class);
        $this->assertClassHasAttribute('email', Usuario::class);
        $this->assertClassHasAttribute('senha', Usuario::class);
        $this->assertClassHasAttribute('idCentroCusto', Usuario::class);
        $this->assertClassHasAttribute('idAreaTec', Usuario::class);
        $this->assertClassHasAttribute('token', Usuario::class);
    }
}
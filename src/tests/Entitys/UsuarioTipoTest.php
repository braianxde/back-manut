<?php

use PHPUnit\Framework\TestCase;

use App\Entity\UsuarioTipo;

class UsuarioTipoTest extends TestCase {
    public function testAtributes()
    {
        $this->assertClassHasAttribute('id', UsuarioTipo::class);
        $this->assertClassHasAttribute('descricao', UsuarioTipo::class);
    }
}
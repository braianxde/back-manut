<?php

use PHPUnit\Framework\TestCase;

use App\Entity\Tecnico;

class TecnicoTest extends TestCase {
    public function testAtributes()
    {
        $this->assertClassHasAttribute('id', Tecnico::class);
        $this->assertClassHasAttribute('nome', Tecnico::class);
        $this->assertClassHasAttribute('idAreaTec', Tecnico::class);
        $this->assertClassHasAttribute('idUsuario', Tecnico::class);
    }
}
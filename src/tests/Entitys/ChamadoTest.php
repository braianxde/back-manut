<?php

use PHPUnit\Framework\TestCase;

use App\Entity\Chamado;

class ChamadoTest extends TestCase {
    public function testAtributes()
    {
        $this->assertClassHasAttribute('id', Chamado::class);
        $this->assertClassHasAttribute('assunto', Chamado::class);
        $this->assertClassHasAttribute('texto', Chamado::class);
        $this->assertClassHasAttribute('dataAbertura', Chamado::class);
        $this->assertClassHasAttribute('dataFechamento', Chamado::class);
        $this->assertClassHasAttribute('status', Chamado::class);
        $this->assertClassHasAttribute('idUsuario', Chamado::class);
        $this->assertClassHasAttribute('idTecnico', Chamado::class);
        $this->assertClassHasAttribute('idAreaTec', Chamado::class);
        $this->assertClassHasAttribute('idEquipamento', Chamado::class);
    }
}
<?php

use PHPUnit\Framework\TestCase;

use App\Entity\Equipamento;

class EquipamentoTest extends TestCase {
    public function testAtributes()
    {
        $this->assertClassHasAttribute('id', Equipamento::class);
        $this->assertClassHasAttribute('nome', Equipamento::class);
        $this->assertClassHasAttribute('descricao', Equipamento::class);
    }
}
<?php

use PHPUnit\Framework\TestCase;

use App\Entity\Comentario;

class ComentarioTest extends TestCase {
    public function testAtributes()
    {
        $this->assertClassHasAttribute('id', Comentario::class);
        $this->assertClassHasAttribute('texto', Comentario::class);
        $this->assertClassHasAttribute('dataComentario', Comentario::class);
        $this->assertClassHasAttribute('idChamado', Comentario::class);
    }
}
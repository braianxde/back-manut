<?php

namespace Controller;
require_once "Entity/AreaTec.php";

use AreaTec;

class AreaTecController {
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager(); 
    }

    private function getTodosAreaTec(){
        $areaTecs = $this->entityManager->getRepository(AreaTec::class)->findAll();
    
        if (empty($areaTecs)) {
            throw new \Exception("Nenhuma Área Técnica encontrada");
        }

        return $areaTecs;
    }
}
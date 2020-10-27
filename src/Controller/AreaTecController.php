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

    public function getAreaTecs() {
        try {
            $areaTecs = $this->getTodosAreaTec();
            $results = [];

            if (empty($areaTecs)){
                throw new \Exception("Nenhuma Área Técnica encontrada");
            }

            foreach ($areaTecs as $areaTec) {
                $results[] = [
                    'id' => $areaTec->getId(),
                    'nome' => $areaTec->getNome()
                ];
            }

            return [
                "sucess" => true,
                "data" => $results
            ];

        } catch (\Exception $exception){
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }
}
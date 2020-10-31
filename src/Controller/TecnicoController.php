<?php

namespace Controller;
require_once "Entity/AreaTec.php";

use Tecnico;

class TecnicoController {
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager(); 
    }

    private function getTodosTecnico(){
        $tecnicos = $this->entityManager->getRepository(Tecnico::class)->findAll();
    
        if (empty($tecnicos)) {
            throw new \Exception("Nenhum técnico encontrado");
        }

        return $tecnicos;
    }

    public function getTecnicos() {
        try {
            $tecnicos = $this->getTodosTecnico();
            $results = [];

            if (empty($tecnicos)){
                throw new \Exception("Nenhum técnico encontrado");
            }

            foreach ($tecnicos as $tecnico) {
                $results[] = [
                    'id' => $tecnico->getId(),
                    'nome' => $tecnico->getNome(),
                    'idAreaTec' => $tecnico->getIdAreaTec(),
                    'idUsuario' => $tecnico->getIdUsuario()
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
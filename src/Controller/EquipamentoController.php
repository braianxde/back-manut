<?php

namespace Controller;
require_once "Entity/Equipamento.php";

use Equipamento;

class EquipamentoController {
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager(); 
    }

    private function getTodosEquipamentos(){
        $equipamentos = $this->entityManager->getRepository(Equipamento::class)->findAll();

        if (empty($equipamentos)){
            throw new \Exception("Nenhum equipamento encontrado");
        }
        return $equipamentos;
    }

    public function getEquipamentos() {
        try {
            $equipamentos = $this->getTodosEquipamentos();
            $results = [];

            if (empty($equipamentos)){
                throw new \Exception("Nenhum equipamento encontrado");
            }
            foreach ($equipamentos as $equipamento) {
                $results[] = [
                    'id' => $equipamento->getId(),
                    'nome' => $equipamento->getNome(),
                    'descricao' => $equipamento->getDescricao()
                ];
            }

            return [
                "sucess" => true,
                "data" => $results
            ];
        }
        
        catch (\Exception $exception){
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }

}
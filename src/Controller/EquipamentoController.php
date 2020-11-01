<?php

namespace Controller;
require_once "Entity/Equipamento.php";

use Equipamento;
use phpDocumentor\Reflection\Types\Array_;

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

    public function insertEquipamento() {
        $arrayEq = [
            [
                "id" => 123457,
                "nome" => "Computador Dell",
                "descricao" => "Core2dua, 4Gb RAM, HD240Gb"
            ],
            [
                'id'=>123489,
                'nome'=>'Maca',
                'descricao'=>'Metal cinza'
            ]
        ];  
        
        foreach($arrayEq as $eq){
            $equipamento = new Equipamento();
            $equipamento->setId($eq["id"]);
            $equipamento->setNome($eq["nome"]);
            $equipamento->setDescricao($eq["descricao"]);
            
            $this->entityManager->persist($equipamento);
            $this->entityManager->flush();
        }
            
        return [
            "success" => true
        ];
        
    }

}
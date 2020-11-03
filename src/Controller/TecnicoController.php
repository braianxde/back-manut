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

    public function insertTecnico() {
        $arrayTec = [
            ["nome" =>"Braian", "idAreaTec"=>3, "idUsiario" =>16938],
            ["nome" =>"Nadal", "idAreaTec"=>4, "idUsiario" =>19176],
            ["nome" =>"Almir", "idAreaTec"=>5, "idUsiario" =>33274],
            ["nome" =>"Marcio", "idAreaTec"=>4, "idUsiario" =>36515],
            ["nome" =>"Djokovic", "idAreaTec"=>3, "idUsiario" =>36802],
            ["nome" =>"Federer", "idAreaTec"=>7, "idUsiario" =>37532],
            ["nome" =>"Alcemar", "idAreaTec"=>6, "idUsiario" =>37577]
        ];  
        
        foreach($arrayTec as $tec){
            $tecnico = new Tecnico();
            $tecnico->setNome($tec["nome"]);
            $tecnico->setIdAreaTec($tec["idAreaTec"]);
            $tecnico->setIdUsuario($tec["idUsuario"]);
            
            $this->entityManager->persist($tecnico);
            $this->entityManager->flush();
        }
            
        return [
            "success" => true
        ];
        
    }

}
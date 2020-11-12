<?php
namespace App\Controller;

use Tecnico;

class TecnicoController {
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager();
    }

    private function getTodosTecnico() {
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

            if (empty($tecnicos)) {
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
        } catch (\Exception $exception) {
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }

    public function insertTecnico() {

        try {
            $arrayTec = [
                ["nome" => "Braian", "idAreaTec" => 3, "idUsuario" => 16938],
                ["nome" => "Nadal", "idAreaTec" => 4, "idUsuario" => 19176],
                ["nome" => "Almir", "idAreaTec" => 5, "idUsuario" => 33274],
                ["nome" => "Marcio", "idAreaTec" => 4, "idUsuario" => 36515],
                ["nome" => "Djokovic", "idAreaTec" => 3, "idUsuario" => 36802],
                ["nome" => "Federer", "idAreaTec" => 7, "idUsuario" => 37532],
                ["nome" => "Alcemar", "idAreaTec" => 6, "idUsuario" => 37577]
            ];

            foreach ($arrayTec as $tec) {
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

        } catch (\Exception $exception) {
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }

}
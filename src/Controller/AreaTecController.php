<?php

namespace Controller;
require_once "Entity/AreaTec.php";

use AreaTec;

class AreaTecController{
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager();
    }

    private function getTodosAreaTec() {
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

            if (empty($areaTecs)) {
                throw new \Exception("Nenhuma Área Técnica encontrada");
            }

            foreach ($areaTecs as $areaTec) {
                $results[] = [
                    'value' => $areaTec->getId(),
                    'text' => $areaTec->getNome()
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

    public function insertAreaTecnica() {
        try {
            $arrayAT = [
                "TI Geral",
                "TI Salux",
                "Manutenção Elétrica",
                "Manutenção Hospitalar",
                "Marcenaria"
            ];

            foreach ($arrayAT as $at) {
                $centroCusto = new AreaTec();
                $centroCusto->setNome($at);

                $this->entityManager->persist($centroCusto);
                $this->entityManager->flush();
            }

            return ["sucess" => true];

        } catch (\Exception $exception) {
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }


    }
}
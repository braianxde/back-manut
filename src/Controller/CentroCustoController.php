<?php
namespace App\Controller;

use CentroCusto;

class CentroCustoController {
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager();
    }

    private function getTodosCentroCusto() {
        $centroCustos = $this->entityManager->getRepository(CentroCusto::class)->findAll();

        if (empty($centroCustos)) {
            throw new \Exception("Nenhum Centro de Custo encontrado");
        }

        return $centroCustos;
    }

    public function getCentroCustos() {
        try {
            $centroCustos = $this->getTodosCentroCusto();
            $results = [];

            if (empty($centroCustos)) {
                throw new \Exception("Nenhum Centro de Custo encontrado");
            }

            foreach ($centroCustos as $centroCusto) {
                $results[] = [
                    'id' => $centroCusto->getId(),
                    'nome' => $centroCusto->getNome()
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

    public function insertCentroCusto() {
        try {
            $arraycc = [
                "Maternidade",
                "Enfermaria",
                "Radiologia",
                "Administração",
                "Centro Cirurgico",
                "Ambulatório",
                "Pronto Socorro"
            ];

            foreach ($arraycc as $cc) {
                $centroCusto = new CentroCusto();
                $centroCusto->setNome($cc);

                $this->entityManager->persist($centroCusto);
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
<?php
namespace App\Controller;

use App\Entity\Equipamento;

class EquipamentoController {
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager();
    }

    private function getTodosEquipamentos() {
        $equipamentos = $this->entityManager->getRepository(Equipamento::class)->findAll();

        if (empty($equipamentos)) {
            throw new \Exception("Nenhum equipamento encontrado");
        }
        return $equipamentos;
    }

    public function getEquipamentos() {
        try {
            $equipamentos = $this->getTodosEquipamentos();
            $results = [];

            if (empty($equipamentos)) {
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
        } catch (\Exception $exception) {
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }

    public function getEquipamentoById($id) {
        try {
            $equipamento = $this->entityManager->find('App\Entity\Equipamento', $id);

            if (empty($equipamento)) {
                throw new \Exception("Nenhum equipamento encontrado");
            }

            $result[] = [
                'id' => $equipamento->getId(),
                'nome' => $equipamento->getNome(),
                'descricao' => $equipamento->getDescricao()
            ];

            return [
                "success" => true,
                "data" => $result
            ];

        } catch (\Exception $exception) {
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }

    public function insertEquipamento() {
        try {
            $arrayEq = [
                [
                    "id" => 123456,
                    "nome" => "Computador Dell",
                    "descricao" => "Core2duo, 4Gb RAM, HD240Gb"
                ],
                [
                    "id" => 123789,
                    "nome" => "Maca",
                    "descricao" => "Metal cinza"
                ],
                [
                    "id" => 123258,
                    "nome" => "Cama Hospitalar",
                    "descricao" => "Metalclin, 2 manivelas, 1005"
                ],
                [
                    "id" => 124896,
                    "nome" => "Monitor de Sinais Vitais",
                    "descricao" => "Marca SMART CHECK"
                ],
                [
                    "id" => 124321,
                    "nome" => "Carrinho Hospitalar",
                    "descricao" => "Marca MAD.U com 3 gavetas"
                ],
                [
                    "id" => 123457,
                    "nome" => "Computador Dell",
                    "descricao" => "Core2duo, 4Gb RAM, HD240Gb"
                ],
                [
                    "id" => 123790,
                    "nome" => "Maca",
                    "descricao" => "Metal cinza"
                ],
                [
                    "id" => 123259,
                    "nome" => "Cama Hospitalar",
                    "descricao" => "Metalclin, 2 manivelas, 1005"
                ],
                [
                    "id" => 124897,
                    "nome" => "Monitor de Sinais Vitais",
                    "descricao" => "Marca SMART CHECK"
                ],
                [
                    "id" => 124322,
                    "nome" => "Carrinho Hospitalar",
                    "descricao" => "Marca MAD.U com 3 gavetas"
                ]
            ];

            foreach ($arrayEq as $eq) {
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

        } catch (\Exception $exception) {
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }
}
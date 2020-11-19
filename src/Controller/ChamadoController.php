<?php
namespace App\Controller;

use App\Entity\Chamado;

class ChamadoController {
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager();
    }

    private function getTodosChamados() {
        $chamados = $this->entityManager->getRepository(Chamado::class)->findAll();

        if (empty($chamados)) {
            throw new \Exception("Nenhum chamado encontrado");
        }
        return $chamados;
    }

    public function getChamados() {
        try {
            $chamados = $this->getTodosChamados();
            $results = [];

            if (empty($chamados)) {
                throw new \Exception("Nenhum chamado encontrado");
            }

            foreach ($chamados as $chamado) {
                $results[] = [
                    'id' => $chamado->getId(),
                    'assunto' => $chamado->getAssunto(),
                    'texto' => $chamado->getTexto(),
                    'dataAbertura' => $chamado->getDataAbertura(),
                    'dataFechamento' => $chamado->getDataFechamento(),
                    'status' => $chamado->getStatus(),
                    'idUsuario' => $chamado->getIdUsuario(),
                    'idTecnico' => $chamado->getIdTecnico(),
                    'idAreaTec' => $chamado->getIdAreaTec(),
                    'idEquipamento' => $chamado->getIdEquipamento()
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

    public function getChamadoById($id) {
        try {
            $chamado = $this->entityManager->find('App\Entity\Chamado', $id);

            if (empty($chamado)) {
                throw new \Exception("Nenhum chamado encontrado");
            }

            $result[] = [
                'id' => $chamado->getId(),
                'assunto' => $chamado->getAssunto(),
                'texto' => $chamado->getTexto(),
                'dataAbertura' => $chamado->getDataAbertura(),
                'dataFechamento' => $chamado->getDataFechamento(),
                'status' => $chamado->getStatus(),
                'idUsuario' => $chamado->getIdUsuario(),
                'idTecnico' => $chamado->getIdTecnico(),
                'idAreaTec' => $chamado->getIdAreaTec(),
                'idEquipamento' => $chamado->getIdEquipamento()
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

    public function inserirChamado($novoChamado) {

        try {
            $chamado = new Chamado();
            $chamado->setAssunto($novoChamado["assunto"]);
            $chamado->setTexto($novoChamado["texto"]);
            $chamado->setDataAbertura(date("Y-m-d H:i:s"));
            $chamado->setStatus(1);
            $chamado->setIdUsuario($novoChamado["idUsuario"]);
            $chamado->setIdTecnico($novoChamado["idTecnico"]);
            $chamado->setIdAreaTec($novoChamado["idAreaTec"]);
            $chamado->setIdEquipamento($novoChamado["idEquipamento"]);

            $this->entityManager->persist($chamado);
            $this->entityManager->flush();

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

    public function alterarChamado($id, $data) {
        try {
            $chamado = $this->entityManager->find('App\Entity\Chamado', $id);

            if (empty($chamado)) {
                throw new \Exception("Nenhum chamado encontrado");
            }

            if (!empty($data["status"])) {
                $chamado->setStatus($data["status"]);
                if ($data["status"] == 2) {
                    $chamado->setDataFechamento(date("Y-m-d H:i:s"));
                }
            }

            if (!empty($data["idTecnico"])) {
                $chamado->setIdTecnico($data["idTecnico"]);
            }

            if (!empty($data["idAreaTec"])) {
                $chamado->setIdAreaTec($data["idAreaTec"]);
            }

            if (!empty($data["idEquipamento"])) {
                $chamado->setIdEquipamento($data["idEquipamento"]);
            }

            $this->entityManager->persist($chamado);
            $this->entityManager->flush();

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

    public function getChamadoCompletoById($id) {
        try {
            $queryBuilder = $this->entityManager->createQueryBuilder();
            $queryBuilder
                ->select([
                    "cha.id",
                    "cha.status",
                    "cha.assunto",
                    "cha.texto",
                    "cha.dataAbertura",
                    "cha.idUsuario",
                    "cha.idEquipamento",
                    "equi.nome as nome_equipamento",
                    "equi.descricao as des_equipamento",
                    "usu.nome as solicitante",
                    "area.nome as areaTecnica",
                    "tecn.nome as tecnico",
                    "cec.nome as centro_custo"
                ])
                ->from("App\Entity\Chamado", "cha")
                ->leftJoin("App\Entity\Equipamento", "equi", 'WITH', "equi.id = cha.idEquipamento")
                ->leftJoin("App\Entity\Usuario", "usu", 'WITH', "usu.id = cha.idUsuario")
                ->leftJoin("App\Entity\CentroCusto", "cec", 'WITH', "cec.id = usu.idCentroCusto")
                ->leftJoin("App\Entity\AreaTec", "area", 'WITH', "area.id = cha.idAreaTec")
                ->leftJoin("App\Entity\Tecnico", "tecn", 'WITH', "tecn.id = cha.idTecnico")
                ->andWhere("cha.id = :id")
                ->setParameter("id", $id);

            $query = $queryBuilder->getQuery();
            $resultQuery = $query->getResult();

            if (empty($resultQuery)) {
                throw new \Exception("Nenhum chamado encontrado");
            }

            return [
                "success" => true,
                "data" => $resultQuery
            ];

        } catch (\Exception $exception) {
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }

    public function getChamadoCompletoByIdAreaTec($idAreaTec) {
        try {
            $queryBuilder = $this->entityManager->createQueryBuilder();
            $queryBuilder
                ->select([
                    "cha.id",
                    "cha.status",
                    "cha.assunto",
                    "cha.texto",
                    "cha.dataAbertura",
                    "cha.idUsuario",
                    "cha.idEquipamento",
                    "equi.nome as nome_equipamento",
                    "equi.descricao as des_equipamento",
                    "usu.nome as solicitante",
                    "area.nome as areaTecnica",
                    "tecn.nome as tecnico",
                    "cec.nome as centro_custo"
                ])
                ->from("App\Entity\Chamado", "cha")
                ->leftJoin("App\Entity\Equipamento", "equi", 'WITH', "equi.id = cha.idEquipamento")
                ->leftJoin("App\Entity\Usuario", "usu", 'WITH', "usu.id = cha.idUsuario")
                ->leftJoin("App\Entity\CentroCusto", "cec", 'WITH', "cec.id = usu.idCentroCusto")
                ->leftJoin("App\Entity\AreaTec", "area", 'WITH', "area.id = cha.idAreaTec")
                ->leftJoin("App\Entity\Tecnico", "tecn", 'WITH', "tecn.id = cha.idTecnico")
                ->andWhere("cha.idAreaTec = :idAreaTec")
                ->setParameter("idAreaTec", $idAreaTec);

            $query = $queryBuilder->getQuery();
            $resultQuery = $query->getResult();

            if (empty($resultQuery)) {
                throw new \Exception("Nenhum chamado encontrado");
            }

            return [
                "success" => true,
                "data" => $resultQuery
            ];

        } catch (\Exception $exception) {
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }
}
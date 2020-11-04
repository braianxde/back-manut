<?php

namespace Controller;
require_once "Entity/AreaTec.php";

use Chamado;


class ChamadoController {
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager(); 
    }

    private function getTodosChamados(){
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

            if (empty($chamados)){
                throw new \Exception("Nenhum chamado encontrado");
            }

            foreach ($chamados as $chamado) {
                $results[] = [
                    'id' => $chamado->getId(),
                    'assunto' => $chamado->getAssunto(),
                    'texto' => $chamado->getTexto(),
                    'dataAbertura' => $chamado->getDataAbertura(),
                    'dataFechamento' => $chamado->getDataFechamento(),
                    'status'=> $chamado->getStatus(),
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

        } catch (\Exception $exception){
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }

    public function getChamadoById($id) {
        try {
            $chamado = $this->entityManager->find('Chamado', $id);

            if (empty($chamado)) {
                throw new \Exception("Nenhum chamado encontrado");
            }

            $result[] = [
                'id' => $chamado->getId(),
                'assunto' => $chamado->getAssunto(),
                'texto' => $chamado->getTexto(),
                'dataAbertura' => $chamado->getDataAbertura(),
                'dataFechamento' => $chamado->getDataFechamento(),
                'status'=> $chamado->getStatus(),
                'idUsuario' => $chamado->getIdUsuario(),
                'idTecnico' => $chamado->getIdTecnico(),
                'idAreaTec' => $chamado->getIdAreaTec(),
                'idEquipamento' => $chamado->getIdEquipamento()                   
            ];

            return [
                "success" => true,
                "data" => $result
            ];

        } catch (\Exception $exception){
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

        } catch (\Exception $exception){
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }

    public function alterarChamado ($id, $data) {
        try {
            $chamado = $this->entityManager->find('Chamado', $id);

            if (empty($chamado)) {
                throw new \Exception("Nenhum chamado encontrado");
            }

            if (!empty($data["status"])) {
                $chamado->setStatus($data["status"]);
                if ($data["status"] == 2){
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
            
        } catch (\Exception $exception){
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }
}
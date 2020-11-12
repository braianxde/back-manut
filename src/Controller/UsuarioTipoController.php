<?php
namespace App\Controller;

use UsuarioTipo;

class UsuarioTipoController {
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager();
    }

    public function getTipos() {
        try {
            $tipos = $this->getTodosTipos();
            $results = [];

            foreach ($tipos as $tipo) {
                $results[] = [
                    'id' => $tipo->getId(),
                    'name' => $tipo->getDescricao()
                ];
            }

            return [
                "success" => true,
                "data" => $results
            ];

        } catch (\Exception $exception) {
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }

    private function getTodosTipos() {
        $usuarios = $this->entityManager->getRepository(UsuarioTipo::class)->findAll();

        return $usuarios;
    }

    public function insertUsuariosTiposTeste() {
        try {
            $arrayTipos = [
                ["id" => 1, "descricao" => "Administrador"],
                ["id" => 2, "descricao" => "Tecnico"],
                ["id" => 3, "descricao" => "Comun"],
            ];

            foreach ($arrayTipos as $tipo) {
                $usuarioTipo = new UsuarioTipo();
                $usuarioTipo->setId($tipo["id"]);
                $usuarioTipo->setDescricao($tipo["descricao"]);

                $this->entityManager->persist($usuarioTipo);
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
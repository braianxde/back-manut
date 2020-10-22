<?php

namespace Controller;
require_once "Entity/Usuario.php";

use Doctrine\ORM\EntityManagerInterface;
use Usuario;

class UsuarioController {
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function getUsuarios() {
        try {
            $usuarios = $this->entityManager->getRepository(Usuario::class)->findAll();
            $results = [];

            if (empty($usuarios)) {
                throw new \Exception("Nenhum usuario encontrado");
            }

            foreach ($usuarios as $usuario) {
                $results[] = [
                    'id' => $usuario->getId(),
                    'name' => $usuario->getNome(),
                    'email' => $usuario->getEmail(),
                    'tipo' => $usuario->getTipo(),
                    'idCentroCusto' => $usuario->getIdCentroCusto(),
                    'idAreaTec' => $usuario->getIdAreaTec()
                ];
            }

            return [
                "success" => true,
                "data" => $results
            ];

        } catch (\Exception $exception){
            return [
                "success" => false,
                "msg" => $exception->getMessage()
            ];
        }
    }

    public function insertUsuario($novoUsuario) {
        try {
            $usuario = new Usuario();
            $usuario->setNome($novoUsuario["nome"]);
            $usuario->setEmail($novoUsuario["email"]);
            $usuario->setIdAreaTec($novoUsuario["idAreaTec"]);
            $usuario->setIdCentroCusto($novoUsuario["idCentroCusto"]);
            $usuario->setSenha($novoUsuario["senha"]);
            $usuario->setTipo($novoUsuario["tipo"]);
            $usuario->setToken($novoUsuario["token"]);

            $this->entityManager->persist($usuario);
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

    public function getUsuarioById($id) {
        try {
            $usuario = $this->entityManager->find('Usuario', $id);

            if (empty($usuario)) {
                throw new \Exception("Nenhum usuario encontrado");
            }

            $result[] = [
                'id' => $usuario->getId(),
                'name' => $usuario->getNome(),
                'email' => $usuario->getEmail(),
                'tipo' => $usuario->getTipo(),
                'idCentroCusto' => $usuario->getIdCentroCusto(),
                'idAreaTec' => $usuario->getIdAreaTec()
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
}
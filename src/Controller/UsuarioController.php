<?php

namespace Controller;
require_once "Entity/Usuario.php";
require_once "Common/Common.php";

use Usuario;

class UsuarioController {
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager();
    }

    public function getUsuarios() {
        try {
            $usuarios = $this->getTodosUsuarios();
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

    private function getTodosUsuarios(){
        $usuarios = $this->entityManager->getRepository(Usuario::class)->findAll();

        if (empty($usuarios)) {
            throw new \Exception("Nenhum usuario encontrado");
        }

        return $usuarios;
    }

    public function insertUsuario($novoUsuario) {
        try {
            $usuario = new Usuario();
            $usuario->setId($novoUsuario["id"]);
            $usuario->setNome($novoUsuario["nome"]);
            $usuario->setEmail($novoUsuario["email"]);
            $usuario->setIdAreaTec($novoUsuario["idAreaTec"]);
            $usuario->setIdCentroCusto($novoUsuario["idCentroCusto"]);
            $usuario->setSenha(md5($novoUsuario["senha"]));
            $usuario->setTipo($novoUsuario["tipo"]);
            $usuario->setToken(uid());

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

    public function getTokensUsuarios(){
        $usuarios = $this->getTodosUsuarios();
        $tokens = [];

        foreach ($usuarios as $usuario) {
            $tokens[] = $usuario->getToken();
        }

        return $tokens;
    }
}
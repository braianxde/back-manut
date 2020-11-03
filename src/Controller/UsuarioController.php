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

    public function insertUsuarioTeste() {
        try {
            $arrayUS = [
                ["id"=>36802, "nome"=>"Novak Djokovic", "email"=>"djoko@manut.com", "idAreaTec"=>3, "idCentroCusto"=>19, "senha"=>"djoko", "tipo"=>2],
                ["id"=>19176, "nome"=>"Rafael Nadal", "email"=>"nadal@manut.com", "idAreaTec"=>4, "idCentroCusto"=>16, "senha"=>"nadal", "tipo"=>2],
                ["id"=>33274, "nome"=>"Almir Silva", "email"=>"almir@manut.com", "idAreaTec"=>5, "idCentroCusto"=>21, "senha"=>"almir", "tipo"=>2],
                ["id"=>37577, "nome"=>"Alcemar Ferreira", "email"=>"alcemar@manut.com", "idAreaTec"=>6, "idCentroCusto"=>16, "senha"=>"alcemar", "tipo"=>2],
                ["id"=>37532, "nome"=>"Roger Federer", "email"=>"federer@manut.com", "idAreaTec"=>7, "idCentroCusto"=>20, "senha"=>"federer", "tipo"=>2],
                ["id"=>36515, "nome"=>"Marcio Becker", "email"=>"becker@manut.com", "idAreaTec"=>4, "idCentroCusto"=>17, "senha"=>"becker", "tipo"=>2],
                ["id"=>16938, "nome"=>"Braian Schuster", "email"=>"braian@manut.com", "idAreaTec"=>3, "idCentroCusto"=>22, "senha"=>"braian", "tipo"=>2],
                ["id"=>34441, "nome"=>"Valdir Silva", "email"=>"valdir@manut.com", "idAreaTec"=>null, "idCentroCusto"=>18, "senha"=>"valdir", "tipo"=>3],
                ["id"=>33666, "nome"=>"Evandro Carvalho", "email"=>"evandro@manut.com", "idAreaTec"=>null, "idCentroCusto"=>17, "senha"=>"evandro", "tipo"=>3],
                ["id"=>99999, "nome"=>"Pontelho Pinto Papael", "email"=>"papael@manut.com", "idAreaTec"=>null, "idCentroCusto"=>16, "senha"=>"papael", "tipo"=>3]
            ];
            
            foreach($arrayUS as $us){
                $usuario = new Usuario();
                $usuario->setId($us["id"]);
                $usuario->setNome($us["nome"]);
                $usuario->setEmail($us["email"]);
                $usuario->setIdAreaTec($us["idAreaTec"]);
                $usuario->setIdCentroCusto($us["idCentroCusto"]);
                $usuario->setSenha(md5($us["senha"]));
                $usuario->setTipo($us["tipo"]);
                $usuario->setToken(uid());
    
                
                $this->entityManager->persist($usuario);
                $this->entityManager->flush();
            }
                
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
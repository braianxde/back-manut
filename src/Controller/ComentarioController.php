<?php
namespace App\Controller;

use App\Entity\Comentario;

class ComentarioController {
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager();
    }

    private function getTodosComentarios() {
        $comentarios = $this->entityManager->getRepository(Comentario::class)->findAll();

        if (empty($comentarios)) {
            throw new \Exception("Nenhum comentário encontrado");
        }
        return $comentarios;
    }

    public function getComentarios() {
        try {
            $comentarios = $this->getTodosComentarios();
            $results = [];

            if (empty($comentarios)) {
                throw new \Exception("Nenhum comentário encontrado");
            }

            foreach ($comentarios as $comentario) {
                $results[] = [
                    'id' => $comentario->getId(),
                    'texto' => $comentario->getTexto(),
                    'dataComentario' => $comentario->getDataComentario(),
                    'idChamado' => $comentario->getIdChamado()
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

    public function getComentarioById($id) {
        try {
            $comentario = $this->entityManager->find('Comentario', $id);

            if (empty($comentario)) {
                throw new \Exception("Nenhum comentário encontrado");
            }

            $result[] = [
                'id' => $comentario->getId(),
                'texto' => $comentario->getTexto(),
                'dataComentario' => $comentario->getDataComentario(),
                'idChamado' => $comentario->getIdChamado()
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

    public function inseriComentario($novoComentario) {

        try {
            $comentario = new Comentario();
            $comentario->setTexto($novoComentario["texto"]);
            $comentario->setDataComentario(date("Y-m-d H:i:s"));
            $comentario->setIdChamado($novoComentario["idChamado"]);

            $this->entityManager->persist($comentario);
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

    public function getComentarioByIdChamado($idChamado) {
        try {
            $comentario = $this->entityManager->find('Comentario', $idChamado);

            if (empty($comentario)) {
                throw new \Exception("Nenhum comentário encontrado");
            }

            $result[] = [
                'id' => $comentario->getId(),
                'texto' => $comentario->getTexto(),
                'dataComentario' => $comentario->getDataComentario(),
                'idChamado' => $comentario->getIdChamado()
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
}
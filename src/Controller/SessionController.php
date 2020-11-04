<?php

namespace Controller;

use Constants\Constants;

class SessionController implements Constants {
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager();
    }

    public function verificaLogado($token){
        return in_array($token, (new UsuarioController())->getTokensUsuarios());
    }

    public function login($dataLogin){
        $senhaMD5 = md5($dataLogin["senha"]);

        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder
            ->select("usu.token")
                ->from("usuario", "usu")
                ->andWhere("usu.senha = :senha")
                ->setParameter("senha", $senhaMD5)
                ->andWhere("usu.email = :email")
                ->setParameter("email", $dataLogin["email"]);

        $query = $queryBuilder->getQuery();
        $result = $query->getOneOrNullResult();

        if(!empty($result["token"])){
            return [
                "success" => true,
                "data" => $result["token"]
            ];
        }

        return [
            "success" => false,
            "msg" => "Email ou Senha Invalidos"
        ];
    }
}
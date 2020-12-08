<?php
namespace App\Controller;

class SessionController{
    private $entityManager;

    public function __construct() {
        $this->entityManager = getEntityManager();
    }

    public function verificaLogado($token) {
        return in_array($token, (new UsuarioController())->getTokensUsuarios());
    }

    public function login($dataLogin) {
        $senhaMD5 = md5($dataLogin["senha"]);

        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder
            ->select([
                "usu.token",
                "usu.id",
                "usu.nome",
                "usu.idAreaTec",
                "tec.id as idTecnico",
                "area.nome as areaTecnica",
                "usu.tipo"
            ])
            ->from("App\Entity\Usuario", "usu")
            ->leftJoin("App\Entity\AreaTec", "area", 'WITH', "area.id = usu.idAreaTec")
            ->leftJoin("App\Entity\Tecnico", "tec", 'WITH', "tec.idUsuario = usu.id")
            ->andWhere("usu.senha = :senha")
            ->setParameter("senha", $senhaMD5)
            ->andWhere("usu.email = :email")
            ->setParameter("email", $dataLogin["email"]);

        $query = $queryBuilder->getQuery();
        $result = $query->getOneOrNullResult();

        if (!empty($result["token"])) {
            return [
                "success" => true,
                "data" => [
                    "token" => $result["token"],
                    "id" => $result["id"],
                    "nome" => $result["nome"],
                    "idAreaTec" => $result["idAreaTec"],
                    "idTecnico" => $result["idTecnico"],
                    "areaTecnica" => $result["areaTecnica"],
                    "idce" => $result["nome"],
                    "descrica" => $result["nome"],
                    "tipo" => $result["tipo"],
                ]
            ];
        }

        return [
            "success" => false,
            "msg" => "Email ou Senha Invalidos"
        ];
    }
}
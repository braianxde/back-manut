<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class Usuario {
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", unique=true)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $id;
    /**
     * @ORM\Column(name="nome", type="string")
     */
    protected $nome;
    /**
     * @ORM\Column(name="email", type="string")
     */
    protected $email;
    /**
     * @ORM\Column(name="senha", type="string")
     */
    protected $senha;
    /**
     * @ORM\Column(name="tipo", type="integer")
     */
    protected $tipo;
    /**
     * @ORM\Column(name="id_ccusto", type="integer")
     */
    protected $idCentroCusto;
    /**
     * @ORM\Column(name="id_areatec", type="integer", nullable=true)
     */
    protected $idAreaTec;
    /**
     * @ORM\Column(name="token", type="string")
     */
    protected $token;

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome) {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getIdCentroCusto() {
        return $this->idCentroCusto;
    }

    /**
     * @param mixed $idCentroCusto
     */
    public function setIdCentroCusto($idCentroCusto) {
        $this->idCentroCusto = $idCentroCusto;
    }

    /**
     * @return mixed
     */
    public function getIdAreaTec() {
        return $this->idAreaTec;
    }

    /**
     * @param mixed $idAreaTec
     */
    public function setIdAreaTec($idAreaTec) {
        $this->idAreaTec = $idAreaTec;
    }

    /**
     * @return mixed
     */
    public function getSenha() {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getToken() {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token) {
        $this->token = $token;
    }
}
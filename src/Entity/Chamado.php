<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="chamado")
 */
class Chamado {
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(name="assunto", type="string")
     */
    protected $assunto;
    /**
     * @ORM\Column(name="texto", type="string")
     */
    protected $texto;
    /**
     * @ORM\Column(name="data_abertura", type="string")
     */
    protected $dataAbertura;
    /**
     * @ORM\Column(name="data_fechamento", type="string", nullable=true)
     */
    protected $dataFechamento;
    /**
     * @ORM\Column(name="status", type="integer")
     */
    protected $status;
    /**
     * @ORM\Column(name="id_usuario", type="integer")
     */
    protected $idUsuario;
    /**
     * @ORM\Column(name="id_tecnico", type="integer")
     */
    protected $idTecnico;
    /**
     * @ORM\Column(name="id_areatec", type="integer")
     */
    protected $idAreaTec;
    /**
     * @ORM\Column(name="id_equipamento", type="integer", nullable=true)
     */
    protected $idEquipamento;


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
     * Get the value of assunto
     */
    public function getAssunto() {
        return $this->assunto;
    }

    /**
     * Set the value of assunto
     *
     * @return  self
     */
    public function setAssunto($assunto) {
        $this->assunto = $assunto;

        return $this;
    }

    /**
     * Get the value of texto
     */
    public function getTexto() {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */
    public function setTexto($texto) {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get the value of dataAbertura
     */
    public function getDataAbertura() {
        return $this->dataAbertura;
    }

    /**
     * Set the value of dataAbertura
     *
     * @return  self
     */
    public function setDataAbertura($dataAbertura) {
        $this->dataAbertura = $dataAbertura;

        return $this;
    }

    /**
     * Get the value of dataFechamento
     */
    public function getDataFechamento() {
        return $this->dataFechamento;
    }

    /**
     * Set the value of dataFechamento
     *
     * @return  self
     */
    public function setDataFechamento($dataFechamento) {
        $this->dataFechamento = $dataFechamento;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of idUsuario
     */
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of idTecnico
     */
    public function getIdTecnico() {
        return $this->idTecnico;
    }

    /**
     * Set the value of idTecnico
     *
     * @return  self
     */
    public function setIdTecnico($idTecnico) {
        $this->idTecnico = $idTecnico;

        return $this;
    }

    /**
     * Get the value of idAreaTec
     */
    public function getIdAreaTec() {
        return $this->idAreaTec;
    }

    /**
     * Set the value of idAreaTec
     *
     * @return  self
     */
    public function setIdAreaTec($idAreaTec) {
        $this->idAreaTec = $idAreaTec;

        return $this;
    }

    /**
     * Get the value of idEquipamento
     */
    public function getIdEquipamento() {
        return $this->idEquipamento;
    }

    /**
     * Set the value of idEquipamento
     *
     * @return  self
     */
    public function setIdEquipamento($idEquipamento) {
        $this->idEquipamento = $idEquipamento;

        return $this;
    }
}
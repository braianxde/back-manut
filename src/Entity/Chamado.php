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
     * @ORM\Column(name="data_abertura", type="date")
     */
    protected $dataAbertura;
    /**
     * @ORM\Column(name="data_fechamento", type="date")
     */
    protected $dataFechamento;
    /**
     * @ORM\Column(name="status", type="integer")
     */
    protected $Status;
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
     * @ORM\Column(name="id_equipamento", type="integer")
     */
    protected $idEquipamento;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAssunto() {
        return $this->assunto; 
    }
    /**
     * @param mixed $assunto
     */
    public function setAssunto($assunto) {
        $this->assunto = $assunto;
    }

   /**
     * @return mixed
     */
    public function getTexto() {
        return $this->texto; 
    }
    /**
     * @param mixed $texto
     */
    public function setTexto($texto) {
        $this->texto = $texto;
    }

    /**
     * @return mixed
     */
    public function getDataAbertura() {
        return $this->data_abertura; 
    }
    /**
     * @param mixed $data_abertura
     */
    public function setDataAbertura($data_abertura) {
        $this->data_abertura = $data_abertura;
    }

    /**
     * @return mixed
     */
    public function getDataFechamento() {
        return $this->data_fechamento; 
    }
    /**
     * @param mixed $data_fechamento
     */
    public function setDataFechamento($data_fechamento) {
        $this->data_fechamento = $data_fechamento;
    }

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status; 
    }
    /**
     * @param mixed $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario() {
        return $this->idUsuario;
    }
    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getIdTecnico() {
        return $this->idTecnico;
    }
    /**
     * @param mixed $idTecnico
     */
    public function setIdTecnico($idTecnico) {
        $this->idTecnico = $idTecnico;
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
    public function getIdEquipamento() {
        return $this->idEquipamento;
    }
    /**
     * @param mixed $idEquipamento
     */
    public function setIdEquipamento($idEquipamento) {
        $this->idEquipamento = $idEquipamento;
    }
}
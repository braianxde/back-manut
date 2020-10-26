<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tecnico")
 */
class Tecnico
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(name="nome", type="string")
     */
    protected $nome;
    /**
     * @ORM\Column(name="id_areatec", type="integer")
     */
    protected $idAreaTec;
    /**
     * @ORM\Column(name="id_usuario", type="integer")
     */
    protected $idUsuario;

    public function getId()
    {
        return $this->id;
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
    public function getIdUsuario() {
        return $this->idUsuario;
    }
    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    
}
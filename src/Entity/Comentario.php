<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="comentario")
 */
class Comentario 
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(name="texto", type="string")
     */
    protected $texto;
    /**
     * @ORM\Column(name="id_tecnico", type="integer")
     */
    protected $idTecnico;
    /**
     * @ORM\Column(name="data_comentario", type="date")
     */
    protected $dataComentario;
    /**
     * @ORM\Column(name="id_chamado", type="integer")
     */
    protected $idChamado;


    public function getId()
    {
        return $this->id;
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
    public function getDataComentario() {
        return $this->data_comentario; 
    }
    /**
     * @param mixed $data_comentario
     */
    public function setDataComentario($data_comentario) {
        $this->data_comentario = $data_comentario;
    }

    /**
     * @return mixed
     */
    public function getIdChamado() {
        return $this->idChamado;
    }
    /**
     * @param mixed $idChamado
     */
    public function setIdChamado($idChamado) {
        $this->idChamado = $idChamado;
    }
}
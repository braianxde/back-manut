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
     * @ORM\Column(name="data_comentario", type="datetime")
     */
    protected $dataComentario;
    /**
     * @ORM\Column(name="id_chamado", type="integer")
     */
    protected $idChamado;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of texto
     */ 
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */ 
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get the value of dataComentario
     */ 
    public function getDataComentario()
    {
        return $this->dataComentario;
    }

    /**
     * Set the value of dataComentario
     *
     * @return  self
     */ 
    public function setDataComentario($dataComentario)
    {
        $this->dataComentario = $dataComentario;

        return $this;
    }

    /**
     * Get the value of idChamado
     */ 
    public function getIdChamado()
    {
        return $this->idChamado;
    }

    /**
     * Set the value of idChamado
     *
     * @return  self
     */ 
    public function setIdChamado($idChamado)
    {
        $this->idChamado = $idChamado;

        return $this;
    }
}
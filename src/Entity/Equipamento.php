<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORm\Entity
 * @ORM\Table(name="equipamento")
 */
class Equipamento {
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
     * @ORM\Column(name="descricao", type="string")
     */
    protected $descricao;


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
     * Get the value of nome
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome) {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;

        return $this;
    }
}
<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORm\Entity
 * @ORM|Table(name="equipamento")
 */
class Equipamento
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
     * @ORM\Column(name="descricao", type="string")
     */
    protected $descricao;

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
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}
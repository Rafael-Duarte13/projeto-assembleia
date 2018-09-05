<?php
require_once(__DIR__ . "/Assembleia.class.php");

class getPauta {
    private $id;
    private $nome;
    private $descricao;
    private $idAssembleia;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getIdAssembleia() {
        return $this->idAssembleia;
    }
    public function setIdAssembleia(Assembleia $idAssembleia) {
        $this->idAssembleia = $idAssembleia;
    }
}
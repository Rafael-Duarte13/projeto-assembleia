<?php
class FoneDependente {
    private $dependente;
    private $fone;

    public function getId() {
        return $this->dependente;
    }
    public function setId(Dependente $dependente) {
        $this->dependente = $dependente;
    }

    public function getFone() {
        return $this->fone;
    }
    public function setFone($fone) {
        $this->fone = $fone;
    }
}
<?php
class FoneMorador {
    private $morador;
    private $fone;

    public function getId() {
        return $this->morador;
    }
    public function setId(Morador $morador) {
        $this->morador = $morador;
    }

    public function getFone() {
        return $this->fone;
    }
    public function setFone($fone) {
        $this->fone = $fone;
    }
}
<?php
class EmailMorador {
    private $morador;
    private $email;

    public function getId() {
        return $this->morador;
    }
    public function setId(Morador $morador) {
        $this->morador = $morador;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
}
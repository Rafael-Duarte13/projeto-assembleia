<?php
class EmailDependente {
    private $dependente;
    private $email;

    public function getId() {
        return $this->dependente;
    }
    public function setId(Dependente $dependente) {
        $this->dependente = $dependente;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
}
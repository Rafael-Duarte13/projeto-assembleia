<?php

class Sindico {

    private $id;
    private $nome;
    private $login;
    private $senha;
    private $ultimoAcesso;
    private $foto;
   
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
        $this->nome = strtoupper($nome);
    }

    public function getLogin() {
        return $this->login;
    }
    
    public function setLogin($login) {
        $this->login = $login;
    }

    public function getSenha() {
        return $this->senha;
    }
    
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getUltimoAcesso() {
        return $this->ultimoAcesso;
    }
    
    public function setUltimoAcesso($ultimoAcesso) {
        $this->ultimoAcesso = $ultimoAcesso;
    }

    public function getFoto() {
        return $this->foto;
    }
    
    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getFkMorSin() {
        return $this->fkMorSin;
    }
    
    public function setFkMorSin($fkMorSin) {
        $this->fkMorSin = $fkMorSin;
    }
}
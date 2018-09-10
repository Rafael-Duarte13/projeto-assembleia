<?php
require_once(__DIR__ . "/./Conexao.class.php");
require_once(__DIR__ . "/../modelo/Morador.class.php");
require_once(__DIR__ . "/../modelo/FoneMorador.class.php");

class FoneMoradorDAO {
    public function findAll() {
        $sql = "SELECT * FROM tb_fone_moradores LEFT JOIN tb_moradores ON PK_MOR = FK_FDM_MOR";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $fones = array();
        foreach($result as $row) {
            $morador = new Morador();
            $morador->getId();
            $fone = new FoneMorador();
            $fone->setMorador($morador);
            $fone->setFone($row['FDM_FONE']);
            array_push($fones, $fone);
        }
        return $fones;
    }

    public function findById($id) {}
    
    public function findByMorador(Morador $id) {
        $sql = "SELECT * FROM tb_fone_moradores LEFT JOIN tb_moradores ON PK_MOR = FK_FDM_MOR WHERE PK_MOR = :mor_id";
        $statement = Conexao::get()->prepare($sql);
        $mor_id = $id->getId();
        $statement->bindParam(":mor_id", $mor_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $fones = array();
        foreach($result as $row) {
            $morador = new Morador();
            $morador->setId($row['PK_MOR']);
            $morador->setNome($row['MOR_NOME']);
            $morador->setLogin($row['MOR_LOGIN']);
            $morador->setSenha($row['MOR_SENHA']);
            $fone = new FoneMorador();
            $fone->setMorador($morador);
            $fone->setFone($row['FDM_FONE']);
            array_push($fones, $fone);
        }
        return $fones;
    }
}
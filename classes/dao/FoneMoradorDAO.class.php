<?php
require_once(__DIR__ . "Caminho do arquivo: Conexao.class.php");
require_once(__DIR__ . "Caminho do arquivo: FoneMorador.class.php");
require_once(__DIR__ . "Caminho do arquivo: Morador.class.php");

class FoneMoradorDAO {
    public function findAll() {
        $sql = "SELECT PK_MOR, FDM_FONE FROM tb_fone_moradores 
            JOIN tb_moradores ON PK_MOR = FK_FDM_MOR";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $rows = $statement->fetchAll();
        $fones = array();
        foreach ($rows as $row) {
            $morador = new Morador();
            $morador->setId($row['PK_MOR']);

            $fone = new FoneMorador();
            $fone->setId($morador);
            $fone->setFone($row['FDM_FONE']);
            array_push($fones, $fone);
        }
        return $fones;
    }

    public function findById($id) {
        $sql = "SELECT PK_MOR, FDM_FONE FROM tb_fone_moradores 
            JOIN tb_moradores ON PK_MOR = FK_FDM_MOR
            WHERE PK_MOR = :id";
        $statement = Conexao::get()->prepare($sql);
        $id = $foneMorador->getId();
        $statement->bindParam(":id", $id);
        $statement->execute();

        $row = $statement->fetch();

        $morador = new Morador();
        $morador->setId($row['PK_MOR']);

        $fone = new FoneMorador();
        $fone->setId($morador);
        $fone->setFone($row['FDM_FONE']);

        return $fone;
    }

    public function save(FoneMorador $foneMorador) {
        if ($foneMorador->getId() == null) {
            $this->insert($foneMorador);
        } else {
            $this->update($foneMorador);
        }
    }

    private function insert(FoneMorador $foneMorador) {
        $sql = "INSERT INTO tb_fone_moradores (FK_FDM_MOR, FDM_FONE) 
            VALUES (:id, :fone)";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $foneMorador->getId();
            $fone = $foneMorador->getFone();
            $statement->bindParam(":id", $id);
            $statement->bindParam(":fone", $fone);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    private function update(FoneMorador $foneMorador) {
        $sql = "UPDATE tb_fone_moradores 
            SET FK_FDM_MOR = :id, 
                FDM_FONE = :fone 
            WHERE FK_FDM_MOR = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $foneMorador->getId();
            $fone = $foneMorador->getFone();
            $statement->bindParam(":id", $id);
            $statement->bindParam(":fone", $fone);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM tb_fone_moradores WHERE FK_FDM_MOR = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $foneMorador->getId();
            $statement->bindParam(":id", $id);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
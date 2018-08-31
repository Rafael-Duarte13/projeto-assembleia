<?php
require_once(__DIR__ . "/Conexao.class.php");
require_once(__DIR__ . "/../modelo/FoneDependente.class.php");
require_once(__DIR__ . "/../modelo/Dependente.class.php");

class FoneDependenteDAO {
    public function findAll() {
        $sql = "SELECT PK_DEP, FDD_FONE FROM tb_fones_dependentes 
            JOIN tb_dependentes ON PK_DEP = FK_FDD_DEP";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $rows = $statement->fetchAll();
        $fones = array();
        foreach ($rows as $row) {
            $dependente = new Dependente();
            $dependente->setId($row['PK_DEP']);

            $fone = new FoneDependente();
            $fone->setId($dependente);
            $fone->setFone($row['FDD_FONE']);
            array_push($fones, $fone);
        }
        return $fones;
    }

    public function findById($id) {
        $sql = "SELECT PK_DEP, FDD_FONE FROM tb_fones_dependentes 
            JOIN tb_dependentes ON PK_DEP = FK_FDD_DEP
            WHERE PK_DEP = :id";
        $statement = Conexao::get()->prepare($sql);
        $id = $foneDependente->getId();
        $statement->bindParam(":id", $id);
        $statement->execute();

        $row = $statement->fetch();

        $dependente = new Dependente();
        $dependente->setId($row['PK_DEP']);

        $fone = new FoneDependente();
        $fone->setId($dependente);
        $fone->setFone($row['FDD_FONE']);

        return $fone;
    }

    public function save(FoneDependente $foneDependente) {
        if ($foneDependente->getId() == null) {
            $this->insert($foneDependente);
        } else {
            $this->update($foneDependente);
        }
    }
    
    private function insert(FoneDependente $foneDependente) {
        $sql = "INSERT INTO tb_fones_dependentes (FK_FDD_DEP, FDD_FONE) 
            VALUES (:id, :fone)";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $foneDependente->getId();
            $fone = $foneDependente->getFone();
            $statement->bindParam(":id", $id);
            $statement->bindParam(":fone", $fone);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    private function update(FoneDependente $foneDependente) {
        $sql = "UPDATE tb_fones_dependentes 
            SET FK_FDD_DEP = :id, 
                FDD_FONE = :fone 
            WHERE FK_FDD_DEP = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $foneDependente->getId();
            $fone = $foneDependente->getFone();
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
        $sql = "DELETE FROM tb_fones_dependentes WHERE FK_FDD_DEP = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $foneDependente->getId();
            $statement->bindParam(":id", $id);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
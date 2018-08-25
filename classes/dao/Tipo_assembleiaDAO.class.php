<?php
require_once(__DIR__ . "/Conexao.class.php");

class Tipo_assembleiaDAO {

    public function findAll() {
        $sql = "SELECT * FROM tb_tipos_assembleias";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();
        $tipos_assembleias = array();
        foreach ($result as $row) {
            $tipo_assembleia = new Tipo_assembleia();
            $tipo_assembleia->setId($row['PK_TDA']);
            $tipo_assembleia->setNome($row['TDA_NOME']);
            array_push($tipos_assembleias, $tipo_assembleia);
        }
        return $tipos_assembleias;
    }

    public function findById($id) {
        $sql = "SELECT * FROM tb_tipos_assembleias WHERE PK_TDA = $id";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $row = $statement->fetch();
        $tipo_assembleia = new Tipo_assembleia();

        $tipo_assembleia->setId($row['PK_TDA']);
        $tipo_assembleia->setNome($row['TDA_NOME']);

        return $tipo_assembleia;
    }

    public function save(Tipo_assembleia $tipo_assembleia) {
        if ($tipo_assembleia->getId() == NULL) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    private function insert(Tipo_assembleia $tipo_assembleia) {
        $sql = "INSERT INTO tb_tipos_assembleias (TDA_NOME)
            VALUES ('{$tipo_assembleia->getNome()}')";
        
        try {
            Conexao::get()->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    private function update(Tipo_assembleia $tipo_assembleia) {
        $sql = "UPDATE tb_tipos_assembleias SET TDA_NOME = '{$tipo_assembleia->getNome()}'
            WHERE PK_TDA = {$tipo_assembleia->getId()}";
        
        try {
            Conexao::get()->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM tb_tipos_assembleias WHERE PK_TDA = $id";
        try {
            $this->getConexao()->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
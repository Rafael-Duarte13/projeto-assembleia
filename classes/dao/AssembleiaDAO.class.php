<?php
require_once __DIR__ . "/Conexao.class.php";

class AssembleiaDAO {

    public function findAll() {
        $sql = "SELECT * FROM tb_assembleias";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();
        $assembleias = array();
        foreach ($result as $row) {
            $assembleia = new Assembleia();
            $assembleia->setId($row['PK_ASS']);
            $assembleia->setNome($row['ASS_NOME']);
            $assembleia->setData($row['ASS_DATA']);
            array_push($assembleias, $assembleia);
        }
        return $assembleias;
    }

    public function findById($id) {
        $sql = "SELECT * FROM tb_assembleias WHERE PK_ASS = $id";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $row = $statement->fetch();
        $assembleia = new Assembleia();

        $assembleia->setId($row['PK_ASS']);
        $assembleia->setNome($row['ASS_NOME']);
        $assembleia->setData($row['ASS_DATA']);

        return $assembleia;
    }

    public function save(Assembleia $assembleia) {
        if ($assembleia->getId() == NULL) {
            $this->insert($assembleia);
        } else {
            $this->update($assembleia);
        }
    }

    private function insert(Assembleia $assembleia) {
        $sql = "INSERT INTO tb_assembleias (ASS_NOME, ASS_DATA)
            VALUES ('{$assembleia->getNome}', '{$assembleia->getData}')";
        
        try {
            Conexao::get()->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    private function update(Assembleia $assembleia) {
        $sql = "UPDATE tb_assembleias SET ASS_NOME = '{$assembleia->getNome()}', ASS_DATA = '{$assembleia->getData()}'
            WHERE PK_ASS = {$assembleia->getId()}";
        
        try {
            Conexao::get()->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM tb_assembleias WHERE PK_ASS = $id";
        try {
            Conexao::get()->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
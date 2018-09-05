<?php
require_once(__DIR__ . "/Conexao.class.php");
require_once(__DIR__ . "/../modelo/getPauta.class.php");
require_once(__DIR__ . "/../modelo/Assembleia.class.php");

class getPautaDAO {
    public function findAll() {
        $sql = "SELECT * FROM tb_pautas JOIN tb_assembleias ON PK_ASS = FK_PAU_ASS";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll();
        $pautas = array();
        foreach ($rows as $row) {
            $assembleia = new Assembleia();
            $assembleia->setId($row['PK_ASS']);
            $pauta = new getPauta();
            $pauta->setId($row['PK_PAU']);
            $pauta->setNome($row['PAU_NOME']);
            $pauta->setDescricao($row['PAU_DESCRICAO']);
            $pauta->setIdAssembleia($assembleia);
            array_push($pautas, $pauta);
        }
        return $pautas;
    }

    public function findById($id) {
        $sql = "SELECT * FROM tb_pautas JOIN tb_assembleias ON PK_ASS = FK_PAU_ASS WHERE PK_PAU = :id";
        $statement = Conexao::get()->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $row = $statement->fetch();
        $assembleia = new Assembleia();
        $assembleia->setId($row['PK_ASS']);
        $pauta = new getPauta();
        $pauta->setId($row['PK_PAU']);
        $pauta->setNome($row['PAU_NOME']);
        $pauta->setDescricao($row['PAU_DESCRICAO']);
        $pauta->setIdAssembleia($assembleia);
        return $pauta;
    }

    public function findByIdAssembleia(Assembleia $idAssembleia) {
        $sql = "SELECT * FROM tb_pautas JOIN tb_assembleias ON PK_ASS = FK_PAU_ASS WHERE FK_PAU_ASS = :ass_id";
        $statement = Conexao::get()->prepare($sql);
        $ass_id = $idAssembleia->getId();
        $statement->bindParam(":ass_id", $ass_id);
        $statement->execute();
        $rows = $statement->fetchAll();
        $pautas = array();
        foreach ($rows as $row) {
            $assembleia = new Assembleia();
            $assembleia->setId($row['PK_ASS']);
            $pauta = new getPauta();
            $pauta->setId($row['PK_PAU']);
            $pauta->setNome($row['PAU_NOME']);
            $pauta->setDescricao($row['PAU_DESCRICAO']);
            $pauta->setIdAssembleia($assembleia);
            array_push($pautas, $pauta);
        }
        return $pautas;
    }
}
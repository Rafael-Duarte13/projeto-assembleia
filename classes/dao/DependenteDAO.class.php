<?php
require_once(__DIR__ . "Caminho do arquivo: Conexao.class.php");
require_once(__DIR__ . "Caminho do arquivo: Dependente.class.php");

class DependenteDAO {
    public function findAll() {
        $sql = "SELECT * FROM tb_dependentes;";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();
        $dependentes = array();
        foreach ($result as $row) {
            $dependente = new Dependente();
            $dependente->setId($row['PK_DEP']);
            $dependente->setNome($row['DEP_NOME']);
            $dependente->setCpf($row['DEP_CPF']);
            array_push($dependentes, $dependente);
        }
        return $dependentes;
    }

    public function findById($id) {
        $sql = "SELECT * FROM tb_dependentes WHERE PK_DEP = :id";
        $statement = Conexao::get()->prepare($sql);
        $id = $dependente->getId();
        $statement->bindParam(":id", $id);
        $statement->execute();

        $row = $statement->fetch();

        $dependente = new Dependente();
        $dependente->setId($row['PK_DEP']);
        $dependente->setNome($row['DEP_NOME']);
        $dependente->setCpf($row['DEP_CPF']);

        return $dependente;
    }

    public function findByNome($nome) {
        $sql = "SELECT * FROM tb_dependentes WHERE DEP_NOME = :nome";
        $statement = Conexao::get()->prepare($sql);
        $nome = $dependente->getNome();
        $statement->bindParam(":nome", $nome);
        $statement->execute();

        $row = $statement->fetch();

        $dependente = new Dependente();
        $dependente->setId($row['PK_DEP']);
        $dependente->setNome($row['DEP_NOME']);
        $dependente->setCpf($row['DEP_CPF']);

        return $dependente;
    }

    public function save(Dependente $dependente) {
        if ($dependente->getId() == null) {
            $this->insert($dependente);
        } else {
            $this->update($dependente);
        }
    }

    private function insert(Dependente $dependente) {
        $sql = "INSERT INTO tb_dependentes (DEP_NOME, DEP_CPF) 
            VALUES (:nome, :cpf);";
        try {
            $statement = Conexao::get()->prepare($sql);
            $nome = $dependente->getNome();
            $cpf = $dependente->getCpf();
            $statement->bindParam(":nome", $nome);
            $statement->bindParam(":cpf", $cpf);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    private function update(Dependente $dependente) {
        $sql = "UPDATE tb_dependentes SET DEP_NOME = :nome, DEP_CPF = :cpf
            WHERE PK_DEP = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $nome = $dependente->getNome();
            $cpf = $dependente->getCpf();
            $id = $dependente->getId();
            $statement->bindParam(":nome", $nome);
            $statement->bindParam(":cpf", $cpf);
            $statement->bindParam(":id", $id);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM tb_dependentes WHERE PK_DEP = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $dependente->getId();
            $statement->bindParam(":id", $id);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
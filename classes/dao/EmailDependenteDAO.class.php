<?php
require_once(__DIR__ . "Caminho do arquivo: Conexao.class.php");
require_once(__DIR__ . "Caminho do arquivo: EmailDependente.class.php");
require_once(__DIR__ . "Caminho do arquivo: Dependente.class.php");

class EmailDependenteDAO {
    public function findAll() {
        $sql = "SELECT PK_DEP, FDD_EMAILS FROM tb_emails_dependentes 
            JOIN tb_dependentes ON PK_DEP = FK_EDD_DEP";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $rows = $statement->fetchAll();
        $emails = array();
        foreach ($rows as $row) {
            $dependente = new Dependente();
            $dependente->setId($row['PK_DEP']);

            $email = new EmailDependente();
            $email->setId($dependente);
            $email->setEmail($row['FDD_EMAILS']);
            array_push($emails, $email);
        }
        return $emails;
    }

    public function findById($id) {
        $sql = "SELECT PK_DEP, FDD_EMAILS FROM tb_emails_dependentes 
            JOIN tb_dependentes ON PK_DEP = FK_EDD_DEP
            WHERE PK_DEP = :id";
        $statement = Conexao::get()->prepare($sql);
        $id = $emailDependente->getId();
        $statement->bindParam(":id", $id);
        $statement->execute();

        $row = $statement->fetch();

        $dependente = new Dependente();
        $dependente->setId($row['PK_DEP']);

        $email = new EmailDependente();
        $email->setId($dependente);
        $email->setEmail($row['FDD_EMAILS']);

        return $email;
    }

    public function save(EmailDependente $emailDependente) {
        if ($emailDependente->getId() == null) {
            $this->insert($emailDependente);
        } else {
            $this->update($emailDependente);
        }
    }

    private function insert(EmailDependente $emailDependente) {
        $sql = "INSERT INTO tb_emails_dependentes (FK_EDD_DEP, FDD_EMAILS) 
            VALUES (:id, :email)";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $emailDependente->getId();
            $email = $emailDependente->getEmail();
            $statement->bindParam(":id", $id);
            $statement->bindParam(":email", $email);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    private function update(EmailDependente $emailDependente) {
        $sql = "UPDATE tb_emails_dependentes 
            SET FK_EDD_DEP = :id, 
                FDD_EMAILS = :email 
            WHERE FK_EDD_DEP = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $emailDependente->getId();
            $email = $emailDependente->getEmail();
            $statement->bindParam(":id", $id);
            $statement->bindParam(":email", $email);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM tb_emails_dependentes WHERE FK_EDD_DEP = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $emailDependente->getId();
            $statement->bindParam(":id", $id);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
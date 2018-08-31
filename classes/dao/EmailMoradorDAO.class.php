<?php
require_once(__DIR__ . "/Conexao.class.php");
require_once(__DIR__ . "/../modelo/EmailMorador.class.php");
require_once(__DIR__ . "/../modelo/Morador.class.php");

class EmailMoradorDAO {
    public function findAll() {
        $sql = "SELECT PK_MOR, EDM_EMAIL FROM tb_emails_moradores 
            JOIN tb_moradores ON PK_MOR = FK_EDM_MOR";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $rows = $statement->fetchAll();
        $emails = array();
        foreach ($rows as $row) {
            $morador = new Morador();
            $morador->setId($row['PK_MOR']);

            $email = new EmailMorador();
            $email->setId($morador);
            $email->setEmail($row['EDM_EMAIL']);
            array_push($emails, $email);
        }
        return $emails;
    }

    public function findById($id) {
        $sql = "SELECT PK_MOR, EDM_EMAIL FROM tb_emails_moradores 
            JOIN tb_moradores ON PK_MOR = FK_EDM_MOR
            WHERE PK_MOR = :id";
        $statement = Conexao::get()->prepare($sql);
        $id = $emailMorador->getId();
        $statement->bindParam(":id", $id);
        $statement->execute();

        $row = $statement->fetch();

        $morador = new Morador();
        $morador->setId($row['PK_MOR']);

        $email = new EmailMorador();
        $email->setId($morador);
        $email->setEmail($row['EDM_EMAIL']);

        return $email;
    }
    
    public function save(EmailMorador $emailMorador) {
        if ($emailMorador->getId() == null) {
            $this->insert($emailMorador);
        } else {
            $this->update($emailMorador);
        }
    }
    
    private function insert(EmailMorador $emailMorador) {
        $sql = "INSERT INTO tb_emails_moradores (FK_EDM_MOR, EDM_EMAIL) 
            VALUES (:id, :email)";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $emailMorador->getId();
            $email = $emailMorador->getEmail();
            $statement->bindParam(":id", $id);
            $statement->bindParam(":email", $email);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    private function update(EmailMorador $emailMorador) {
        $sql = "UPDATE tb_emails_moradores 
            SET FK_EDM_MOR = :id, 
                EDM_EMAIL = :email 
            WHERE FK_EDM_MOR = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $emailMorador->getId();
            $email = $emailMorador->getEmail();
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
        $sql = "DELETE FROM tb_emails_moradores WHERE FK_EDM_MOR = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $id = $emailMorador->getId();
            $statement->bindParam(":id", $id);
            $statement->execute();
            return $this->findById(Conexao::get()->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
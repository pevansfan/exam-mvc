<?php
require_once 'models/Database.php';

class User extends Database
{
    public $id;
    public $email;
    public $firstname;
    public $lastname;
    public $password;
    public $dateCreated;
    public $idRole;
    


    public function create_user(string $email, string $firstname, string $lastname, string $password, $idRole)
{
    try {
        $dateCreated = date('Y-m-d H:i:s');
        $sql = "INSERT INTO users (email, firstname, lastname, password, created_at, id_roles) 
                VALUES (:email, :firstname, :lastname, :password, :dateCreated, :id_roles)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':lastname', $lastname);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':dateCreated', $dateCreated);
        $stmt->bindValue(':id_roles', $idRole);

        return $stmt->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        return false;
    }
}


    public function getByEmail()
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email;";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':email', $this->email);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            var_dump($ex);
            die();
        }
    }
}

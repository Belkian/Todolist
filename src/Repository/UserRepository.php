<?php

namespace src\Repository;

use PDO;
use src\Models\Database;
use src\Models\User;

class UserRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();
        require_once __DIR__ . '/../../config.php';
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM " . PREFIXE . "user;";

        $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return $retour;
    }

    public function getThisUser(int $id): User
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'src\Models\user');
        $retour = $statement->fetch();

        return $retour;
    }

    public function CreateThisUser(User $user): bool
    {
        $sql = "INSERT INTO " . PREFIXE . "user( NAME, LASTNAME, PASSWORD, EMAIL) 
        VALUES (:NAME, :LASTNAME, :PASSWORD, :EMAIL)";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':NAME' => $user->getName(),
            ':LASTNAME' => $user->getLastname(),
            ':PASSWORD' => $user->getPassword(),
            ':EMAIL' => $user->getEmail()
        ]);

        return $retour;
    }


    public function UpdateThisUser(User $user): bool
    {
        $sql = "UPDATE" . PREFIXE . "user SET 
            NOM = :NOM, 
            NAME = :NAME, 
            LASTNAME = :LASTNAME,
            PASSWORD = :PASSWORD,
            EMAIL = :EMAIL,
        WHERE ID = :ID";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $user->getId(),
            ':NAME' => $user->getName(),
            ':LASTNAME' => $user->getLastname(),
            ':PASSWORD' => $user->getPassword(),
            ':EMAIL' => $user->getEmail()
        ]);

        return $retour;
    }

    public function DeleteThisUser($ID)
    {
        try {
            $sql = "DELETE FROM" . PREFIXE . "task WHERE ID_FILMS =  :ID;
              DELETE FROM" . PREFIXE . "user WHERE ID_FILMS =  :ID;";
            $statement = $this->DB->prepare($sql);
            return $statement->execute([':ID' => $ID]);
        } catch (\Error $error) {
            return false;
        }
    }

    public function ConnectThisUser(string $Email): User
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE Email = :Email";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':Email', $Email);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'src\Models\User');
        $retour = $statement->fetch();

        return $retour;
    }
}

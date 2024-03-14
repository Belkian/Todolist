<?php

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

    public function getThisUser($id): User
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $retour = $statement->fetch(PDO::FETCH_CLASS, 'user');

        return $retour;
    }

    public function CreateThisUser(User $user): bool
    {
        $sql = "INSERT INTO " . PREFIXE . "user( NOM, URL_AFFICHE, LIEN_TRAILER, RESUME, DUREE, DATE_SORTIE, ID_CLASSIFICATION_AGE_PUBLIC) VALUES (:NOM, :URL_AFFICHE, :LIEN_TRAILER, :RESUME, :DUREE, :DATE_SORTIE, :ID_CLASSIFICATION_AGE_PUBLIC)";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $user->getID(),
            ':NAME' => $user->getNAME(),
            ':LASTNAME' => $user->getLASTNAME(),
            ':PASSWORD' => $user->getPASSWORD(),
            ':EMAIL' => $user->getEMAIL(),
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
            ':ID' => $user->getID(),
            ':NAME' => $user->getNAME(),
            ':LASTNAME' => $user->getLASTNAME(),
            ':PASSWORD' => $user->getPASSWORD(),
            ':EMAIL' => $user->getEMAIL(),
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
        } catch (Error $error) {
            return false;
        }
    }
}

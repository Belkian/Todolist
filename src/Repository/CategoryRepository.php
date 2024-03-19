<?php

namespace src\Repository;

use PDO;
use src\Models\Database;
use src\Models\Category;

class CategoryRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();
        require_once __DIR__ . '/../../config.php';
    }

    public function getAllCategory()
    {
        $sql = "SELECT * FROM " . PREFIXE . "category;";

        $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return $retour;
    }

    public function getThisCategory(int $id): Category
    {
        $sql = "SELECT * FROM " . PREFIXE . "category WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'src\Models\category');
        $retour = $statement->fetch();

        return $retour;
    }

    public function CreateThisCategory(Category $Category): bool
    {
        $sql = "INSERT INTO category(ID, NAME) VALUES (':NAME')";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':NAME' => $Category->getName(),
        ]);

        return $retour;
    }


    public function UpdateThisCategory(Category $Category): bool
    {
        $sql = "UPDATE" . PREFIXE . "category SET 
            NAME = :NAME, 
        WHERE ID = :ID";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $Category->getId(),
            ':NAME' => $Category->getName(),
        ]);

        return $retour;
    }

    public function DeleteThisCategory($ID)
    {
        try {
            $sql = "DELETE FROM" . PREFIXE . "category WHERE ID = :ID;";
            $statement = $this->DB->prepare($sql);
            return $statement->execute([':ID' => $ID]);
        } catch (\Error $error) {
            return false;
        }
    }
}

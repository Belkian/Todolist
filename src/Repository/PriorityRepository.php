<?php

namespace src\Repository;

use PDO;
use src\Models\Database;
use src\Models\Priority;

class PriorityRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();
        require_once __DIR__ . '/../../config.php';
    }

    public function getAllPriority()
    {
        $sql = "SELECT * FROM " . PREFIXE . "priority;";

        $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return $retour;
    }

    public function getThisPriority(int $id): Priority
    {
        $sql = "SELECT * FROM " . PREFIXE . "priority WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'src\Models\priority');
        $retour = $statement->fetch();

        return $retour;
    }

    public function CreateThisPriority(Priority $Priority): bool
    {
        $sql = "INSERT INTO priority(ID, PRIORITY) VALUES (':PRIORITY')";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':PRIORITY' => $Priority->getPriority(),
        ]);

        return $retour;
    }


    public function UpdateThisPriority(Priority $Priority): bool
    {
        $sql = "UPDATE" . PREFIXE . "priority SET 
            PRIORITY = :PRIORITY, 
        WHERE ID = :ID";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $Priority->getId(),
            ':PRIORITY' => $Priority->getPriority(),
        ]);

        return $retour;
    }

    public function DeleteThisPriority($ID)
    {
        try {
            $sql = "DELETE FROM" . PREFIXE . "avoir WHERE ID_TASK =  :ID;
              DELETE FROM" . PREFIXE . "priority WHERE ID = :ID;";
            $statement = $this->DB->prepare($sql);
            return $statement->execute([':ID' => $ID]);
        } catch (\Error $error) {
            return false;
        }
    }
}

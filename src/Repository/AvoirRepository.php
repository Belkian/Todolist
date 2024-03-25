<?php

namespace src\Repositories;

use PDO;
use src\Models\Database;
use src\Models\Category;
use src\Models\Task;
use src\Models\Avoir;

class AvoirRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }

    // Exemple d'une requête avec query :
    // il n'y a pas de risques, car aucun paramètre venant de l'extérieur n'est demandé dans le sql.
    public function getAllAvoir()
    {
        $sql = "SELECT * FROM " . PREFIXE . "Avoir;";

        return  $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, '\src\Models\Avoir');
    }


    public function CreateThisAvoir(Avoir $Avoir): bool
    {
        $sql = "INSERT INTO " . PREFIXE . "Avoir (ID_CATEGORY, ID_TASK) VALUES (:ID_CATEGORY, :ID_TASK);";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':id_category'     => $Avoir->getCategory()->getId(),
            ':id_task'      => $Avoir->getTask()->getId(),
        ]);

        return $retour;
    }


    public function deleteThisAvoir($Id): bool
    {
        $sql = "DELETE FROM " . PREFIXE . "Avoir WHERE ID_Task = :Id_Task;";

        $statement = $this->DB->prepare($sql);

        return $statement->execute([':Id' => $Id]);
    }
}

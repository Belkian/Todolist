<?php

namespace src\Repository;

use PDO;
use src\Models\Database;
use src\Models\Task;

class TaskRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();
        require_once __DIR__ . '/../../config.php';
    }

    public function getAllTask()
    {
        $sql = "SELECT * FROM " . PREFIXE . "task;";

        $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return $retour;
    }

    public function getThisTask(int $id): Task
    {
        $sql = "SELECT * FROM " . PREFIXE . "task WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'src\Models\task');
        $retour = $statement->fetch();

        return $retour;
    }

    public function CreateThisTask(Task $task): bool
    {
        $sql = "INSERT INTO task(ID, TITLE, TASK, VALID, ID_USER, ID_PRIORITY) VALUES (':TITLE',':TASK',':VALID',':ID_USER',':ID_PRIORITY')";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $task->getId(),
            ':TITLE' => $task->getTitle(),
            ':TASK' => $task->getTask(),
            ':VALID' => $task->getValid(),
            ':ID_USER' => $task->getIdUser(),
            ':ID_PRIORITY' => $task->getIdPriority()
        ]);

        return $retour;
    }


    public function UpdateThisTask(Task $task): bool
    {
        $sql = "UPDATE" . PREFIXE . "task SET 
            TITLE = :TITLE, 
            TASK = :TASK, 
            VALID = :VALID,
            ID_USER = :ID_USER,
            ID_PRIORITY = :ID_PRIORITY,
        WHERE ID = :ID";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $task->getId(),
            ':TITLE' => $task->getTitle(),
            ':TASK' => $task->getTask(),
            ':VALID' => $task->getValid(),
            ':ID_USER' => $task->getIdUser(),
            ':ID_PRIORITY' => $task->getIdPriority()
        ]);

        return $retour;
    }

    public function DeleteThisTask($ID)
    {
        try {
            $sql = "DELETE FROM" . PREFIXE . "avoir WHERE ID_TASK =  :ID;
              DELETE FROM" . PREFIXE . "task WHERE ID = :ID;";
            $statement = $this->DB->prepare($sql);
            return $statement->execute([':ID' => $ID]);
        } catch (\Error $error) {
            return false;
        }
    }
}
<?php

namespace src\Models;

class Task
{
    private $Id;
    private $Title;
    private $Task;
    private $Date;
    private $IdUser;
    private $IdPriority;
 

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    private function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $parts = explode('_', $key);
            $setter = 'set';
            foreach ($parts as $part) {
                $setter .= ucfirst(strtolower($part));
            }

            $this->$setter($value);
        }
    }
    public function getObjectToArrayTask(): array
    {
        return [
            'ID' => $this->getID(),
            'Title' => $this->getTitle(),
            'Task' => $this->getTask(),
            'Date' => $this->getDate(),
            'IdUser' => $this->getIdUser(),
            'IdPriority' => $this->getIdPriority(),
        ];
    }


    /**
     * Get the value of Id
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set the value of Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * Get the value of Title
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Set the value of Title
     *
     * @return  self
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;

        return $this;
    }

    /**
     * Get the value of Task
     */
    public function getTask()
    {
        return $this->Task;
    }

    /**
     * Set the value of Task
     *
     * @return  self
     */
    public function setTask($Task)
    {
        $this->Task = $Task;

        return $this;
    }

    /**
     * Get the value of Date
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Set the value of Date
     *
     * @return  self
     */
    public function setDate($Date)
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * Get the value of IdUser
     */
    public function getIdUser()
    {
        return $this->IdUser;
    }

    /**
     * Set the value of IdUser
     *
     * @return  self
     */
    public function setIdUser($IdUser)
    {
        $this->IdUser = $IdUser;

        return $this;
    }

    /**
     * Get the value of IdPriority
     */
    public function getIdPriority()
    {
        return $this->IdPriority;
    }

    /**
     * Set the value of IdPriority
     *
     * @return  self
     */
    public function setIdPriority($IdPriority)
    {
        $this->IdPriority = $IdPriority;

        return $this;
    }

}

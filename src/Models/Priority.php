<?php

namespace src\Models;

class Priority
{
    private $Id;
    private $Priority;

    public function __construct(array $data = array())
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
     * Get the value of Priority
     */
    public function getPriority()
    {
        return $this->Priority;
    }

    /**
     * Set the value of Priority
     */
    public function setPriority($Priority)
    {
        $this->Priority = $Priority;
    }
}

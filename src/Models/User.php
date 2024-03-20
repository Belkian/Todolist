<?php

namespace src\Models;

class User
{
    private $ID;
    private $NAME;
    private $LASTNAME;
    private $PASSWORD;
    private $EMAIL;

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

    public function getObjectToArray(): array
    {
        return [
            'ID' => $this->getID(),
            'NAME' => $this->getNAME(),
            'LASTNAME' => $this->getLASTNAME(),
            'EMAIL' => $this->getEMAIL(),
            'PASSWORD' => $this->getPASSWORD(),
        ];
    }

    public function passwordverify(string $password): bool
    {
        return password_verify($password, $this->getPassword());
    }

    /**
     * Get the value of ID
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set the value of ID
     */
    public function setID($ID): self
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Get the value of NAME
     */
    public function getNAME()
    {
        return $this->NAME;
    }

    /**
     * Set the value of NAME
     */
    public function setNAME($NAME): self
    {
        $this->NAME = $NAME;

        return $this;
    }

    /**
     * Get the value of LASTNAME
     */
    public function getLASTNAME()
    {
        return $this->LASTNAME;
    }

    /**
     * Set the value of LASTNAME
     */
    public function setLASTNAME($LASTNAME): self
    {
        $this->LASTNAME = $LASTNAME;

        return $this;
    }

    /**
     * Get the value of PASSWORD
     */
    public function getPASSWORD()
    {
        return $this->PASSWORD;
    }

    /**
     * Set the value of PASSWORD
     */
    public function setPASSWORD($PASSWORD): self
    {
        $this->PASSWORD = $PASSWORD;

        return $this;
    }

    /**
     * Get the value of EMAIL
     */
    public function getEMAIL()
    {
        return $this->EMAIL;
    }

    /**
     * Set the value of EMAIL
     */
    public function setEMAIL($EMAIL): self
    {
        $this->EMAIL = $EMAIL;

        return $this;
    }
}

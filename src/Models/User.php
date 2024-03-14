<?php
class User
{
    private $ID;
    private $NAME;
    private $LASTNAME;
    private $PASSWORD;
    private $EMAIL;

    public function __construct(object $datas)
    {
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
    }

    public function getObjectToArray(): array
    {
        return [
            'ID' => $this->getID(),
            'LASTNAME' => $this->getLASTNAME(),
            'NAME' => $this->getNAME(),
            'EMAIL' => $this->getEMAIL(),
            'PASSWORD' => $this->getPASSWORD(),
        ];
    }

    public function passwordverify(string $password): bool
    {
        return password_verify($password, $this->getpassword());
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
     *
     * @return  self
     */
    public function setID($ID)
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
     *
     * @return  self
     */
    public function setNAME($NAME)
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
     *
     * @return  self
     */
    public function setLASTNAME($LASTNAME)
    {
        $this->LASTNAME = $LASTNAME;
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
     *
     * @return  self
     */
    public function setPASSWORD($PASSWORD)
    {
        $this->PASSWORD = $PASSWORD;
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
     *
     * @return  self
     */
    public function setEMAIL($EMAIL)
    {
        $this->EMAIL = $EMAIL;
    }
}

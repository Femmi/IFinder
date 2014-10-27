<?php

class Admin
{

    private $idadmin;
    private $name;
    private $password;

    public function __construct($idadmin, $name, $password)
    {
        $this->idadmin = $idadmin;
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getIdadmin()
    {
        return $this->idadmin;
    }

    /**
     * @param mixed $idadmin
     */
    public function setIdadmin($idadmin)
    {
        $this->idadmin = $idadmin;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

}
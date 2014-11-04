<?php

class Finder implements JsonSerializable{

    private $idfinder;
    private $humberid;
    private $name;
    private $email;

    public function __construct($idfinder, $humberid, $name, $email) {
        $this->idfinder = $idfinder;
        $this->humberid = $humberid;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $humberid
     */
    public function setHumberid($humberid)
    {
        $this->humberid = $humberid;
    }

    /**
     * @return mixed
     */
    public function getHumberid()
    {
        return $this->humberid;
    }

    /**
     * @param mixed $idfinder
     */
    public function setIdfinder($idfinder)
    {
        $this->idfinder = $idfinder;
    }

    /**
     * @return mixed
     */
    public function getIdfinder()
    {
        return $this->idfinder;
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
    public function getName()
    {
        return $this->name;
    }


    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
        return (object) get_object_vars($this);
    }
}
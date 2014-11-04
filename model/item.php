<?php

class Item implements JsonSerializable {

    private $iditem;
    private $name;
    private $description;
    private $location;
    private $datefound;
    private $finderid;
    private $ownerid;

    public function __construct($iditem,
                                //$name,
                                $description,
                                $location,
                                $datefound,
                                $finderid,
                                $ownerid) {
        $this->iditem = $iditem;
        //$this->name = $name;
        $this->description = $description;
        $this->location = $location;
        $this->datefound = $datefound;
        $this->finderid = $finderid;
        $this->ownerid = $ownerid;
    }

    /**
     * @param mixed $datefound
     */
    public function setDatefound($datefound)
    {
        $this->datefound = $datefound;
    }

    /**
     * @return mixed
     */
    public function getDatefound()
    {
        return $this->datefound;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $finderid
     */
    public function setFinderid($finderid)
    {
        $this->finderid = $finderid;
    }

    /**
     * @return mixed
     */
    public function getFinderid()
    {
        return $this->finderid;
    }

    /**
     * @param mixed $iditem
     */
    public function setIditem($iditem)
    {
        $this->iditem = $iditem;
    }

    /**
     * @return mixed
     */
    public function getIditem()
    {
        return $this->iditem;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
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
     * @param mixed $ownerid
     */
    public function setOwnerid($ownerid)
    {
        $this->ownerid = $ownerid;
    }

    /**
     * @return mixed
     */
    public function getOwnerid()
    {
        return $this->ownerid;
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
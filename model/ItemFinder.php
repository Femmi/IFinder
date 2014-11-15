<?php
/**
 * Created by PhpStorm.
 * User: Abhinav
 * Date: 11/15/14
 * Time: 3:15 PM
 */

class ItemFinder implements JsonSerializable {

    private $iditem;
    private $description;
    private $location;
    private $datefound;
    private $finderid;
    private $ownerid;
    private $humberid;
    private $name;
    private $email;

    public function __construct(
        $iditem,
        $description,
        $location,
        $datefound,
        $finderid,
        $ownerid,
        $humberid,
        $name,
        $email
    ) {
        $this->iditem = $iditem;
        $this->description = $description;
        $this->location = $location;
        $this->datefound = $datefound;
        $this->finderid = $finderid;
        $this->ownerid = $ownerid;
        $this->humberid = $humberid;
        $this->name = $name;
        $this->email = $email;
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
        return (object) get_object_vars($this);
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
     * @return mixed
     */
    public function getIditem()
    {
        return $this->iditem;
    }

    /**
     * @param mixed $iditem
     */
    public function setIditem($iditem)
    {
        $this->iditem = $iditem;
    }
}
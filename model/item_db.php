<?php

class ItemDB
{
    
    public static function getFindersNameByItems($items){
        $db = Database::getDB();
        
        $result = array();
        
        foreach($items as $item) {
            $query = 'select finder.name from finder finder, item item where finder.idfinder = item.finderid and item.iditem = ' . $item->getIditem();
        
            $resultdb = $db->query($query);

            $name ='';
            foreach ($resultdb as $row) {
                $name = $row['name'];
            }
            $result[] = [$name=>$item]  ;
        }
        return $result;
    }
    
    public static function getItems()
    {
        $db = Database::getDB();

        $query = 'SELECT * FROM item ORDER BY iditem;';

        $result = $db->query($query);

        $items = array();

        foreach ($result as $row) {
            $item = new Item(
                $row['iditem'],
                //$row['name'],
                $row['description'],
                $row['location'],
                $row['datefound'],
                $row['finderid'],
                $row['ownerid']
            );
            $items [] = $item;
        }
        return $items;
    }

    public static function addItem($item) {

        $db = Database::getDB();

        $name = $item->getName();
        $description = $item->getDescription();
        $location = $item->getLocation();
        $datefound = $item->getDatefound();
        $finderid = $item->getFinderid();
        $ownerid = $item->getOwnerid();

        $query = "INSERT INTO item(description, location, datefound, finderid, ownerid)
                    VALUES('$description', '$location', '$datefound', '$finderid', null);";

        $row_count = $db->exec($query);
        echo $query;
        return $row_count;
    }

    public static function getItemByDescription($description) {
        $db = Database::getDB();
        $query = "SELECT * FROM item where description like '%$description%'";

        $result = $db->query($query);

        $items = array();

        foreach($result as $row) {
            $items [] = new Item(
                $row['iditem'],
                //$row['name'],
                $row['description'],
                $row['location'],
                $row['datefound'],
                $row['finderid'],
                $row['ownerid']
            );
        }
        return $items;
    }

    public static function getItemByLocation($location)
    {
        $db = Database::getDB();
        $query = "SELECT * FROM item where location like '%$location%'";

        $result = $db->query($query);

        $items = array();

        foreach($result as $row) {
            $items [] = new Item(
                $row['iditem'],
                //$row['name'],
                $row['description'],
                $row['location'],
                $row['datefound'],
                $row['finderid'],
                $row['ownerid']
            );
        }
        return $items;
    }

    public static function getItemByDate($date)
    {
        $db = Database::getDB();
        $query = "SELECT * FROM item where datefound like '%$date%'";

        $result = $db->query($query);

        $items = array();

        foreach($result as $row) {
            $items [] = new Item(
                $row['iditem'],
                //$row['name'],
                $row['description'],
                $row['location'],
                $row['datefound'],
                $row['finderid'],
                $row['ownerid']
            );
        }
        return $items;
    }
}
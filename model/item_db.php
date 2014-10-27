<?php

class ItemDB
{
    public static function getItems()
    {
        $db = Database::getDB();

        $query = 'SELECT * FROM item ORDER BY iditem;';

        $result = $db->query($query);

        $items = array();

        foreach ($result as $row) {
            $item = new Item(
                $row['iditem'],
                $row['name'],
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

        $query = "INSERT INTO item(name, description, location, datefound, finderid, ownerid)
                    VALUES('$name', '$description', '$location', '$datefound', null, null);";

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
                $row['name'],
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
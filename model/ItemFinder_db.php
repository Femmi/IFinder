<?php
/**
 * Created by PhpStorm.
 * User: Abhinav
 * Date: 11/15/14
 * Time: 3:25 PM
 */


class ItemFinderDB {
    public static function getItemFinderByIdItem($iditem)
    {
        $db = Database::getDB();
        $query = 'select * from item inner join finder on item.finderid = finder.idfinder where iditem = ' . $iditem;

        $result = $db->query($query);

        foreach ($result as $row) {
            return new ItemFinder(
                $row['iditem'],
                $row['description'],
                $row['location'],
                $row['datefound'],
                $row['finderid'],
                $row['ownerid'],
                $row['humberid'],
                $row['name'],
                $row['email']
            );
        }
    }
}
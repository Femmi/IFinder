<?php

class FinderDB
{

    public static function addOrUpdateFinder($finder)
    {
        try {
            $db = Database::getDB();

            if (self::isFinder($finder) == true) {
                $query = "UPDATE finder set name='" . $finder->getName() . "'" .
                    ", email='" . $finder->getEmail() . "' WHERE humberid='" .
                    $finder->getHumberid() . "'";
                $db->exec($query);
                echo 'updated ';
            } else {
                $query = "INSERT INTO finder(humberid, name, email) values('" . $finder->getHumberid() . "', '" . $finder->getName() . "', '" . $finder->getEmail() . "')";
                $db->exec($query);
                echo 'added ';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        echo self::getFinderID($finder);

        return self::getFinderID($finder);

    }


    private static function isFinder($finder)
    {
        $db = Database::getDB();
        $query = "SELECT humberid from finder where humberid = '" . $finder->getHumberid() . "'";
        $result = $db->query($query);

        if ($result->fetchColumn()) {
            return true;
        } else return false;
    }

    private static function getFinderID($finder)
    {
        if (self::isFinder($finder)) {
            $db = Database::getDB();
            $query = "SELECT * from finder where humberid = '" . $finder->getHumberid() . "'";
            $result = $db->query($query);

            $row = $result->fetch();
            return $row['idfinder'];
        }
    }

} 
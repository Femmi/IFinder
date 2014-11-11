<?php

class AdminDB {

    public static function getAdmins() {
        $db = Database::getDB();
        //select query that returns  the admin data based on id
        $query = 'SELECT * FROM admin order by idadmin;';
        $result = $db->query($query);
        //creating an array object
        $admins = array();
        //foreach that loops through the result return 
        foreach($result as $row) {
            //creates objects of admin and assign the properties
            $admin = new Admin($row['idadmin'], $row['name'], $row['password']);
            $admins[] = $admin;
        }

        return $admins;
    }

}
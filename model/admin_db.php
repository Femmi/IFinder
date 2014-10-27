<?php

class AdminDB {

    public static function getAdmins() {
        $db = Database::getDB();

        $query = 'SELECT * FROM admin order by idadmin;';
        $result = $db->query($query);

        $admins = array();

        foreach($result as $row) {
            $admin = new Admin($row['idadmin'], $row['name'], $row['password']);
            $admins[] = $admin;
        }

        return $admins;
    }

}
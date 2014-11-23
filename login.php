<?php

include 'model/admin_db.php';
include 'model/admin.php';

session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
// Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];
//To protect injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);

        $result = AdminDB::getAdminsPerson($username, $password);
        $Admin = null;
        foreach ($result as $row) {

            $Admin = new Admin($row['idadmin'], $row['name'], $row['password']);
        }


        if ($Admin != null) {
            $_SESSION['login_user'] = $username; // Initializing Session
            header("location: itemLogger.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
        } // Closing Connection
    }

}
?>
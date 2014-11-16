<?php
require_once('../model/database.php');
require_once('../model/ItemFinder.php');
require_once('../model/ItemFinder_db.php');
/**
 * Created by PhpStorm.
 * User: Abhinav
 * Date: 11/15/14
 * Time: 3:25 PM
 */

getItemFinderByIdItem(24);

if (isset($_GET['itemfinderbyid'])) {
    echo getItemFinderByIdItem($_GET['itemfinderbyid']);
} else if (isset($_GET['itemOwnerbyid'])) {
    echo getItemOwnerByIdItem($_GET['itemOwnerbyid']);
}

function getItemFinderByIdItem($id) {
    $result = ItemFinderDB::getItemFinderByIdItem($id);
    header('Content-Type: application/json');
    return json_encode($result);
}

function getItemOwnerByIdItem($id) {
    $result = ItemFinderDB::getItemOwnerByIdItem($id);
    header('Content-Type: application/json');
    return json_encode($result);
}
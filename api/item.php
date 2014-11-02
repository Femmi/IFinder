<?php
require_once('../model/database.php');
require_once('../model/item.php');
require_once('../model/item_db.php');

if(count($_GET) == 0) {
    echo getAllItems();
}

function getAllItems()
{
    $items = ItemDB::getItems();
    header('Content-Type: application/json');
    return json_encode($items);
}

?>
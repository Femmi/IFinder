<?php
require_once('../model/database.php');
require_once('../model/item.php');
require_once('../model/item_db.php');

if (count($_GET) == 0) {
    echo getAllItems();
} else {
    if (isset($_GET['description'])) {
        echo getItemByDescription($_GET['description']);
    } else if (isset($_GET['location'])) {
        echo getItemByLocation($_GET['location']);
    } else if (isset($_GET['date'])) {
        echo getItemByDate($_GET['date']);
    } else if (isset($_GET['searchBox'])) {
        echo getFindersNameByItems(ItemDB::getItemByDescription($_GET['searchBox']));
    }
}

function getAllItems()
{
    $items = ItemDB::getItems();
    header('Content-Type: application/json');
    return json_encode($items);
}

function getItemByDescription($description)
{
    $items = ItemDB::getItemByDescription($description);
    header('Content-Type: application/json');
    return json_encode($items);
}

function getItemByLocation($location)
{
    $items = ItemDB::getItemByLocation($location);
    header('Content-Type: application/json');
    return json_encode($items);
}

function getItemByDate($date)
{
    $items = ItemDB::getItemByDate($date);
    header('Content-Type: application/json');
    return json_encode($items);
}

function getFindersNameByItems($item) {
    
    $items = ItemDB::getFindersNameByItems($item);
    header('Content-Type: application/json');
    return json_encode($items);
}

?>
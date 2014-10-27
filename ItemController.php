<?php
require_once('model/database.php');
require_once('model/item.php');
require_once('model/item_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

if($action == "add_item") {
    addToDB();
    header("Location: ItemLogger.php");
}


function addToDB() {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $date = $_POST['date'];

    $item = new Item(0, $name, $description, $location, $date, NULL, NULL);
    ItemDB::addItem($item);
}
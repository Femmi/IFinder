<?php
require_once('model/database.php');
require_once('model/item.php');
require_once('model/item_db.php');
require_once('model/Finder.php');
require_once('model/Finder_db.php');

echo $_POST['action'];

if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

if($action == "add_item") {
    addToDB();
    header("Location: ItemLogger.php");
} else if ($action == "add_item_from_admin") {
    if (isset($_POST['itemid'])) {
        updateItem();
    } else {
        addToDB();
    }
    header("Location: Administrator.php");
}


function updateItem() {

    echo 'inupdate';

    $finder = new Finder(0, $_POST['humberid'], $_POST['name'], $_POST['emailaddress']);
    $idfinder = FinderDB::addOrUpdateFinder($finder);

    $item = new Item(
        $_POST['itemid'],
        $_POST['description'],
        $_POST['location'],
        $_POST['datefound'],
        $idfinder,
        NULL
    );

    ItemDB::updateItem($item);
}

function addToDB() {
    //$name = $_POST['name'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $date = $_POST['date'];

    $finder = new Finder(0, $_POST['humberid'], $_POST['name'], $_POST['emailaddress']);

    $idfinder = FinderDB::addOrUpdateFinder($finder);

    $item = new Item(0, $description, $location, $date, $idfinder, NULL);
    ItemDB::addItem($item);
}
<?php

session_start();

require_once('model/database.php');
require_once('model/item.php');
require_once('model/item_db.php');
require_once('model/Finder.php');
require_once('model/Finder_db.php');
require_once('model/ItemFinder.php');
require_once('model/ItemFinder_db.php');
require_once ('validation/validation.php');
require_once ('iFinderMail.php');

function setOwner() {
    $finder = new Finder(0, $_POST['humberid'], $_POST['name'], $_POST['emailaddress']);

    $idfinder = FinderDB::addOrUpdateFinder($finder);

    $item = new Item(
        $_POST['itemid'], $_POST['description'], $_POST['location'], $_POST['datefound'], $_POST['finderid'], $idfinder
    );

    ItemDB::updateItem($item);
    $itemFinder = ItemFinderDB::getItemFinderByIdItem($item->getIditem());
    iFinderMail::sendMail($itemFinder->getEmail(), $itemFinder->getDescription());
}

function addToDB() {
    //$name = $_POST['name'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    if(isset($_POST['date'])){
        $date = $_POST['date'];
    }

    if(isset($_POST['datefound'])){
        $date = $_POST['datefound'];
    }

    $finder = new Finder(0, $_POST['humberid'], $_POST['name'], $_POST['emailaddress']);

    $idfinder = FinderDB::addOrUpdateFinder($finder);

    $item = new Item(0, $description, $location, $date, $idfinder, NULL);
    ItemDB::addItem($item);
}

function updateItem() {

    echo 'inupdate';

    $finder = new Finder(0, $_POST['humberid'], $_POST['name'], $_POST['emailaddress']);
    $idfinder = FinderDB::addOrUpdateFinder($finder);

    $item = new Item(
        $_POST['itemid'], $_POST['description'], $_POST['location'], $_POST['datefound'], $idfinder, NULL
    );

    ItemDB::updateItem($item);
}

if (isset($_POST['action'])) {
    
    if (isset($_SESSION['pagepath'])) {
        $pageAction = $_SESSION['pagepath'];
    }

    $validObject = new Validate();
    


    $humberId = $email = $name = $itemDescription = $location = $date = "";

    if (isset($_POST['humberid'])) {
        $humberId = trim($_POST['humberid']);
        $idStatus = $validObject->validIdNumber($humberId);

        if (!$idStatus) {
            $humberId = '';
        }
    }

    if (isset($_POST['name'])) {
        $name = trim($_POST['name']);
        $nameStatus = $validObject->isNameValid($name);

        if (!$nameStatus) {
            $name = '';
        }
    }
    if (isset($_POST['description'])) {
        $itemDescription = trim($_POST['description']);
        $discriptionStatus = $validObject->isDescriptionValid($itemDescription);

        if (!$discriptionStatus) {
            $itemDescription = '';
        }
    }


    if (isset($_POST['location'])) {
        $location = trim($_POST['location']);
        $locationStatus = $validObject->isLocationValid($location);

        if (!$locationStatus) {
            $location = '';
        }
    }

    if (isset($_POST['emailaddress'])) {
        $email = trim($_POST['emailaddress']);
        $emailStatus = $validObject->validEmail($email);

        if (!$emailStatus) {
            $email = '';
        }
    }
    
    if(isset($_POST['datefound'])){
        $date = $_POST['datefound'];
    }
}

if (!($idStatus && $discriptionStatus && $locationStatus && $emailStatus && $nameStatus)) {
    
    $tempValueStorage = array();
    $tempValueStorage['humberId'] = $humberId;
    $tempValueStorage['name'] = $name;
    $tempValueStorage['email'] = $email;
    $tempValueStorage['description'] = $itemDescription;
    $tempValueStorage['location']= $location;
    $tempValueStorage['date']=$date;
    
    
    $femi= $validObject->getValidText();
    
    $_SESSION['userFields'] = $tempValueStorage; 
    $_SESSION['currentObject'] = $validObject;
    
    
    
    
    header("Location:". $pageAction);
    
    
   
    
} else {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    }

    if ($action == "add_item") {
        addToDB();
        header("Location: ItemLogger.php");
    } else if ($action == "add_item_from_admin") {
        if (isset($_POST['itemid']) && $_POST['itemid'] != 'itemid') {
            updateItem();
        } else {
            addToDB();
        }
        header("Location: Administrator.php");
    } else if ($action == 'set_owner_from_admin') {
        setOwner();
        header("Location: Administrator.php");
    }



}

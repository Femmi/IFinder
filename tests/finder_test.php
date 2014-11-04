<?php

require_once('../model/database.php');
require_once('../model/Finder.php');
require_once('../model/Finder_db.php');

$finder = new Finder(0, 'n01014611', 'hehe', 'hehe@gmail.com');

FinderDB::addOrUpdateFinder($finder);
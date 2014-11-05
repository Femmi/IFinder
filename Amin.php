<?php
require_once('model/database.php');
require_once('model/item.php');
require_once('model/item_db.php');

$items;
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == "search_item") {
        $items = ItemDB::getItemByDescription($_POST['description']);
    }
}
?>

<div class="row text-center">
    <h2 data-wow-delay="1.3s" class="row pad-top-botm wow bounceInDown animated"><strong>ADMINISTRATOR's PORTAL</strong></h2>
</div>
<div id="theSearch" class="row pad-top-botm wow flipInX animated" data-wow-delay="1.2s">
    <div class="col-lg-1 col-md-1 col-sm-1" ></div>
    <div class="col-lg-10 animated">
        <div class="page-header">
            <h3>Inventory</h3>
        </div>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>#</th>
                <th>Finder's Name</th>
                <th>Item Found</th>
                <th>Description</th>
                <th>Date</th>
                <th></th>
            </tr>            
            </thead>           
            <tbody id="info2">
                <tr>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td><a href="#" class="btn btn-success btn-sm" name="update_button" value="update">Update</a>
                    &nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-danger btn-sm" name="delete_button" value="delete">Delete</a></td>
                </tr>
                
            </tbody>              
        </table>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1"></div>   
</div>
<div class="row">
    <div class="col-lg-1 col-md-1 col-sm-1 "></div>
        <div class="form-group col-lg-2 col-md-2 col-sm-2 wow bounceInDown animated">
            <button type="submit" class="btn btn-success btn-block btn-sm">Add new Item</button>
        </div>
    </div>
    
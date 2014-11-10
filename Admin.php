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
    <h2 id="adminline" data-wow-delay="1.3s" class="row pad-top-botm wow bounceInDown animated"><strong>ADMINISTRATOR'S PORTAL</strong></h2>
</div>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 "></div>    
    <form class="formsearch">
    <div class="col-lg-4 col-md-4 col-sm-4 wow bounceInDown animated animated" style="padding: 20px; visibility: visible; -webkit-animation: bounceInDown 0.5s;" data-wow-delay="0.3s">
                        <div class="div-trans text-center media wow rotateIn animated animated animated adminSrch " data-wow-delay="0.5s" style="visibility: visible; -webkit-animation: rotateIn 0.5s 0.5s;">
                            
                            <input type="text" class="form-control" placeholder="Search" id="searchInput">
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                               </form>  

    
    <div class="col-lg-4 col-md-4 col-sm-4 "></div>
        
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
            <a href="#mymodal" class="btn btn-success btn-block btn-sm" data-toggle="modal">Add new Item</a>
        </div>
    </div>
<div class="modal fade" id="mymodal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modContent">
            <div class="modal-header">
                <button class="close cls" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add item</h4>
                
            </div>
            <div class="modal-body">               
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputId">Humber ID</label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input class="form-control" id="inputId">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputName">Name</label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input class="form-control" id="inputName">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputEmail">Email Address</label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input class="form-control" id="inputEmail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputLocation">Item Description</label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input class="form-control" id="inputLocation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputDate">Location Found</label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input class="form-control" id="inputDate">
                        </div>
                    </div>
                     <div class="form-group">                         
                        <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputDescription">yyyy-mm-dd</label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input class="form-control" id="inputDescription">
                            <button class="btn btn-success pull-right" type="submit">Save</button>
                        </div>
                    </div>
                    
                </form>
            
            </div>
            <div class="modal-footer">
                 <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
                <p><small class="text-muted"> Click out of this window or use the cancel button to close this window</small></p>
                
                
            </div>
            
        </div>        
    </div>    
</div>
    
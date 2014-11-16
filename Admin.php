<?php
/*
require_once('model/database.php');
require_once('model/item.php');
require_once('model/item_db.php');

$items;
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == "search_item") {
        $items = ItemDB::getItemByDescription($_POST['description']);
    }
}*/
?>

<script src="assets/js/jquery-1.10.2.js"></script>
<script type="text/javascript">
    var filterResult = function (inputName) {
        var inputValue = $('[name='+inputName+']').filter('input').val();
        if(inputValue.length == 0) {
            $("#info2").empty();
        } else {
        $.getJSON("api/item.php?" + inputName + "=" + inputValue,
            function (Data) {
                $("#info2").empty();
                $.each(Data, function (key, val) {
                    var name;
                    for(var prop in val) {
                        name = prop;
                    }
                    $('<tr class="info">' + '<td>' +
                        '<div id="itemid">' +
                        val[name].iditem + '</div></td>' +
                        '<td>' + name + '</td>' +
                        '<td>' + val[name].description + '</td>' +
                        '<td>' + val[name].datefound + '</td>' +
                        '<td><a href="#" class="btn btn-success btn-sm" name="update_button" value="update" onclick="fillModal('+val[name].iditem+');"><div id="updateButtonText'+val[name].iditem+'">Update</div></a>' +
                        '<a href="#" class="btn btn-danger btn-sm" name="delete_button" value="delete">Delete</a></td></tr>'
                    ).appendTo("#info2");
                });

            });
        }
    }

    var fillModal = function (row) {
        console.log('#updateButtonText' + row);
        $('#updateButtonText' + row).text("Loading ...");
        $.getJSON("api/itemfinder.php?itemfinderbyid=" + row,
            function (Data) {

                $('#iditem').val(row);
                $('#idhumberid').val(Data.humberid);
                $('#idname').val(Data.name);
                $('#idEmailAddress').val(Data.email);
                $('#idDescription').val(Data.description);
                $('#idLocationFound').val(Data.location);
                $('#idDateFound').val(Data.datefound);
                $('#idfinderid').val(Data.finderid);

                $('#modalWindowItemForm').trigger('click');
                $('#updateButtonText' + row).text("Update");
            });

    }
</script>

<div class="row text-center">
    <h2 id="adminline" data-wow-delay="1.3s" class="row pad-top-botm wow bounceInDown animated"><strong>ADMINISTRATOR'S PORTAL</strong></h2>
</div>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 "></div>
    <form class="formsearch">
    <div class="col-lg-4 col-md-4 col-sm-4 wow bounceInDown animated animated" style="padding: 20px; visibility: visible; -webkit-animation: bounceInDown 0.5s;" data-wow-delay="0.3s">
                        <div class="div-trans text-center media wow rotateIn animated animated animated adminSrch " data-wow-delay="0.5s" style="visibility: visible; -webkit-animation: rotateIn 0.5s 0.5s;">

                            <input type="text" class="form-control" placeholder="Search" id="searchInput" name="searchBox" onkeyup="filterResult(this.name)">
                            <button type="submit" class="btn btn-default" name="search_item"><span class="glyphicon glyphicon-search"></span></button>
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
        <div class="form-group col-lg-2 col-md-2 col-sm-2 wow bounceInDown animated" >
            <a href="#mymodal" class="btn btn-success btn-block btn-sm" data-toggle="modal" id="modalWindowItemForm">Add new Item</a>
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
                <form class="form-horizontal" action="ItemController.php" method="post" id="add_item_form">
                    <input type="hidden" name="action" value="add_item_from_admin">
                    <input type="hidden" name="itemid" value="itemid" id="iditem">
                    <input type="hidden" name="finderid" value="finderid" id="idfinderid">
                    <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputId">Humber ID</label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input type="text" name="humberid" class="form-control" required="required" placeholder="Humber ID" id="idhumberid">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputName">Name</label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name" id="idname">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputEmail">Email Address</label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input type="text" name="emailaddress" class="form-control" required="required"
                                   placeholder="Email Address" id="idEmailAddress">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputDescription">Item Description</label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input type="text" name="description" class="form-control" required="required"
                                   placeholder="Item Description" id="idDescription">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputLocation">Location Found</label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input class="form-control" id="idLocationFound" name="location">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="datefound">Date</label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input type="date" name="datefound" class="form-control" required="required"
                                   placeholder="Time Stamp" id="idDateFound" >
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
    
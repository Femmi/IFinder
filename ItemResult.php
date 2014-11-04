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

<!--<script src="assets/js/jquery-1.10.2.js"></script>
<script type="text/javascript">
    var filterResult = function (filter) {
        $.getJSON("api/item.php?filter="+filter,
            function (Data) {

                $.each(Data, function (key, val) {
                    $('<tr class="info">' + '<td>' +
                        val.iditem + '</td>' +
                        '<td>' + val.description + '</td>' +
                        '<td>' + val.datefound + '</td>' + '</tr>'
                    ).appendTo("#info2");
                });

            });
    }
</script>-->

<div id="theSearch" class="row pad-top-botm wow flipInX animated" data-wow-delay="1.2s">
    <div class="col-lg-8 col-md-8 col-sm-8 ">
        <div class="page-header">
            <h3>Search Result</h3>
        </div>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Date Logged</th>
            </tr>
            </thead>
            <tbody id="info2">
            </tbody>
        </table>
        <ul id="items"/>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 text-center">
        <i class="fa fa-lightbulb-o big-icon "></i>
    </div>
</div>
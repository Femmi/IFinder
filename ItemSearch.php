<?php
require_once('userHeader.php');
?>

<script src="assets/js/jquery-1.10.2.js"></script>
<script type="text/javascript">
    var filterResult = function (inputName) {
        console.log('in filter');
        var inputValue = $('[name='+inputName+']').filter('input').val();
        console.log("api/item.php?" + inputName + "=" + inputValue);
        $.getJSON("api/item.php?" + inputName + "=" + inputValue,
            function (Data) {
                console.log('test');
                $("#info2").empty();
                $.each(Data, function (key, val) {
                    $('<tr class="info">' + '<td>' +
                        val.iditem + '</td>' +
                        '<td>' + val.description + '</td>' +
                        '<td>' + val.datefound + '</td>' + '</tr>'
                    ).appendTo("#info2");
                });

            });
    }
</script>

<div id="about">
    <div class="overlay">
        <div class="container">
            <!--            <div class="row text-center">
                            <div
                                class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 sub-head myInnerRow">
                                <h2 data-wow-delay="0.3s" class="wow rollIn animated"><strong>FIND YOUR PERSONAL BELONGING</strong>
                                </h2>

                                <p class="sub-head">The more concise you are the more easy to find your belongings</p>
                            </div>
                        </div>-->
            <div class="row ">
                <div class="col-lg-4 col-md-4">
                    <div class="media wow rotateIn animated" data-wow-delay="0.1s">
                        <div class="pull-left">
                            <i class="fa fa-lightbulb-o fa-3x  "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Search Tips</h3>

                            <p>
                                The more concise you are about the description of the Item, the more easy to find the
                                item.
                            </p>

                        </div>
                    </div>
                    <div class="media wow rotateIn animated" data-wow-delay="0.2s">
                        <div class="pull-left">
                            <i class="fa fa-cab fa-3x "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Item could be dispatched</h3>

                            <p>
                                You could specify your address and have you item dispatched over at you house. It has
                                been made easy.
                            </p>

                        </div>
                    </div>

                </div>
                <form action="" method="post" id="search_item_form">
                    <input type="hidden" name="action" value="search_item" />
                    <div class="col-lg-4 col-md-4 wow bounceInDown animated" style="padding: 10px;"
                         data-wow-delay="0.3s">
                        <div class="div-trans text-center itemlog2 media wow rotateIn animated animated"
                             data-wow-delay="0.5s" style="visibility: visible; -webkit-animation: rotateIn 0.5s;">
                            <h3 id="parag">SEARCH ITEM</h3>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="description" class="form-control" required="required"
                                           placeholder="Item Description" onkeyup="filterResult(this.name)">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="location" class="form-control" required="required" placeholder="Location" onkeyup="filterResult(this.name)">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="date" class="form-control" required="required"
                                           placeholder="Time Stamp" onkeyup="filterResult(this.name)">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block btn-lg">Search</button>
                                </div>
                                <div class="form-group" id="newSpec">
                                    <button type="submit" class="btn btn-block btn-lg btn-danger">Cancel</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <div class="col-lg-4 col-md-4">

                    <div class="media wow rotateIn animated" data-wow-delay="0.5s">
                        <div class="pull-left">
                            <i class="fa fa-laptop fa-3x  "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Item delivery status</h3>

                            <p>
                                You get a delivery message by email as soon as your item is shipped over to the address
                                specified or picked up.
                            </p>

                        </div>
                    </div>
                    <div class="media wow rotateIn animated" data-wow-delay="0.5s">
                        <div class="pull-left">
                            <i class="fa fa-life-ring fa-4x  "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Resource Utilization</h3>

                            <p>
                                This is a User friendly application, nothing complication...Make the must use of this
                                application when needed.
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <?php require_once('ItemResult.php')
            ?>


        </div>
    </div>
</div>
<?php
require_once 'Footer.php';
?>
<!--./ ABOUT SECTION END -->
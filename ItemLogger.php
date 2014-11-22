<?php

require_once('adminHeader.php');
require_once 'validation/validation.php';
session_start();

if(!isset($_SESSION['login_user']))
{
   header("location: adminHome.php");
}


$tempArrayForFields = $tempValidationObject = '';

if(isset($_SESSION['userFields'])){
    
    $tempArrayForFields = $_SESSION['userFields'];
    
}

if(isset($_SESSION['currentObject'])){   
    $tempValidationObject = $_SESSION['currentObject'];
    $invalidObj = $tempValidationObject->getValidText();
}





?>

<div id="help">
    <div class="overlay">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <h2 data-wow-delay="0.3s" class="animated bounceIn"><strong>LOG ITEM FOUND!</strong></h2>

                    <p class="sub-head">Carefully log items found, Be precise and accurate about the description of the
                        item before committing in the database. </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1"></div>
                    <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="div-trans text-center itemlog media wow bounceIn"
                         data-wow-delay="0.5s" >
                        <h3 id="parag">LOG ITEM</h3>
                        <form action="ItemController.php" method="post" id="add_item_form">
                            <input type="hidden" name="action" value="add_item" />
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <?php if(isset($invalidObj['studentID'])){echo '<p><small>'. $invalidObj['studentID'].'</small></p>';}?>
                                <div class="form-group">
                                    <input type="text" <?php if(!empty($tempArrayForFields['humberId'])){echo 'value="' .$tempArrayForFields['humberId'] .'"';} ?>name="humberid" class="form-control" required="required" placeholder="Humber ID">
                                </div>
                                <?php if(isset($invalidObj['name'])){echo '<p><small>'. $invalidObj['name'].'</small></p>';}?>
                                <div class="form-group">
                                    <input type="text" <?php if(!empty($tempArrayForFields['name'])){echo 'value="' .$tempArrayForFields['name'] .'"';} ?> name="name" class="form-control" required="required" placeholder="Name">
                                </div>
                                <?php if(isset($invalidObj['email'])){echo '<p><small>'. $invalidObj['email'].'</small></p>';}?>
                                <div class="form-group">
                                    <input type="text" <?php if(!empty($tempArrayForFields['email'])){echo 'value="' .$tempArrayForFields['email'] .'"';} ?>name="emailaddress" class="form-control" required="required"
                                           placeholder="Email Address">
                                </div>
                                <?php if(isset($invalidObj['description'])){echo '<p><small>'. $invalidObj['description'].'</small></p>';}?>
                                <div class="form-group">
                                    <input type="text" <?php if(!empty($tempArrayForFields['description'])){echo 'value="' .$tempArrayForFields['description'] .'"';} ?>name="description" class="form-control" required="required"
                                           placeholder="Item Description">
                                </div>
                                <?php if(isset($invalidObj['location'])){echo '<p><small>'. $invalidObj['location'].'</small></p>';}?>
                                <div class="form-group">
                                    <input type="text" <?php if(!empty($tempArrayForFields['location'])){echo 'value="' .$tempArrayForFields['location']. '"';} ?>name="location" class="form-control" required="required" placeholder="Location">
                                </div>
                                <div class="form-group">
                                    <input type="date" <?php if(!empty($tempArrayForFields['date'])){echo 'value="' .$tempArrayForFields['date'] .'"';} ?>name="datefound" class="form-control" required="required"
                                           placeholder="Time Stamp">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block btn-lg">Insert</button>
                                </div>
                                <div class="form-group" id="newSpec">
                                    <button type="submit" class="btn btn-block btn-lg btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>               
                <div class="col-lg-6 col-md-6 col-sm-6  suggwdi">

                    <div class="animated lightSpeedIn" data-wow-delay="0.7s">
                        <div class="pull-left">
                            <i class="fa fa-bell fa-4x  "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Did you know?</h3>

                            <p>
                                That you could save a lot of time using the IFinder Application?
                            </p>

                        </div>
                    </div>
                    <div class="animated fadeInLeftBig" data-wow-delay="0.9s">
                        <div class="pull-left">
                            <i class="fa fa-bell fa-4x  "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Did you also know?</h3>

                            <p>
                                It takes minimum of 30 minutes to recover a lost item without the IFinder.
                                Our research has shown that students mishandle items at least 4 times in a week!
                            </p>

                        </div>
                    </div>
                    <div class="animated fadeInRightBig" data-wow-delay="0.6s">
                        <div class="pull-left">
                            <i class="fa fa-bell fa-4x  "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Did you also know?</h3>

                            <p>
                                You could as well have your missing item shipped over to your apartment at a very low
                                cost.
                            </p>

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>

</div>


<?php 

if(isset($_SESSION['userFields'])){
    unset($_SESSION['userFields']);
}
if(isset($_SESSION['currentObject'])){
    unset($_SESSION['currentObject']);
}

$_SESSION['pagepath'] = $_SERVER['PHP_SELF'];


require_once('Footer.php');
?>

<!--./ HELP SECTION END -->
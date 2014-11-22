<?php
require_once('adminHeader.php');
include('login.php');
?>
    <div id="home" >
        <div class="overlay">
            <div class="container newLayer">
                <div class="row ">
                    <div class="col-lg-9 col-md-9 head-text">
                        <h1 id="divDisp" >Mishandled an item?</h1>
                        <span >
                            <i class="fa fa-lightbulb-o " ></i>You can find your item
                        </span>
                        <span>
                            <i class="fa fa-lightbulb-o" ></i>Log item found
                        </span>

                        <span >
                            <i class="fa fa-lightbulb-o" ></i>Check the status of your item
                        </span>
                        <span >
                            <i class="fa fa-lightbulb-o" ></i>Need Administrator's help?
                        </span>

                    </div>
                    <form method ="post">
                    <div class="col-lg-3 col-md-3">
                        <div class="div-trans text-center second">
                            <span><?php echo $error; ?></span>
                            <h3>USER LOGIN</h3>
                            <div class="col-lg-12 col-md-12 col-sm-12" >
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" required="required" placeholder="User ID">
                                           </div>
                                           <div class="form-group">
                                           <input type="password"  name="password" class="form-control" required="required" placeholder="Password">
                                </div>
                                <div class="form-group">
                                   
                                <input name="submit" type="submit" class="btn btn-success btn-block btn-lg" value="submit" >
                                </div>
                            </div>

                        </div>
                    </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <!--./ HOME SECTION END -->

    <?php require_once('Footer.php'); ?>


<?php
require_once 'validation/validation.php';
session_start();

require_once('adminHeader.php');

if(!isset($_SESSION['login_user']))
{
   header("location: adminHome.php");
}




?>
<div id="about">
    <div class="overlay">
        <div class="container">
            <?php require_once('Admin.php')
            ?>
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




require_once 'Footer.php';
?>
<!--./ ABOUT SECTION END -->
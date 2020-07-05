<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../vendor/autoload.php');
use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;
use App\BABYTIKA\SEIPXXXX\User\User;

$obj= new User();

$obj->setData($_GET);
$singleUser = $obj->view();


if($singleUser->email_verified == $_GET['email_token']) {
    $obj->setData($_GET)->validTokenUpdate();
}
else{

    if($singleUser->email_verified=='Yes'){
    Message::message("
             <div class=\"alert alert-info\">
             <strong>Don't worry! </strong>This email already verified. Please login!
              </div>");
    Utility::redirect("signup.php");
   }
    else{
    Message::message("
             <div class=\"alert alert-info\">
             <strong>Sorry! </strong>This Token is Invalid. Please signup with a valid email!
              </div>");
    Utility::redirect("signup.php");
   }
}
<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../vendor/autoload.php');
use App\BABYTIKA\SEIPXXXX\User\Auth;
use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;


$auth= new Auth();
$status= $auth->setData($_POST)->is_registered();

if($status){
    $_SESSION['email']=$_POST['email'];
    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");
    
     Utility::redirect('../../Admin/index.php');

}else{
    Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Wrong information!</strong> Please try again.
                </div>");

    Utility::redirect('../Profile/signup.php');

}



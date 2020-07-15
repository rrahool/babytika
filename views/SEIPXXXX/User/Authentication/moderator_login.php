<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../vendor/autoload.php');
use App\BABYTIKA\SEIPXXXX\User\ModeratorAuth;
use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;


$m_auth= new ModeratorAuth();
$status= $m_auth->setData($_POST)->is_registered_and_active();

if($status){
    $_SESSION['email']=$_POST['email'];
    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");
    
     Utility::redirect('../../Moderator/index.php');

}else{
    Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Wrong information!</strong> Please try again.
                </div>");

    Utility::redirect('../Profile/signup_moderator.php');

}



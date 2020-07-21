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
                    <h5>Whether you've provided Wrong information, Try Again</h5>
                    or
                    <h5>Please wait for Admin Approval if your account is New!</h5>
                </div>");

    Utility::redirect('../Profile/signup_moderator.php');

}



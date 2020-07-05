<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../vendor/autoload.php');
use App\BABYTIKA\SEIPXXXX\User\User;
use App\BABYTIKA\SEIPXXXX\User\Auth;
use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;


$auth= new Auth();
$status= $auth->log_out();

session_destroy();
session_start();

Message::message("
                <div class=\"alert alert-success\">
                            <strong>Logout!</strong> You have been logged out successfully.
                </div>");
return Utility::redirect('../Profile/signup.php');
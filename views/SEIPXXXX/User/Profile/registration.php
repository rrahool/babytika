<?php
include_once('../../../../vendor/autoload.php');
use App\BABYTIKA\SEIPXXXX\User\User;
use App\BABYTIKA\SEIPXXXX\User\Auth;
use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;
$auth= new Auth();
$status= $auth->setData($_POST)->is_exist();
if($status){
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> Email has already been taken. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
}else{
    $_POST['email_token'] = md5(uniqid(rand()));
    $obj= new User();
    $obj->setData($_POST)->store();
    
    require '../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->AddAddress($_POST['email']);
    $mail->Username="rbiswas596@gmail.com";
    $mail->Password="121212";
    $mail->SetFrom('rbiswas596@gmail.com','User Management');
    $mail->AddReplyTo("rbiswas596@gmail.com","User Management");
    $mail->Subject    = "Your Account Activation Link";
    $message =  "
       Please click this link to verify your account:
       http://localhost/UserManagement/views/SEIPXXXX/User/Profile/emailverification.php?email=".$_POST['email']."&email_token=".$_POST['email_token'];



    $mail->MsgHTML($message);
    $mail->Send();
}

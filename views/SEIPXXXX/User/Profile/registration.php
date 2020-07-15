<?php
include_once('../../../../vendor/autoload.php');
use App\BABYTIKA\SEIPXXXX\User\User;
use App\BABYTIKA\SEIPXXXX\User\ModeratorAuth;
use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;
$auth= new ModeratorAuth();
$status= $auth->setData($_POST)->is_exist();
if($status){
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> This Email has already been taken. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
}else{
    $_POST['email_token'] = md5(uniqid(rand()));
    $obj= new User();
    $obj->setData($_POST)->store();

    // Utility::dd($obj);

    
    require '../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->AddAddress($_POST['email']);
    $mail->Username="motherandbabytika@gmail.com";
    $mail->Password="babyTika00@Tanjil";
    $mail->SetFrom('motherandbabytika@gmail.com','Mother & Baby Tika');
    $mail->AddReplyTo("motherandbabytika@gmail.com","Mother & Baby Tika");
    $mail->Subject    = "Your Account Activation Link";
    $message =  "
       Please click this link to verify your account:
       http://motherandbabytika.xyz/babytika/views/SEIPXXXX/User/Profile/emailverification.php?email=".$_POST['email']."&email_token=".$_POST['email_token'];



    $mail->MsgHTML($message);
    $mail->Send();
}

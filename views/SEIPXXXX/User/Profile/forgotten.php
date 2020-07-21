<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../vendor/autoload.php');
use App\BABYTIKA\SEIPXXXX\User\User;
use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;


if(isset($_POST['email'])) {
    $obj= new User();
    $obj->setData($_POST);
    $singleUser = $obj->view();

    $passwordResetLink= $singleUser->password ;

    require '../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    // $mail->IsSMTP();
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
    $mail->Subject    = "Your Password Reset Link";
    $message =  "Please click this link to reset your password: 
       http://localhost/babytika/views/SEIPXXXX/User/Profile/resetpassword.php?email=".$_POST['email']."&code=".$singleUser->password;
    $mail->MsgHTML($message);
    if($mail->Send()){

        Message::message("
                <div class=\"alert alert-success\">
                            <strong>Email Sent!</strong> Please check your email for password reset link.
                </div>");
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Need help with your password?</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="../../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../../../resource/assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../../../../resource/assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../../resource/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../../resource/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../../resource/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../../resource/assets/ico/apple-touch-icon-57-precomposed.png">

</head>
<body>
<!-- Top content -->
<div class="top-content">
    <div class="container" >
        <table>
            <tr>
                <td width='230' >

                <td width='600' height="50" >


                    <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

                        <div  id="message" class="form button"   style="font-size: smaller  " >
                            <center>
                                <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                                    echo "&nbsp;".Message::message();
                                }
                                Message::message(NULL);
                                ?></center>
                        </div>
                    <?php } ?>
                </td>
            </tr>
        </table>
        <br><br>
        <div class="row">
                <a href="../../../../index.php" class="btn btn-default">Choose Login Panel</a>
        </div>
        <div class="row">
                <a href="signup_moderator.php" class="btn">
                    <h4>Go Back</h4>
                </a>
        </div>
        <div class="row" >
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Need help with your password?</h3>
                            <p>Please provide here your varified email</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
                            </div>

                            <button type="submit" class="btn">Email Me The Password Reset Link</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>

    </div>
</div>


<!-- Javascript -->
<script src="../../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../../resource/assets/js/placeholder.js"></script>
<![endif]-->

</body>

<script>
    $('.alert').slideDown("slow").delay(10000).slideUp("slow");
</script>

</html>


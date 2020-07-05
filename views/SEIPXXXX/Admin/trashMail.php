<?php

######## PLEASE PROVIDE Your Gmail Info. -  (ALLOW LESS SECURE APP ON GMAIL SETTING ) ########

$yourGmailAddress = 'teamerrorpoint@gmail.com';
$yourGmailPassword = 'bitmPHPB57';

##############################################################################################

session_start();
include_once('../../../vendor/autoload.php');
require '../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

use App\BITM\SEIPXXXX\Admin\Admin;
use App\BITM\SEIPXXXX\Message\Message;

$bookTitle = new Admin();

if(isset($_REQUEST['list'])) {
    $list = 1;
    $recordSet = $bookTitle->trashList();

}
else {
    $list= 0;
    $bookTitle->setData($_REQUEST);
    $singleItem = $bookTitle->view();
}

?>



<!DOCTYPE html>

<head>
    <title>Email This To A Friend</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/w3css/4/w3.css">
    <script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../resource/assets/bootstrap/js/jquery.js"></script>


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>tinymce.init({
            selector: 'textarea',  // change this value according to your HTML

            menu: {
                table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
                tools: {title: 'Tools', items: 'spellchecker code'}

            }
        });


    </script>


</head>
<body>


<!-- main / large navbar -->
    <div class="container">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-7">
                <div class="w3-bar w3-border w3-light-grey">
                    <a href="create.php" class="w3-bar-item w3-button" style="text-decoration: none">Add Book</a>
                    <a href="index.php" class="w3-bar-item w3-button" style="text-decoration: none">Book List</a>
                    <a href="trashed.php" class="w3-bar-item w3-button" style="text-decoration: none">Trash List</a>
                    <div class="w3-dropdown-hover">
                        <button class="w3-button">More <i class="fa fa-caret-down"></i></button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="#" class="w3-bar-item w3-button">Link 1</a>
                            <a href="#" class="w3-bar-item w3-button">Link 2</a>
                            <a href="#" class="w3-bar-item w3-button">Link 3</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->




<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
    <div class="col-md-10">
        <h2>Email This To A Friend</h2>
        <form  role="form" method="post" action="trashMail.php<?php if(isset($_REQUEST['id'])) echo "?id=".$_REQUEST['id']; else echo "?list=1";?>">
            <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text"  name="name"  class="form-control" id="name" placeholder="Enter name of the recipient ">
                <label for="Email">Email Address:</label>
                <input type="text"  name="email"  class="form-control" id="email" placeholder="Enter recipient email address here...">

                <label for="Subject">Subject:</label>
                <input type="text"  name="subject"  class="form-control" id="subject" value="<?php if($list){echo "List of books recommendation";} else {echo "A single book recommendation";} ?>">
                <label for="body">Body:</label>
            <textarea   rows="8" cols="160"  name="body" >
<?php
if($list){

    $trs="";
    $sl=0;

    printf("<h3>Trashed Items</h3>");
    printf("<table><tr> <td width='50'><strong>Serial</strong></td><td width='50'><strong>ID</strong></td><td width='250'><strong>Book Title</strong></td><td width='250'><strong>Author Name</strong></td></tr>");

    foreach($recordSet as $row) {

        $id = $row->id;
        $bookName = $row->book_title;
        $authorName = $row->author_name;

        $sl++;
        printf("<tr><td width='50'>%d</td><td width='50'>%d</td><td width='450'>%s</td><td width='550'>%s</td></tr>",$sl,$id,$bookName,$authorName);


    }
    printf("</table>");

}
else
{
    printf("Trashed Item: [<strong>Book ID: </strong>%s, <strong>Book Name: </strong>%s, <strong>Author Name: </strong>%s]",$singleItem->id,$singleItem->book_title,$singleItem->author_name);

}
?>
            </textarea>

            </div>

            <input class="btn-lg btn-primary" type="submit" value="Send Email">

        </form>


        <?php
        if(isset($_REQUEST['email'])&&isset($_REQUEST['subject'])) {

            date_default_timezone_set('Etc/UTC');

            //Create a new PHPMailer instance
            $mail = new PHPMailer;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            //Tell PHPMailer to use SMTP
            $mail->isSMTP();
            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 0;
            //Ask for HTML-friendly debug output
            $mail->Debugoutput = 'html';
            //Set the hostname of the mail server
            $mail->Host = 'smtp.gmail.com';
            // use
            // $mail->Host = gethostbyname('smtp.gmail.com');
            // if your network does not support SMTP over IPv6
            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587; //587
            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls'; //tls
            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;
            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = $yourGmailAddress;
            //Password to use for SMTP authentication
            $mail->Password = $yourGmailPassword;
            //Set who the message is to be sent from
            $mail->setFrom($yourGmailAddress, 'BITM PHP');
            //Set an alternative reply-to address
            $mail->addReplyTo($yourGmailAddress, 'BITM PHP');
            //Set who the message is to be sent to

            //echo $_REQUEST['email']; die();

            $mail->addAddress($_REQUEST['email'], $_REQUEST['name']);
            //Set the subject line
            $mail->Subject = $_REQUEST['subject'];
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
            //Replace the plain text body with one created manually
            $mail->AltBody = 'This is a plain-text message body';

            $mail->Body = $_REQUEST['body'];


            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                Message::message("<strong>Success!</strong> Email has been sent successfully.");

                ?>
                <script type="text/javascript">
                    window.location.href = 'trashed.php';
                </script>
                <?php


            }

        }


        ?>
    </div>
    </div>




</div>
</body>


</html>
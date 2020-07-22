<?php 
require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

if (isset($_POST['submit'])) {
  $final_value = $_POST['final_value'];
  $last_date = $_POST['last_date'];
  $email = $_POST['email'];
  $usercell = $_POST['usercell'];

  $subject = "Vaccine Alert - Mother";
  $msg = "Last date of your ".$final_value." vaccine is ".$last_date;
  // Content-Type helps email client to parse file as HTML 
  // therefore retaining styles
  $header = "From:motherandbabytika@gmail.com \r\n";
  $header .= "MIME-Version: 1.0\r\n";
  $header .= "Content-type: text/html\r\n";
  $message = "<html>
  <head>
  	<title>New message from website contact form</title>
  </head>
  <body>
  	<h1>" . $subject . "</h1>
  	<p>".$msg."</p>
  </body>
  </html>";
  if (mail($email, $subject, $message, $header)) {
    Message::message("Success! Email Alert has been sent.");
    Utility::redirect("mother_taken_vaccine.php?id=$usercell");
  }else{
    echo "Failed to send email. Please try again later. <br/>";
    echo $email, $subject, $message, $header;
    Message::message("Email Alert not sent.");
    Utility::redirect("mother_taken_vaccine.php?id=$usercell");
  }
}
?>
<?php
require_once ("../../../vendor/autoload.php");
use App\BITM\SEIPXXXX\Utility\Utility;
use App\BITM\SEIPXXXX\BookTitle\BookTitle;



$obj = new BookTitle();

$IDs = $_POST['selectedIDs'];

foreach($IDs as $id) {

    $_GET['id'] = $id;
    $obj->setData($_GET);
    $obj->recover();
}

Utility::redirect("index.php")
?>


<?php
require_once ("../../../vendor/autoload.php");
use App\BABYTIKA\SEIPXXXX\Utility\Utility;
use App\BABYTIKA\SEIPXXXX\Admin\Admin;


$obj = new Admin();

$IDs = $_POST['selectedIDs'];

foreach($IDs as $id) {
    $_GET['id'] = $id;
    $obj->setData($_GET);
    $obj->trash();
}

Utility::redirect("trashed.php")
?>
<?php

if(isset($_SERVER['HTTP_REFERER']))
    $path = $_SERVER['HTTP_REFERER'];

require_once "../../../vendor/autoload.php";

use App\BITM\SEIPXXXX\Admin\Admin;
use App\BITM\SEIPXXXX\Utility\Utility;


$obj = new Admin();

$obj->setData($_GET);

$obj->delete();

Utility::redirect($path);
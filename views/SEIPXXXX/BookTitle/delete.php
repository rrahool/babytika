<?php

if(isset($_SERVER['HTTP_REFERER']))
    $path = $_SERVER['HTTP_REFERER'];

require_once "../../../vendor/autoload.php";

use App\BITM\SEIPXXXX\BookTitle\BookTitle;
use App\BITM\SEIPXXXX\Utility\Utility;


$obj = new BookTitle();

$obj->setData($_GET);

$obj->delete();

Utility::redirect($path);
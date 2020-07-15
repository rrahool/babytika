<?php

if(isset($_SERVER['HTTP_REFERER']))
    $path = $_SERVER['HTTP_REFERER'];

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Moderator\Moderator;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;


$obj = new Moderator();

$obj->setData($_GET);

$obj->delete();

Utility::redirect($path);
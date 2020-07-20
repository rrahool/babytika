<?php

require_once "../../../vendor/autoload.php";

if(isset($_SERVER['HTTP_REFERER']))
    $path = $_SERVER['HTTP_REFERER'];

use App\BABYTIKA\SEIPXXXX\Baby\Baby;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

$objBaby = new Baby();

$objBaby->setData($_POST);

// Utility::dd($objBaby);

$objBaby->store_baby_taken_vaccine();

Utility::redirect("$path");
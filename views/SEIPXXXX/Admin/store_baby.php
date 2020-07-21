<?php

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Baby\Baby;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

$objBaby = new Baby();

$objBaby->setData($_POST);

// Utility::dd($objBaby);

$objBaby->store();


Utility::redirect("index_baby.php");
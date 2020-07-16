<?php

require_once "../../../vendor/autoload.php";

if(isset($_SERVER['HTTP_REFERER']))
    $path = $_SERVER['HTTP_REFERER'];

use App\BABYTIKA\SEIPXXXX\Mother\Mother;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

$objMother = new Mother();

$objMother->setData($_POST);

$objMother->store_mother_taken_vaccine();

Utility::redirect("$path");
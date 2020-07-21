<?php

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Mother\Mother;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

$objMother = new Mother();

$objMother->setData($_POST);

// Utility::dd($objMother);

$objMother->store();


Utility::redirect("index_mother.php");
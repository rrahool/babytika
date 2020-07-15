<?php

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Moderator\Moderator;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

$objModerator = new Moderator();

$objModerator->setData($_POST);


$objModerator->store();

// Utility::dd($objModerator);

Utility::redirect("index_moderator.php");
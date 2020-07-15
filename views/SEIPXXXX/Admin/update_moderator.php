<?php

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Moderator\Moderator;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

$obj = new Moderator();

$obj->setData($_POST);

$obj->update();

Utility::redirect("index_moderator.php");
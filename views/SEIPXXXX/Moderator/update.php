<?php

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Admin\Admin;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

$obj = new Admin();

$obj->setData($_POST);

$obj->update();

Utility::redirect("index.php");
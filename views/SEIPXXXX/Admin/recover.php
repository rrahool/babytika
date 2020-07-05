<?php

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Admin\Admin;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

$obj = new Admin();

$obj->setData($_GET);

$obj->recover();

Utility::redirect("index.php");
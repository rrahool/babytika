<?php

require_once "../../../vendor/autoload.php";

use App\BITM\SEIPXXXX\Admin\Admin;
use App\BITM\SEIPXXXX\Utility\Utility;

$obj = new Admin();

$obj->setData($_GET);

$obj->recover();

Utility::redirect("index.php");
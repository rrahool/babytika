<?php

require_once "../../../vendor/autoload.php";

use App\BITM\SEIPXXXX\Admin\Admin;
use App\BITM\SEIPXXXX\Utility\Utility;

$obj = new Admin();

$obj->setData($_GET);

$obj->trash();

Utility::redirect("trashed.php");
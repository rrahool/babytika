<?php

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Admin\Admin;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

$objAdmin = new Admin();

$objAdmin->setData($_POST);

$objAdmin->store();


Utility::redirect("index.php");
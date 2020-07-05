<?php

require_once "../../../vendor/autoload.php";

use App\BITM\SEIPXXXX\Admin\Admin;
use App\BITM\SEIPXXXX\Utility\Utility;

$objAdmin = new Admin();

$objAdmin->setData($_POST);

$objAdmin->store();


Utility::redirect("index.php");
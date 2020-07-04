<?php

require_once "../../../vendor/autoload.php";

use App\BITM\SEIPXXXX\BookTitle\BookTitle;
use App\BITM\SEIPXXXX\Utility\Utility;

$obj = new BookTitle();

$obj->setData($_GET);

$obj->recover();

Utility::redirect("index.php");
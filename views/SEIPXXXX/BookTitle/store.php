<?php

require_once "../../../vendor/autoload.php";

use App\BITM\SEIPXXXX\BookTitle\BookTitle;
use App\BITM\SEIPXXXX\Utility\Utility;

$objBookTitle = new BookTitle();

$objBookTitle->setData($_POST);

$objBookTitle->store();

Utility::redirect("create.php");
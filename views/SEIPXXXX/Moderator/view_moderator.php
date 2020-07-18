<?php

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Moderator\Moderator;
use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

if (!isset($_GET['id'])) {

    Message::message("You can't visit view.php without id (ex: view.php?id=23)");
    Utility::redirect("index.php");
}

$obj = new Moderator();

$obj->setData($_GET);

$singleData = $obj->view();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Moderator Info - Single</title>
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/w3css/4/w3.css">
    <script src="../../../resource/assets/bootstrap/js/jquery.js"></script>
    <script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../resource/assets/font-awesome-4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="container">
        <div class="col-md-12">
            <div class="w3-bar w3-border w3-light-grey">
                <a href="create.php" class="w3-bar-item w3-button" style="text-decoration: none">Create Admin</a>
                <a href="create_moderator.php" class="w3-bar-item w3-button" style="text-decoration: none">Create Moderator</a>
                
                <div class="w3-dropdown-hover">
                    <button class="w3-button" style="text-decoration: none">
                        All Data List <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                        <a href="index.php" class="w3-bar-item w3-button" style="text-decoration: none">All Admin Data</a>
                        <a href="index_moderator.php" class="w3-bar-item w3-button" style="text-decoration: none">All Moderator Data</a>
                        <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">All User Data</a>
                    </div>
                </div>
                <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">Registration Request</a>
                <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">Update Profile</a>
                <a href="trashed.php" class="w3-bar-item w3-button" style="text-decoration: none; display: none;">Trash List</a>
                <span style="text-align: right">
                    <a href="../User/Authentication/logout.php" class="w3-bar-item w3-button" style="text-decoration: none"> Logout </a>
                </span>
            </div>
        </div>
    </div>
    <div class="w3-container">

        <div class="w3-row">
                    
            <div style="min-height: 100px;"></div>
            <div class="w3-container w3-quarter"></div>
            <div class="w3-card-4 w3-half">

                <header class="w3-container w3-blue">
                    <h2>Moderator Profile Info</h2>
                </header>


                <?php
                echo "
                        <div class='col-md-12' style='margin-top: 5px; text-align: right;'>
                            <a href='edit_moderator.php?id=$singleData->id' type='button' class='btn btn-primary'>Edit Info</a>
                        </div>
                        <ul class='w3-ul w3-card-4'>
                            <li class='w3-padding-64'>
                                <p>Photo</p>
                                <img src='../../../images/m1.jpg' class='w3-left w3-round w3-margin-right' style='width:160px; height: 160px'>
                                <span class='w3-label-lg w3-red' style='padding: 5px'>ID - $singleData->id</span><br>
                                <span class='w3-xxlarge'>$singleData->first_name</span><br>
                                <p class=''><b>Email: </b>$singleData->email</p>
                                <p class=''><b>Status: </b>$singleData->status</p>
                            </li>
                        </ul>
                    ";
                ?>

            </div>
            <div class="w3-container w3-quarter"></div>
        </div>
    </div>
    <!--<div class="w3-container">
        <div class="w3-row">
            <div class="col-sm-6">
                <div class="w3-panel w3-blue w3-card-4">
                    <h2> Single Book Information - Book Title </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="w3-table-all w3-hoverable">
                    <?php
                    //                        echo "
                    //                                <tr>
                    //                                    <td>ID: </td>
                    //                                    <td>$singleData->id</td>
                    //                                </tr>
                    //                                <tr>
                    //                                    <td>Book Title: </td>
                    //                                    <td>$singleData->admin_name</td>
                    //                                </tr>
                    //                                <tr>
                    //                                    <td>Author: </td>
                    //                                    <td>$singleData->admin_email</td>
                    //                                </tr>
                    //";
                    ?>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>-->


</body>

</html>
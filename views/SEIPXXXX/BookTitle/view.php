<?php

    require_once "../../../vendor/autoload.php";

    use App\BITM\SEIPXXXX\BookTitle\BookTitle;
    use App\BITM\SEIPXXXX\Message\Message;
    use App\BITM\SEIPXXXX\Utility\Utility;

    if(!isset($_GET['id'])) {

        Message::message("You can't visit view.php without id (ex: view.php?id=23)");
        Utility::redirect("index.php");
    }

    $obj = new BookTitle();

    $obj->setData($_GET);

    $singleData = $obj->view();

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Book List - Single</title>
        <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../resource/assets/w3css/4/w3.css">
        <script src="../../../resource/assets/bootstrap/js/jquery.js"></script>
        <script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>

    </head>
    <body>


    <div class="w3-container">
        <div class="w3-row">
            <div style="min-height: 100px;"></div>
            <div class="w3-container w3-quarter"></div>

            <div class="w3-card-4 w3-half">

                <header class="w3-container w3-blue">
                    <h2>Single Book Information - Book Title</h2>
                </header>

                <?php
                    echo "
                        <ul class='w3-ul w3-card-4'>
                            <li class='w3-padding-64'>
                                <img src='../../../images/shatkahon.jpg' class='w3-left w3-round w3-margin-right' style='width:120px; height: 150px'>
                                <span class='w3-badge w3-red'>$singleData->id</span><br>
                                <span class='w3-xxlarge'>$singleData->book_title</span><br>
                                <span class='w3-large'>$singleData->author_name</span>
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
//                                    <td>$singleData->book_title</td>
//                                </tr>
//                                <tr>
//                                    <td>Author: </td>
//                                    <td>$singleData->author_name</td>
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

<?php

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Mother\Mother;
use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

if (!isset($_GET['id'])) {

    Message::message("You can't visit view.php without id (ex: view.php?id=23)");
    Utility::redirect("index.php");
}

$obj = new Mother();

$obj->setData($_GET);

$usercell = $_GET['id'];

$singleData = $obj->taken_vaccine();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Taken Vaccine Info</title>
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/w3css/4/w3.css">
    <script src="../../../resource/assets/bootstrap/js/jquery.js"></script>
    <script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../resource/assets/font-awesome-4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="w3-bar w3-border w3-light-grey">
                    <a href="create_mother.php" class="w3-bar-item w3-button" style="text-decoration: none">Create Mother Account</a>
                    <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">Create Baby Account</a>
                    <div class="w3-dropdown-hover">
                        <button class="w3-button w3-black" style="text-decoration: none">
                            All Data List <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="index.php" class="w3-bar-item w3-button w3-green" style="text-decoration: none"> Mother</a>
                            <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">Baby</a>
                        </div>
                    </div>
                    <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">Update Profile</a>
                    <a href="trashed.php" class="w3-bar-item w3-button" style="text-decoration: none; display: none;">Trash List</a>
                    <span style="text-align: right">
                        <a href="../User/Authentication/moderator_logout.php" class="w3-bar-item w3-button" style="text-decoration: none"> Logout </a>
                    </span>

                </div>
            </div>
        </div>
    </div>
    <div class="w3-container">

        <div class="w3-row">
            <div style="min-height: 100px;"></div>
            <div class="w3-container w3-quarter"></div>

            <div class="w3-card-4 w3-half">

                <header class="w3-container w3-blue">
                    <h2>Mother Taken Vaccine Info</h2>
                </header>

                <?php
                foreach ($singleData as $vaccine) {
                    if ($usercell == $vaccine->cell) {
                        echo "
                            <div class='col-md-12' style='margin-top: 5px; text-align: right;'>
                                <a href='edit.php?id=$vaccine->id' type='button' class='btn btn-primary'>Edit Info</a>
                            </div>
                            <ul class='w3-ul w3-card-4'>
                                <li class='w3-padding-64'>
                                    <span class='w3-label-lg w3-red' style='padding: 5px'>ID - $vaccine->id</span><br>";
                        if ($vaccine->numbers == '2') {


                            $values = $vaccine->number;
                            $final_value = $values;
                            $final_date = $vaccine->ndate;
                            $v = intval($values);
                            $values = intval($v);
                            // echo $values;
                            $values = $values - 1;
                            $value = strval($values);
                            echo "<span class='w3-xxlarge'>Vaccine: TT-$value</span><br>";
                            echo "<span class='w3-large'>Taken Date: $vaccine->pdate </span><br> ";
                        } else {
                            echo "<span class='w3-xxlarge'>Vaccine: TT-$vaccine->number</span><br>";
                            echo "<span class='w3-large'>Taken Date: $vaccine->ndate</span><br>";
                        }
                        echo "<span class='w3-xlarge'>Numbers-$vaccine->numbers</span><br>
                                </li>
                            </ul>
                        ";
                        
                    }
                }

                if ($usercell == $vaccine->cell) {
                    if($final_value != '6'){
                        echo "
                            <div class='col-md-12' style='margin-top: 5px; text-align: right;'>
                                    <a href='edit.php?id=$vaccine->id' type='button' class='btn btn-primary'>Edit Info</a>
                            </div>
                            <ul class='w3-ul w3-card-4'>
                                <li class='w3-padding-64'>
                                    <span class='w3-label-lg w3-red' style='padding: 5px'>ID - $vaccine->id</span><br>
                                    <span class='w3-xxlarge'>Vaccine: TT-$final_value</span><br>
                                    <span class='w3-large'>Taken Date: $final_date</span><br><br>
                                    <span class='w3-large'>
                                        <form class='form-horizontal' action='store.php' method='post'>
                                            <div class='form-group'>
                                                <label class='col-sm-2 w3-text-green' for='gender'>Taken: </label>
                                                <div class='col-sm-10'>
                                                    <span style='margin-right: 2rem;'>
                                                        <input type='radio' name='gender' value='Yes'> Yes
                                                        <input type='radio' name='gender' value='No'> No 
                                                    </span>
                                                    <button type='submit' class='btn btn-default'>Submit</button>
                                                </div>
                                            </div>                                        
                                        </form>
                                    </span>
                                    
                                </li>
                            </ul>
                        ";
                    } else {
                        echo "<h2>All vaccine have been taken </h2>";
                    }
                }
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
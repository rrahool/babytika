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

$msg = Message::message();

$usercell = $_GET['id'];

$singleData = $obj->mother_taken_vaccine($usercell);

// Utility::dd($singleData);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Taken Vaccine Info</title>

    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/w3css/4/w3.css">
    <script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../resource/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../resource/assets/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- required for search, block3 of 5 start -->

    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/jquery-ui.css">
    <script src="../../../resource/assets/bootstrap/js/jquery.js"></script>
    <script src="../../../resource/assets/bootstrap/js/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- required for search, block3 of 5 end -->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="w3-bar w3-border w3-light-grey">
                    <a href="create.php" class="w3-bar-item w3-button" style="text-decoration: none">Create Admin</a>
                    <a href="create_moderator.php" class="w3-bar-item w3-button" style="text-decoration: none">Create Moderator</a>
                    <a href="create_mother.php" class="w3-bar-item w3-button" style="text-decoration: none">Create Mother Account</a>
                    <a href="create_baby.php" class="w3-bar-item w3-button" style="text-decoration: none">Create Baby Account</a>
                    <div class="w3-dropdown-hover">
                        <button class="w3-button w3-black" style="text-decoration: none">
                            All Data List <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                                <a href="index.php" class="w3-bar-item w3-button" style="text-decoration: none">Admin</a>
                                <a href="index_moderator.php" class="w3-bar-item w3-button" style="text-decoration: none">Moderator</a>
                                <a href="index_mother.php" class="w3-bar-item w3-button" style="text-decoration: none">Mother</a>
                                <a href="index_baby.php" class="w3-bar-item w3-button" style="text-decoration: none">Baby</a>
                            </div>
                        </div>
                    </div>
                    <!-- <a href="#" class="w3-bar-item w3-button" style="text-decoration: none;">Update Profile</a> -->
                    <a href="trashed.php" class="w3-bar-item w3-button" style="text-decoration: none; display: none;">Trash List</a>
                    <span style="text-align: right">
                        <a href="../User/Authentication/logout.php" class="w3-bar-item w3-button" style="text-decoration: none"> Logout </a>
                    </span>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php
                echo "<div style='background-color: lightskyblue; border-radius: 5%; font-family: Comic Sans MS;'>
                                <div id='message' class='text-center'>
                                  <strong> $msg </strong>
                                </div>
                           </div>";
                ?>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="w3-container">

        <div class="w3-row">
            <div style="min-height: 100px;"></div>
            <div class="w3-container w3-quarter"></div>

            <div class="w3-card-4 w3-half" style='margin-bottom: 200px; padding-bottom: 30px;'>

                <header class="w3-container w3-blue">
                    <h2>Mother Taken Vaccine Info</h2>
                </header>

                <?php
                if ($singleData == null) {
                    $final_status = 'x';
                } else {
                    foreach ($singleData as $vaccine) {
                        if ($usercell == $vaccine->cell) {

                            echo "
                                <div class='row' style='margin-top: 10px;'>
                                <div class='col-sm-1'></div>
                                <div class='col-sm-10'>
                                    <table class='w3-table'>
                                        <thead>
                                            <tr class='text-center'>";
                            if ($vaccine->numbers == '2') {

                                $values = $vaccine->number;
                                $status = $vaccine->status;

                                $final_value = $values;
                                $final_status = $status;
                                $final_date = $vaccine->ndate;

                                $v = intval($values);
                                $values = intval($v);

                                $values = $values - 1;
                                $value = strval($values);
                                echo "
                                                        <th width='30%'>Vaccine</th>
                                                        <td width='10%'>:</td>
                                                        <td>TT-$value</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Taken Date</th>
                                                        <td>:</td>
                                                        <td>$vaccine->pdate</td>
                                                ";
                            } else if ($vaccine->numbers == '1') {
                                $values = $vaccine->number;
                                $status = $vaccine->status;

                                $final_value = $values;
                                $final_status = $status;
                                $final_date = $vaccine->ndate;

                                $v = intval($values);
                                $values = intval($v);
                                $values = $values - 1;
                                $value = strval($values);
                            } else {
                                echo "
                                                    <th width='30%'>Vaccine</th>
                                                    <td width='10%'>:</td>
                                                    <td>TT-$vaccine->number</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Taken Date</th>
                                                    <td>:</td>
                                                    <td>$vaccine->ndate</td>
                                                ";
                            }

                            echo "</tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class='col-sm-1'></div>
                            </div>
                            ";
                        }
                    }
                }


                if ($final_status == 'x') {
                    echo "
                        <div class='row' style='margin: 20px;'>
                            <h4>No Vaccine Schedule Found.</h4>
                        </div>
                    ";
                } else {
                    //  if ($usercell == $vaccine->cell) {
                    if ($final_status == '0') {
                        if ($final_value != '6') {
                            echo "
                                <div class='row' style='margin-top: 10px;'>
                                    <div class='col-sm-1'></div>
                                    <div class='col-sm-10'>
                                    <hr>
                                        <table class='w3-table'>
                                            <thead>
                                                    <tr>
                                                        <td>
                                                            <span class='w3-label-lg w3-red' style='padding: 5px'>Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr class='text-center'> 
                                                        <th width='30%'>Vaccine</th>
                                                        <td width='10%'>:</td>
                                                        <td>TT-$final_value</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Schedule Date</th>
                                                        <td>:</td>
                                                        <td>$final_date</td>
                                                        <td>
                                                            <form class='form-horizontal' action='store_mother_taken_vaccine.php' method='post'>
                                                                <div class='form-group' style='display: none;'>
                                                                    <input type='hidden' class='form-control' id='number' name='number' value='$final_value'>
                                                                    <input type='hidden' class='form-control' id='M_Cell' name='M_Cell' value='$usercell'>
                                                                </div> 
            
                                                                <div class='form-group'>
                                                                    <label class='col-sm-4 w3-text-green' for='taken'>Taken: </label>
                                                                    <div class='col-sm-8'>
                                                                        <input type='radio' name='taken' value='1' required> Yes
                                                                    </div>
                                                                </div>
                                                                <button type='submit' name='submit' class='btn btn-default' onclick='return confirm_mobile()'>Done</button>
                                                                
            
                                                            </form>
                                                        </td>
                                                        
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class='col-sm-1'></div>
                                </div>
                                ";
                        } else {
                            echo "
                                <div class='row' style='margin: 20px;'>
                                    <h2>All vaccines have been taken </h2>
                                </div>
                            ";
                        }
                    } else {
                    }
                }
                // }
                ?>
            </div>
            <div class="w3-container w3-quarter"></div>
        </div>
    </div>
    <!-- <div class="w3-container">  
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="w3-table-all w3-hoverable">
                    <?php
                    echo "
                                                   <tr>
                                                       <td>ID: </td>
                                                       <td>ABCD</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Book Title: </td>
                                                       <td>ABCD</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Author: </td>
                                                       <td>ABCD</td>
                                                   </tr>
                    ";
                    ?>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div> -->

    <!-- <script>
        $('form').submit(function() {
            $(this).find('button[type=submit]').prop('disabled', true);
            return false;
        });
    </script> -->


    <script type="text/javascript">
        function confirm_mobile() {
            return confirm('User need to confirm from Mobile Apps...');
        }
    </script>

    <script>
        jQuery(

            function($) {
                $('#message').fadeOut(550);
                $('#message').fadeIn(550);
                $('#message').fadeOut(550);
                $('#message').fadeIn(550);
                $('#message').fadeOut(550);
                $('#message').fadeIn(550);
                $('#message').fadeOut(550);
            }
        )
    </script>
    
    <script>
        $('.alert').slideDown("slow").delay(2000).slideUp("slow");
    </script>


</body>





</html>
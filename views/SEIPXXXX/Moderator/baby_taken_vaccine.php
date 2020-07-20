<?php

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Baby\Baby;
use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

if (!isset($_GET['id'])) {

    Message::message("You can't visit view.php without id (ex: view.php?id=23)");
    Utility::redirect("index.php");
}

$obj = new Baby();

$obj->setData($_GET);

$usercell = $_GET['id'];

$singleData = $obj->baby_taken_vaccine();

// Utility::dd($singleData);

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
                    <a href="create_baby.php" class="w3-bar-item w3-button" style="text-decoration: none">Create Baby Account</a>
                    <div class="w3-dropdown-hover">
                        <button class="w3-button w3-black" style="text-decoration: none">
                            All Data List <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="index.php" class="w3-bar-item w3-button" style="text-decoration: none"> Mother</a>
                            <a href="index_baby.php" class="w3-bar-item w3-button" style="text-decoration: none">Baby</a>
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

            <div class="w3-card-4 w3-half" style='margin-bottom: 200px;'>

                <header class="w3-container w3-blue">
                    <h2>Baby Taken Vaccine Info</h2>
                </header>

                <?php
                // echo $vaccine->status;
                foreach ($singleData as $vaccine) {
                    if ($usercell == $vaccine->cell) {
                        echo "
                            <div class='col-md-12' style='margin-top: 5px; text-align: right;'>
                                
                            </div>
                            <ul class='w3-ul w3-card-4'>
                                <li class='w3-padding-64'>";
                                    if ($vaccine->numbers == '2') {

                                        $values = $vaccine->number;
                                        $status = $vaccine->status;

                                        
                                        $final_value = $values;
                                        $final_status = $status;
                                        $final_date = $vaccine->ndate;
                                        
                                        $final_id = $vaccine->id;
                                        $final_cell = $vaccine->cell;
                                        $final_vaccine = $vaccine->vaccine;
                                        
                                        $v = intval($values);
                                        $values = intval($v);

                                        $values = $values - 1;
                                        $value = strval($values);
                                        echo "<span class='w3-xlarge'>Vaccine: $final_vaccine</span><br><br>";
                                        echo "<span class='w3-large'>Taken Date: $vaccine->pdate </span><br> ";
                                    } else if ($vaccine->numbers == '1') {
                                        $values = $vaccine->number;
                                        $status = $vaccine->status;

                                        $final_value = $values;
                                        $final_status = $status;
                                        $final_date = $vaccine->ndate;

                                        $final_id = $vaccine->id;
                                        $final_cell = $vaccine->cell;
                                        $final_vaccine = $vaccine->vaccine;
                                        
                                        $v = intval($values);
                                        $values = intval($v);
                                        $values = $values - 1;
                                        $value = strval($values);
                                    } else {
                                        // $final_vaccine = $vaccines;
                                        // echo $final_vaccine;

                                        echo "<span class='w3-xlarge'>Vaccine: $vaccine->vaccine</span><br><br>";
                                        echo "<span class='w3-large'>Taken Date: $vaccine->ndate</span><br>";
                                    }
                        echo "</li>
                            </ul>
                        ";
                    }
                }          


                //  if ($usercell == $vaccine->cell) {
                    if($final_status == '0') {
                        if ($final_value != '6') {
                            
                            echo "
                                <div class='col-md-12' style='margin-top: 5px; text-align: right; display: none;'>
                                        <a href='edit.php?id=$vaccine->id' type='button' class='btn btn-primary'>Edit Info</a>
                                </div>
                                <ul class='w3-ul w3-card-4'>
                                    <li class='w3-padding-64'>
                                        <span class='w3-label-lg w3-red' style='padding: 5px;'>Pending</span><br>
                                        <span class='w3-xxlarge'>Vaccine: $final_vaccine</span><br>
                                        <div class='col-md-5'>
                                            <span class='w3-large'>Schedule Date: $final_date</span><br><br>
                                        </div>
                                        <div class='col-md-7'>
                                            <span class='w3-large'>
                                                    <form class='form-horizontal' action='store_baby_taken_vaccine.php' method='post'>
    
                                                        <input type='hidden' class='form-control' id='number' name='number' value='$final_value'>
                                                        <input type='hidden' class='form-control' id='BF_Cell' name='BF_Cell' value='$usercell'>
    
                                                        <div class='form-group'>
                                                            <label class='col-sm-3 w3-text-green' for='taken'>Taken: </label>
                                                            <div class='col-sm-9'>
                                                                <span>
                                                                    <input type='radio' name='taken' value='1' required> Yes
                                                                    <input type='radio' name='taken' value='0' required> No 
                                                                </span>
                                                                <button type='submit' name='submit' class='btn btn-default' onclick='return confirm_mobile()'>Done</button>
                                                            </div>
                                                        </div>  
    
                                                    </form>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            ";
                        } else {
                            echo "<h2>All vaccines have been taken </h2>";
                        }
                    } else {

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


</body>





</html>
<?php

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Message\Message;

$msg = Message::message();

echo "<div> <div id='message'> $msg </div> </div>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Baby Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../resource/assets/w3css/4/w3.css">
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>


    <!-- specifically used for Datepicker, block1 of 2 start -->

    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/jquery-ui.css">
    <script src="../../../resource/assets/bootstrap/js/jquery-1.12.4.js"></script>
    <script src="../../../resource/assets/bootstrap/js/jquery-ui.js"></script>

    <!-- specifically used for Datepicker, block1 of 2 end -->

    <link rel="stylesheet" href="../../../resource/assets/font-awesome-4.7.0/css/font-awesome.min.css">

   
    <style>
        div.col-lg-6 {
            background-color: #FEF4FE;
            border-radius: 10px;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="w3-bar w3-border w3-light-grey">
                    <a href="create_mother.php" class="w3-bar-item w3-button" style="text-decoration: none">Create Mother Account</a>
                    <a href="create_baby.php" class="w3-bar-item w3-button w3-black" style="text-decoration: none">Create Baby Account</a>
                    <div class="w3-dropdown-hover">
                        <button class="w3-button" style="text-decoration: none">
                            All Data List <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="index.php" class="w3-bar-item w3-button" style="text-decoration: none"> Mother</a>
                            <a href="index_baby.php" class="w3-bar-item w3-button" style="text-decoration: none">Baby</a>
                        </div>
                    </div>
                    <!-- <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">Update Profile</a> -->
                    <a href="trashed.php" class="w3-bar-item w3-button" style="text-decoration: none; display: none;">Trash List</a>
                    <span style="text-align: right">
                        <a href="../User/Authentication/moderator_logout.php" class="w3-bar-item w3-button" style="text-decoration: none"> Logout </a>
                    </span>

                </div>
            </div>
        </div>

    </div>

    <div class="container" style="margin-top: 100px;">
        <div class="col-lg-3"></div>
        <div class="col-lg-6" style="padding-left: 40px; padding-right: 40px;">
            <h2>New Baby Account</h2>
            <form class="form-horizontal" action="store_baby.php" method="post">

                <div class="form-group">
                    <label class="control-label col-sm-4" for="B_Name">Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="B_Name" placeholder="Enter Name" name="B_Name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="BM_Email">Mother's Email:</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="BM_Email" placeholder="Enter Mother's Email here" name="BM_Email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="B_User">Mother's Cell:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="B_User" placeholder="Enter Mother's Cell No." name="B_User">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="BF_Cell">Father's Cell:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="BF_Cell" placeholder="Enter Father's Cell No." name="BF_Cell">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="B_Day">Select Birthday:</label>
                    <div class="col-sm-8">
                        <input type="text" id="datepicker" placeholder="i.e. 2018-04-15" class="form-control" name="B_Day">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="B_Gender">Gender:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="B_Gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="B_Pass">Password:</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="B_Pass" placeholder="Enter Password here" name="B_Pass">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-default">Create Account</button>
                    </div>
                </div>


            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <script src="../../../resource/assets/bootstrap/js/jquery.js"></script>

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

    <!-- specifically used for Datepicker, block1 of 2 start -->
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true
            });
        });
    </script>

    <!-- specifically used for Datepicker, block1 of 2 end -->

</body>

</html>
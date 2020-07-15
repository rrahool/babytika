<?php

require_once "../../../vendor/autoload.php";

use App\BABYTIKA\SEIPXXXX\Message\Message;

$msg = Message::message();

echo "<div> <div id='message'> $msg </div> </div>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Mother Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../resource/assets/w3css/4/w3.css">
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <script src="../../../resource/assets/bootstrap/js/jquery.js"></script>
    <script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../resource/assets/font-awesome-4.7.0/css/font-awesome.min.css">

    <style>
        div.col-lg-6 {
            background-color: #FEF8DD;
            border-radius: 10px;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="w3-bar w3-border w3-light-grey">
                    <a href="create_mother.php" class="w3-bar-item w3-button w3-black" style="text-decoration: none">Create Mother Account</a>
                    <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">Create Baby Account</a>
                    <div class="w3-dropdown-hover">
                        <button class="w3-button" style="text-decoration: none">
                            All Data List <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="index.php" class="w3-bar-item w3-button" style="text-decoration: none"> Mother</a>
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

    <div class="container" style="margin-top: 100px;">
        <div class="col-lg-3"></div>
        <div class="col-lg-6" style="padding-left: 40px; padding-right: 40px;">
            <h2>New Mother Account</h2>
            <form class="form-horizontal" action="store_mother.php" method="post">

                <div class="form-group">
                    <label class="control-label col-sm-4" for="M_Name">Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="M_Name" placeholder="Enter Mother's Name" name="M_Name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="M_Email">Email:</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="M_Email" placeholder="Mother's Email here" name="M_Email">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-4" for="M_Cell">Cell:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="M_Cell" placeholder="Enter Cell No." name="M_Cell">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="M_User">Husband's Cell:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="M_User" placeholder="Enter Husband's Cell No." name="M_User">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="M_Blood">Blood Group:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="M_Blood">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>
                                
                <div class="form-group">
                    <label class="control-label col-sm-4" for="M_Week">Week of Pregnency:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="M_Week" placeholder="Enter Pregnency Week" name="M_Week">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-4" for="M_Pass">Password:</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="M_Pass" placeholder="Enter Password here" name="M_Pass">
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
</body>

</html>
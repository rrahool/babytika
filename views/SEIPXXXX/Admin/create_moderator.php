<?php

    require_once "../../../vendor/autoload.php";

    use App\BABYTIKA\SEIPXXXX\Message\Message;

    $msg = Message::message();

    echo "<div> <div id='message'> $msg </div> </div>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Moderator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../resource/assets/w3css/4/w3.css">
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <script src="../../../resource/assets/bootstrap/js/jquery.js"></script>
    <script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../resource/assets/font-awesome-4.7.0/css/font-awesome.min.css">

    <style>

        div.col-lg-6{
            background-color: #FEF8DD;
            border-radius: 10px;
        }

    </style>
</head>
<body>


<div class="container">
    <div class="col-md-12">
        <div class="w3-bar w3-border w3-light-grey">
                    <a href="create.php" class="w3-bar-item w3-button" style="text-decoration: none">Create Admin</a>
                    <a href="create_moderator.php" class="w3-bar-item w3-button w3-black" style="text-decoration: none">Create Moderator</a>
                    
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
                    <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">Update Profile</a>
                    <a href="trashed.php" class="w3-bar-item w3-button" style="text-decoration: none; display: none;">Trash List</a>
                    <span style="text-align: right">
                        <a href= "../User/Authentication/logout.php" class="w3-bar-item w3-button" style="text-decoration: none"> Logout </a>
                    </span>
        </div>
    </div>

</div>

<div class="container" style="margin-top: 150px;">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
    <h2>Create New Moderator</h2>
    <form class="form-horizontal" action="store_moderator.php" method="post">
    
        <div class="form-group">
            <label class="control-label col-sm-3" for="first_name">First Name:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="first_name" placeholder="Enter Moderator First Name" name="first_name">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="last_name">Last Name:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="last_name" placeholder="Enter Moderator Last Name" name="last_name">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="email">Email:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="email" placeholder="Moderator Email here" name="email">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="password">Password:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="password" placeholder="Password here" name="password">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="phone">Phone:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="phone" placeholder="Moderator Phone No." name="phone">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="address">Address:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="address" placeholder="Moderator Address" name="address">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-default">Create Moderator</button>
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
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
        }
    )
</script>
</body>
</html>


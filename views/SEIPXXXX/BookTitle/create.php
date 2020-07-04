<?php

    require_once "../../../vendor/autoload.php";

    use App\BITM\SEIPXXXX\Message\Message;

    $msg = Message::message();

    echo "<div> <div id='message'> $msg </div> </div>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../resource/assets/w3css/4/w3.css">
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <script src="../../../resource/assets/bootstrap/js/jquery.js"></script>
    <script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>

    <style>

        div.col-lg-6{
            background-color: ghostwhite;
            border-radius: 10px;
        }

    </style>
</head>
<body>


<div class="container">

    <div class="col-md-6"></div>
    <div class="col-md-6">
        <div class="w3-bar w3-border w3-light-grey">
            <a href="create.php" class="w3-bar-item w3-button w3-black" style="text-decoration: none">Add Book</a>
            <a href="index.php" class="w3-bar-item w3-button" style="text-decoration: none">Book List</a>
            <a href="trashed.php" class="w3-bar-item w3-button" style="text-decoration: none">Trash List</a>
        </div>
    </div>

</div>

<div class="container" style="margin-top: 150px;">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
    <h2>BookTitle Form</h2>
    <form class="form-horizontal" action="store.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-3" for="bookTitle">Book Title:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="bookTitle" placeholder="Enter Book Title" name="bookTitle">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="authorName">Author Name:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="authorName" placeholder="Enter Profile Picture" name="authorName">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-default">Submit</button>
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


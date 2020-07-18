<?php

if (!isset($_SESSION)) session_start();

include_once('../../../vendor/autoload.php');

use App\BABYTIKA\SEIPXXXX\User\User;
use App\BABYTIKA\SEIPXXXX\User\Auth;
use App\BABYTIKA\SEIPXXXX\Admin\Admin;
use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;

$obj = new User();
$obj->setData($_SESSION);
$singleUser = $obj->view();

$auth = new Auth();
$status = $auth->setData($_SESSION)->logged_in();

if (!$status) {
    Utility::redirect('../User/Profile/signup.php');
    return;
}

$obj = new Admin();

$allData = $obj->index();

$msg = Message::message();

################## search  block 1 of 5 start ##################
if (isset($_REQUEST['search'])) $someData =  $obj->search($_REQUEST);


$availableKeywords = $obj->getAllKeywords();
$comma_separated_keywords = '"' . implode('","', $availableKeywords) . '"';


################## search  block 1 of 5 end ##################





######################## pagination code block#1 of 2 start ######################################
$recordCount = count($allData);


if (isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if (isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page'] = $page;


if (isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if (isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 3;
$_SESSION['ItemsPerPage'] = $itemsPerPage;



$pages = ceil($recordCount / $itemsPerPage);
$someData = $obj->indexPaginator($page, $itemsPerPage);



$serial = (($page - 1) * $itemsPerPage) + 1;



if ($serial < 1) $serial = 1;
####################### pagination code block#1 of 2 end ###########################################





################## search  block 2 of 5 start ##################
if (isset($_REQUEST['search'])) $someData =  $obj->search($_REQUEST);

if (isset($_REQUEST['search'])) {
    $serial = 1;
    $allData = $someData;
}
################## search  block 2 of 5 end ##################

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Admin Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<body style="background-color: #E9EBEE">

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="w3-bar w3-border w3-light-grey">
                    <a href="create.php" class="w3-bar-item w3-button" style="text-decoration: none">Create Admin</a>
                    <a href="create_moderator.php" class="w3-bar-item w3-button" style="text-decoration: none">Create Moderator</a>
                    
                    <div class="w3-dropdown-hover">
                        <button class="w3-button w3-black" style="text-decoration: none">
                            All Data List <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="index.php" class="w3-bar-item w3-button w3-green" style="text-decoration: none">All Admin Data</a>
                            <a href="index_moderator.php" class="w3-bar-item w3-button" style="text-decoration: none">All Moderator Data</a>
                            
                        </div>
                    </div>
                    
                    <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">Update Profile</a>
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

        <div class="row" style="margin-bottom: 30px;">
            <div class="col-sm-5">
                <div class="w3-panel w3-blue w3-card-4 text-center">
                    <h2>Admin Data List</h2>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="w3-panel w3-card-8 text-right">
                    <h3>Hello Admin</h3>
                </div>
            </div>

            <div class="col-sm-1"></div>

            <!-- required for search, block 4 of 5 start -->
            <br><br>
            <div class="col-sm-5" style="display: none;">
                <div class="w3-panel">
                    <form id="searchForm" action="index.php" method="get">
                        <input type="text" value="" id="searchID" name="search" placeholder="Search..">
                        <input class="w3-check" type="checkbox" name="byTitle" checked="checked">
                        <label> By Title</label>
                        <input class="w3-check" type="checkbox" name="byAuthor" checked="checked">
                        <label> By Author</label>
                        <input hidden type="submit" class="btn-primary" value="search">

                    </form>
                </div>
            </div>

            <!-- required for search, block 4 of 5 end -->

        </div>


        <form id="selectionForm" action="trash_multiple.php" method="post">

            <div class="row">
                <div class="col-sm-12" style="text-align: right;">
                    <a href="create.php" class="btn w3-indigo w3-hover-indigo" style="text-decoration: none">Create New Admin</a>
                </div>
            </div>

            <div class="row" style="display: none;">

                <div class="col-sm-5"></div>

                <div class="col-lg-7">

                    <input type="button" id="deleteMultipleButton" class="w3-btn w3-red w3-hover-red" value="Delete Multiple">
                    <input type="button" id="trashMultipleButton" class="w3-btn w3-orange w3-hover-orange w3-text-white w3-hover-text-white" value="Trash Multiple">

                    <a href="email.php?list=1" class="w3-btn w3-indigo w3-hover-indigo" style="text-decoration: none">Email This List</a>

                    <div class="w3-dropdown-hover">
                        <button class="w3-btn w3-brown w3-hover-brown">Download <i class="fa fa-download"></i></button>
                        <div class="w3-dropdown-content w3-bar-block w3-border">
                            <a href="pdf.php" class="w3-bar-item w3-btn" style="text-decoration: none">As PDF</a>
                            <a href="xl.php" class="w3-bar-item w3-btn" style="text-decoration: none">As Excel</a>
                        </div>
                    </div>


                </div>

            </div>

            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12">
                    <table class="table-bordered w3-table-all w3-hoverable">
                        <thead>
                            <tr class="text-center">
                                <th style="display: none;">All <input type="checkbox" name="select_all" id="select_all"></th>
                                <th>Serial</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($someData as $row) {
                            echo "
                                                <tr>
                                                    <td style='display: none;'>
                                                        <input type='checkbox' class='checkbox' name='selectedIDs[]' value='$row->id'>
                                                    </td>
                                                    <td>$serial</td>
                                                    <td>$row->id</td>
                                                    <td>$row->admin_name</td>
                                                    <td>$row->admin_email</td>
                                                    <td>
                                                        <a href='view.php?id=$row->id' type='button' class='btn btn-primary'>View</a>
                                                        <a href='edit.php?id=$row->id' type='button' class='btn btn-success'>Edit</a>
                                                        <a href='trash.php?id=$row->id' title='Trash' style='display: none;'>
                                                            <button type='button' class='btn btn-warning'>Trash</button>
                                                        </a>
                                                        <a href='delete.php?id=$row->id' type='button' onclick='return confirm_delete()' class='btn btn-danger'>Delete</a>
                                                        <a href='email.php?id=$row->id' title='Email' style='display: none;'>
                                                            <button type='button' class='w3-btn w3-teal w3-hover-teal w3-text-white w3-hover-text-white'>
                                                                <i class='material-icons'>mail</i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            ";
                            $serial++;
                        } //end of foreach loop
                        ?>
                    </table>
                </div>
            </div>
        </form>


        <!--  ######################## pagination code block#2 of 2 start ###################################### -->

        <div class="row">
            <div class="col-sm-9"></div>
            <div class="col-lg-3">
                <select class="form-control" name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;">
                    <?php
                    if ($itemsPerPage == 3) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

                    if ($itemsPerPage == 4)  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
                    else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

                    if ($itemsPerPage == 5)  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                    if ($itemsPerPage == 6)  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

                    if ($itemsPerPage == 10)   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                    if ($itemsPerPage == 15)  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
                    else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
                    ?>
                </select>
            </div>

        </div>

        <div class="row" align="center">

            <div class="pagination">
                <?php

                $pageMinusOne  = $page - 1;
                $pagePlusOne  = $page + 1;

                if ($page > $pages)
                    Utility::redirect("index.php?Page=$pages");

                if ($page > 1)
                    echo "<a href='index.php?Page=$pageMinusOne' title='Previous'>" . "&laquo;" . "</a>";


                for ($i = 1; $i <= $pages; $i++) {
                    if ($i == $page) echo '<a href="" class="active">' . $i . '</a>';
                    else  echo "<a href='?Page=$i'>" . $i . '</a>';
                }
                if ($page < $pages)
                    echo "<a href='index.php?Page=$pagePlusOne' title='Next'>" . "&raquo;" . "</a>";

                ?>

            </div>

        </div>

        <!--  ######################## pagination code block#2 of 2 end ###################################### -->



    </div>

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



    <script type="text/javascript">
        function confirm_delete() {
            return confirm('Are you sure to Delete?');
        }
    </script>



    <script>
        //select all checkboxes
        $("#select_all").change(function() { //"select all" change
            var status = this.checked; // "select all" checked status
            $('.checkbox').each(function() { //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });


        $('.checkbox').change(function() { //".checkbox" change
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if (this.checked == false) { //if this item is unchecked
                $("#select_all")[0].checked = false; //change "select all" checked status to false
            }

            //check "select all" if all checkbox items are checked
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $("#select_all")[0].checked = true; //change "select all" checked status to true
            }
        });
    </script>



    <script>
        $("#deleteMultipleButton").click(function() {

            if (isEmptySelection()) {
                alert("Empty Selection! Please select some record(s) first.")
            } else {
                var result = confirm("Are you sure you want to delete the selected record(s)?");

                if (result) {

                    var selectionForm = $("#selectionForm");
                    selectionForm.attr("action", "delete_multiple.php");
                    selectionForm.submit();
                }
            }

        });
    </script>




    <!-- required for search, block 5 of 5 start -->
    <script>
        $(function() {
            var availableTags = [

                <?php
                echo $comma_separated_keywords;
                ?>
            ];
            // Filter function to search only from the beginning of the string
            $("#searchID").autocomplete({
                source: function(request, response) {

                    var results = $.ui.autocomplete.filter(availableTags, request.term);

                    results = $.map(availableTags, function(tag) {
                        if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                            return tag;
                        }
                    });

                    response(results.slice(0, 15));

                }
            });


            $("#searchID").autocomplete({
                select: function(event, ui) {
                    $("#searchID").val(ui.item.label);
                    $("#searchForm").submit();
                }
            });


        });
    </script>
    <!-- required for search, block5 of 5 end -->




    <script>
        function isEmptySelection() {

            empty = true;

            $(".checkbox").each(function() {

                if (this.checked) empty = false;
            });

            return empty;
        }


        $("#trashMultipleButton").click(function() {

            if (isEmptySelection()) {
                alert("Empty Selection! Please select some record(s) first.");
            } else {

                $("#selectionForm").submit();
            }

        });
    </script>

    <script>
        $('.alert').slideDown("slow").delay(2000).slideUp("slow");
    </script>



</body>

</html>
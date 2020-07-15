<?php

    require_once "../../../vendor/autoload.php";

    use App\BABYTIKA\SEIPXXXX\Admin\Admin;
    use App\BABYTIKA\SEIPXXXX\Message\Message;
    use App\BABYTIKA\SEIPXXXX\Utility\Utility;

    $obj = new Admin();

    $allData = $obj->trashed();

    $msg = Message::message();

    ######################## pagination code block#1 of 2 start ######################################
    $recordCount= count($allData);


    if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
    else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
    else   $page = 1;
    $_SESSION['Page']= $page;


    if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
    else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
    else   $itemsPerPage = 3;
    $_SESSION['ItemsPerPage']= $itemsPerPage;



    $pages = ceil($recordCount/$itemsPerPage);
    $someData = $obj->trashedPaginator($page,$itemsPerPage);



    $serial = (  ($page-1) * $itemsPerPage ) +1;



    if($serial<1) $serial=1;
    ####################### pagination code block#1 of 2 end ###########################################
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book List - All</title>
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/w3css/4/w3.css">
    <script src="../../../resource/assets/bootstrap/js/jquery.js"></script>
    <script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../resource/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../resource/assets/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body style="background-color: #E9EBEE">

        <div class="container">
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

            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <div class="w3-bar w3-border w3-light-grey">
                        <a href="create.php" class="w3-bar-item w3-button" style="text-decoration: none">Add Book</a>
                        <a href="index.php" class="w3-bar-item w3-button" style="text-decoration: none">Book List</a>
                        <a href="trashed.php" class="w3-bar-item w3-button w3-black" style="text-decoration: none">Trash List</a>
                        <div class="w3-dropdown-hover">
                            <button class="w3-button">More <i class="fa fa-caret-down"></i></button>
                            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                                <a href="#" class="w3-bar-item w3-button">Link 1</a>
                                <a href="#" class="w3-bar-item w3-button">Link 2</a>
                                <a href="#" class="w3-bar-item w3-button">Link 3</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5">
                    <div class="w3-panel w3-blue w3-card-4">
                        <h2> Trashed List of - Book Title </h2>
                    </div>
                </div>
            </div>
            <br><br>
            <form id="selectionForm" action="recover_multiple.php" method="post">

                <div class="row">

                    <div class="col-sm-5"></div>

                    <div class="col-lg-7">

                        <input type="button" id="deleteMultipleButton" class="w3-btn w3-red w3-hover-red" value="Delete Multiple">
                        <input type="button" id="recoverMultipleButton" class="w3-btn w3-teal w3-hover-teal w3-text-white w3-hover-text-white" value="Recover Multiple">

                        <a href="trashMail.php?list=1" class="w3-btn w3-indigo w3-hover-indigo" style="text-decoration: none">Email This List</a>

                        <div class="w3-dropdown-hover">
                            <button type="button" class="w3-btn w3-brown w3-hover-brown">Download <i class="fa fa-download"></i></button>
                            <div class="w3-dropdown-content w3-bar-block w3-border">
                                <a href="trashPdf.php" class="w3-bar-item w3-btn" style="text-decoration: none">As PDF</a>
                                <a href="trashXl.php" class="w3-bar-item w3-btn" style="text-decoration: none">As Excel</a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">

                            <table class="table-bordered w3-table-all w3-hoverable">
                                <thead>
                                <tr class="w3-green">
                                    <th>All <input type="checkbox" name="select_all" id="select_all"></th>
                                    <th>Serial</th>
                                    <th>Book ID</th>
                                    <th>Book Title</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <?php
                                    foreach($someData as $row){
                                        echo "
                                            <tr>
                                                <td>
                                                    <input type='checkbox' class='checkbox' name='selectedIDs[]' value='$row->id'>
                                                </td>
                                                <td>$serial</td>
                                                <td>$row->id</td>
                                                <td>$row->book_title</td>
                                                <td>$row->author_name</td>
                                                <td>
                                                    <a href='view.php?id=$row->id' title='View'>
                                                        <button type='button' class='w3-btn w3-blue w3-hover-blue' style='font-size: 20px;'>
                                                            <span class='glyphicon glyphicon-eye-open'></span>
                                                        </button>
                                                    </a>
                                                    <a href='edit.php?id=$row->id' title='Edit'>
                                                        <button type='button' class='w3-btn w3-indigo w3-hover-indigo'>
                                                            <i class='material-icons'>edit</i>
                                                        </button>
                                                    </a>
                                                    <a href='recover.php?id=$row->id' title='Recover'>
                                                            <button type='button' class='w3-btn w3-teal w3-hover-teal'>
                                                                <i class='material-icons'>restore</i>
                                                            </button>
                                                        </a>
                                                    <a href='delete.php?id=$row->id' title='Delete'>
                                                            <button onclick='return confirm_delete()' type='button' class='w3-btn w3-red w3-hover-red' >
                                                                <i class='material-icons'>content_cut</i>
                                                            </button>
                                                    </a>
                                                    <a href='trashMail.php?id=$row->id' title='Email'>
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
                <div class="col-lg-9"></div>
                <div class="col-lg-3">
                    <select class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                        <?php
                        if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

                        if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
                        else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

                        if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                        if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

                        if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                        if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
                        else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
                        ?>
                    </select>
                </div>

            </div>

            <div class="row" align="center">

                <div class="pagination">
                    <?php

                    $pageMinusOne  = $page-1;
                    $pagePlusOne  = $page+1;

                    if($page>$pages)
                        Utility::redirect("trashed.php?Page=$pages");

                    if($page>1)
                        echo "<a href='trashed.php?Page=$pageMinusOne'>" . "&laquo;" . "</a>";


                    for($i=1;$i<=$pages;$i++)
                    {
                        if($i==$page) echo '<a href="" class="active">'. $i . '</a>';
                        else  echo "<a href='?Page=$i'>". $i . '</a>';

                    }
                    if($page<$pages)
                        echo "<a href='trashed.php?Page=$pagePlusOne'>" . "&raquo;" . "</a>";

                    ?>

                </div>

            </div>

            <!--  ######################## pagination code block#2 of 2 end ###################################### -->

        </div>

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

        <script type="text/javascript">
            function confirm_delete(){
                return confirm('Are you sure to Delete?');
            }
        </script>

        <script>

            //select all checkboxes
            $("#select_all").change(function(){  //"select all" change
                var status = this.checked; // "select all" checked status
                $('.checkbox').each(function(){ //iterate all listed checkbox items
                    this.checked = status; //change ".checkbox" checked status
                });
            });


            $('.checkbox').change(function(){ //".checkbox" change
                //uncheck "select all", if one of the listed checkbox item is unchecked
                if(this.checked == false){ //if this item is unchecked
                    $("#select_all")[0].checked = false; //change "select all" checked status to false
                }

                //check "select all" if all checkbox items are checked
                if ($('.checkbox:checked').length == $('.checkbox').length ){
                    $("#select_all")[0].checked = true; //change "select all" checked status to true
                }
            });
        </script>



        <script>


            $("#deleteMultipleButton").click(function(){


                if(isEmptySelection()){
                    alert("Empty Selection! Please select some record(s) first.");
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



        <script>

            function isEmptySelection(){

                empty = true;

                $(".checkbox").each(function(){

                    if(this.checked) empty=false;
                });

                return empty;
            }


            $("#recoverMultipleButton").click(function(){

                if(isEmptySelection()){
                    alert("Empty Selection! Please select some record(s) first.");
                }
                else{

                    $("#selectionForm").submit();
                }

            });

        </script>



</body>
</html>

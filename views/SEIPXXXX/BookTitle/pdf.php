<?php
include_once ('../../../vendor/autoload.php');
use App\BITM\SEIPXXXX\BookTitle\BookTitle;

$obj= new BookTitle();
$allData=$obj->index();
//var_dump($allData);
$trs="";
$sl=0;

foreach($allData as $row) {
    $id =  $row->id;
    $bookName = $row->book_title;
    $authorName =$row->author_name;
    $sl++;
    $trs .= "<tr>";
    $trs .= "<td width='50'> $sl</td>";
    $trs .= "<td width='50'> $id </td>";
    $trs .= "<td width='250'> $bookName </td>";
    $trs .= "<td width='250'> $authorName </td>";

    $trs .= "</tr>";
}

$html= <<<BITM
<div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th align='left'>Serial</th>
                    <th align='left' >ID</th>
                    <th align='left' >Book Name</th>
                    <th align='left' >Author Name</th>

              </tr>
                </thead>
                <tbody>

                  $trs

                </tbody>
            </table>


BITM;

//\App\BITM\SEIPXXXX\Utility\Utility::dd($html);

// Require composer autoload
require_once ('../../../vendor/mpdf/mpdf/mpdf.php');
//Create an instance of the class:

$mpdf = new mPDF();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('BookTitle.pdf', 'D');
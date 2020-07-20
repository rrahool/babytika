<?php

/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 5/29/2017
 * Time: 1:38 PM
 */

namespace App\BABYTIKA\SEIPXXXX\Baby;

use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Model\Database;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;
use PDO;

class Baby extends Database
{

    public $id;
    public $B_Name;
    public $BM_Email;
    public $B_User;
    public $BF_Cell;
    public $B_Day;
    public $B_Gender;
    public $B_Pass;

    // for baby_vaccine update
    public $taken;
    public $cell;
    public $number;


    public function setData($postArray)
    {

        if (array_key_exists("id", $postArray)) {
            $this->id = $postArray['id'];
        }

        if (array_key_exists("B_Name", $postArray)) {
            $this->B_Name = $postArray['B_Name'];
        }

        if (array_key_exists("BM_Email", $postArray)) {
            $this->BM_Email = $postArray['BM_Email'];
        }

        if (array_key_exists("B_User", $postArray)) {
            $this->B_User = $postArray['B_User'];
        }

        if (array_key_exists("BF_Cell", $postArray)) {
            $this->BF_Cell = $postArray['BF_Cell'];
        }

        if (array_key_exists("B_Day", $postArray)) {
            $this->B_Day = $postArray['B_Day'];
        }

        if (array_key_exists("B_Gender", $postArray)) {
            $this->B_Gender = $postArray['B_Gender'];
        }

        if (array_key_exists("B_Pass", $postArray)) {
            $this->B_Pass = $postArray['B_Pass'];
        }

        if (array_key_exists("taken", $postArray)) {
            $this->taken = $postArray['taken'];
        }

        if (array_key_exists("cell", $postArray)) {
            $this->cell = $postArray['cell'];
        }

        if (array_key_exists("number", $postArray)) {
            $this->number = $postArray['number'];
        }
    } // end of setData()

    public function store()
    {

        $query = "INSERT INTO `baby` (`B_Name`, `BM_Email`, `B_User`, `BF_Cell`, `B_Day`, `B_Gender`, `B_Pass`) VALUES (?, ?, ?, ?, ?, ?, ?);";

        $dataArray = array($this->B_Name, $this->BM_Email, $this->B_User, $this->BF_Cell, $this->B_Day, $this->B_Gender, $this->B_Pass);

        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($dataArray);

        if ($result) {
            Message::message("Success :) Baby's Account has been Created Successfully.");
        } else {
            Message::message("Failure :( Data Not Inserted!");
        }
    } // end of store()

    public function index()
    {

        $query = "SELECT * FROM `baby`";

        $STH = $this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();

        return $allData;
    } // end of index()

    public function view()
    {

        $query = "SELECT * FROM `baby` WHERE `id`=" . $this->id;

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetch();
        return $singleData;
    } // end of view()

    public function update()
    {

        $query = "UPDATE `baby` SET `first_name` = ?, `email` = ?, `status` = ? WHERE `id` = $this->id;";

        //    Utility::dd($query);

        $dataArray = array($this->first_name, $this->email, $this->status);

        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($dataArray);

        if ($result) {
            Message::message("Success :) Data Updated Successfully.");
        } else {
            Message::message("Failure :( Data Not Updated!");
        }
    } // end of update()


    public function trash()
    {
        $query = "UPDATE `moderator` SET is_trashed = NOW() WHERE `id` = $this->id;";

        //Utility::dd($query);

        $result = $this->DBH->exec($query);

        if ($result) {
            Message::message("Success :) Data Trashed Successfully.");
        } else {
            Message::message("Failure :( Data Not Trashed!");
        }
    } // end of trash()


    public function trashed()
    {

        $query = "SELECT * FROM `moderator` WHERE is_trashed <> 'No'";

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    } // end of trashed()

    public function recover()
    {
        $query = "UPDATE `moderator` SET is_trashed = 'No' WHERE `id` = $this->id;";

        //Utility::dd($query);

        $result = $this->DBH->exec($query);

        if ($result) {
            Message::message("Success :) Data Recovered Successfully.");
        } else {
            Message::message("Failure :( Data Not Recovered!");
        }
    } // end of recover()

    public function delete()
    {
        $query = "DELETE FROM `moderator` WHERE `id` = $this->id;";

        //Utility::dd($query);

        $result = $this->DBH->exec($query);

        if ($result) {
            Message::message("Success :) Data Deleted Successfully.");
        } else {
            Message::message("Failure :( Data Not Deleted!");
        }
    } // end of delete()

    public function store_baby_taken_vaccine()
    {
        $query = "UPDATE `vaccine_baby` SET `status` = $this->taken, `status_date` = CURDATE() WHERE `cell` = $this->BF_Cell AND `number` = $this->number";

        // Utility::dd($query);

        $result = $this->DBH->exec($query);

        if ($result) {
            Message::message("Success :) Vaccine Info Updated Successfully.");
        } else {
            Message::message("Failure :( Vaccine Info Not Updated!");
        }

    } // end of store_baby_taken_vaccine()


    public function baby_taken_vaccine()
    {

        // $query = "SELECT * FROM `vaccine_baby` INNER JOIN `baby` ON vaccine_baby.cell = baby.BF_Cell WHERE vaccine_baby.numbers <> 1 ORDER BY `number` ASC";

        $query = "SELECT b.id, vb.cell, vb.pdate, vb.ndate, vb.number, vb.numbers, vb.vaccine, vb.status, vb.status_date, b.BF_Cell FROM vaccine_baby AS vb INNER JOIN baby AS b ON vb.cell = b.BF_Cell";

        
        
        $STH = $this->DBH->query($query);
        
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetchAll();
        // Utility::dd($singleData);
        return $singleData;
    } // end of baby_taken_vaccine()


    // public function mother_taken_vaccine()
    // {

    //     // $query = "SELECT * FROM `vaccine` INNER JOIN `mother` ON vaccine.cell = mother.M_Cell WHERE vaccine.numbers <> 1 ORDER BY `number` ASC";

    //     $query = "SELECT m.id, v.cell, v.pdate, v.ndate, v.number, v.numbers, v.status, v.status_date, m.M_Cell FROM vaccine AS v INNER JOIN mother AS m ON v.cell = m.M_Cell ORDER BY v.number ASC";


    //     $STH = $this->DBH->query($query);

    //     $STH->setFetchMode(PDO::FETCH_OBJ);
    //     $singleData = $STH->fetchAll();
    //     return $singleData;
    // } // end of mother_taken_vaccine()


    public function search($requestArray)
    {
        $sql = "";

        if (isset($requestArray['byID']) && isset($requestArray['byCell'])) {
            $sql = "SELECT * FROM `baby`
                        WHERE `id` LIKE '%" . $requestArray['search'] . "%' 
                        OR `B_User` LIKE '%" . $requestArray['search'] . "%'";
        }

        if (isset($requestArray['byID']) && !isset($requestArray['byCell'])) {
            $sql = "SELECT * FROM `baby`
                        WHERE `id` LIKE '%" . $requestArray['search'] . "%'";
        }

        if (!isset($requestArray['byID']) && isset($requestArray['byCell'])) {
            $sql = "SELECT * FROM `baby`
                        WHERE `B_User` LIKE '%" . $requestArray['search'] . "%'";
        }

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();

        return $someData;
    } // end of search()


    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->B_Name);
        }


        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->B_Name);
            $eachString = trim($eachString);
            $eachString = preg_replace("/\r|\n/", " ", $eachString);
            $eachString = str_replace("&nbsp;", "",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord) {
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->BM_Email);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->BM_Email);
            $eachString = trim($eachString);
            $eachString = preg_replace("/\r|\n/", " ", $eachString);
            $eachString = str_replace("&nbsp;", "",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord) {
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);
    } // end of getAllKeywords()


    public function indexPaginator($page = 1, $itemsPerPage = 3)
    {


        $start = (($page - 1) * $itemsPerPage);

        if ($start < 0) $start = 0;


        $sql = "SELECT * FROM `baby` LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    } // end of indexPaginator()


    public function trashedPaginator($page = 1, $itemsPerPage = 3)
    {


        $start = (($page - 1) * $itemsPerPage);

        if ($start < 0) $start = 0;


        $sql = "SELECT * from `moderator` WHERE is_trashed <> 'No'  LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    } // end of trashedPaginator()


    public function trashList()
    {

        $sql = "SELECT * FROM `moderator` WHERE is_trashed <> 'No'";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();
    } // end of trashList()




} //end of Admin Class
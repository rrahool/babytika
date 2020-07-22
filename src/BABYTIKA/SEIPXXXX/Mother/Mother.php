<?php

/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 5/29/2017
 * Time: 1:38 PM
 */

namespace App\BABYTIKA\SEIPXXXX\Mother;

use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Model\Database;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;
use PDO;

class Mother extends Database
{

    public $id;
    public $M_Name;
    public $M_Email;
    public $M_Cell;
    public $M_User;
    public $M_Blood;
    public $M_Week;
    public $M_Pass;
    public $M_Date;

    // for vaccine update
    public $taken;
    public $number;


    public function setData($postArray)
    {

        if (array_key_exists("id", $postArray)) {
            $this->id = $postArray['id'];
        }

        if (array_key_exists("M_Name", $postArray)) {
            $this->M_Name = $postArray['M_Name'];
        }

        if (array_key_exists("M_Email", $postArray)) {
            $this->M_Email = $postArray['M_Email'];
        }

        if (array_key_exists("M_Cell", $postArray)) {
            $this->M_Cell = $postArray['M_Cell'];
        }

        if (array_key_exists("M_User", $postArray)) {
            $this->M_User = $postArray['M_User'];
        }

        if (array_key_exists("M_Blood", $postArray)) {
            $this->M_Blood = $postArray['M_Blood'];
        }

        if (array_key_exists("M_Week", $postArray)) {
            $this->M_Week = $postArray['M_Week'];
        }

        if (array_key_exists("M_Pass", $postArray)) {
            $this->M_Pass = $postArray['M_Pass'];
        }

        if (array_key_exists("M_Date", $postArray)) {
            $this->M_Date = $postArray['M_Date'];
        }

        if (array_key_exists("taken", $postArray)) {
            $this->taken = $postArray['taken'];
        }

        if (array_key_exists("number", $postArray)) {
            $this->number = $postArray['number'];
        }
    } // end of setData()

    public function store()
    {
        $query = "INSERT INTO `mother` (`M_Name`, `M_Email`, `M_Cell`, `M_User`, `M_Blood`, `M_Week`, `M_Pass`, `M_Date`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Yes');";

        $dataArray = array($this->M_Name, $this->M_Email, $this->M_Cell, $this->M_User, $this->M_Blood, $this->M_Week, $this->M_Pass, $this->M_Date);

        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($dataArray);

        if ($result) {
            Message::message("Success :) Mother's Account has been Created Successfully.");
        } else {
            Message::message("Failure :( Data Not Inserted!");
        }
    } // end of store()

    public function index()
    {

        $query = "SELECT * FROM `mother`";

        $STH = $this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();

        return $allData;
    } // end of index()

    public function view()
    {

        $query = "SELECT * FROM `mother` WHERE `id`=" . $this->id;

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetch();
        return $singleData;
    } // end of view()

    public function update()
    {

        $query = "UPDATE `mother` SET `first_name` = ?, `email` = ?, `status` = ? WHERE `id` = $this->id;";

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

    public function store_mother_taken_vaccine()
    {
        $query = "UPDATE `vaccine` SET `status` = $this->taken, `status_date` = CURDATE() WHERE `cell` = $this->M_Cell AND `number` = $this->number";

        $result = $this->DBH->exec($query);

        if ($result) {
            Message::message("Success :) Vaccine Info Updated Successfully.");
        } else {
            Message::message("Failure :( Vaccine Info Not Updated!");
        }
    } // end of store_mother_taken_vaccine()


    public function mother_taken_vaccine($ucell)
    {

        // $query = "SELECT * FROM `vaccine` INNER JOIN `mother` ON vaccine.cell = mother.M_Cell WHERE vaccine.numbers <> 1 ORDER BY `number` ASC";

        $query = "SELECT m.id, m.M_Email, v.final_date, v.cell, v.pdate, v.ndate, v.number, v.numbers, v.status, v.status_date, m.M_Cell FROM vaccine AS v INNER JOIN mother AS m ON v.cell = m.M_Cell WHERE v.cell = $ucell ORDER BY v.number ASC";

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetchAll();
        // Utility::dd($query);

        return $singleData;
    } // end of mother_taken_vaccine()

    public function search($requestArray)
    {
        $sql = "";

        if (isset($requestArray['byID']) && isset($requestArray['byCell'])) {
            $sql = "SELECT * FROM `mother`
                        WHERE `id` LIKE '%" . $requestArray['search'] . "%' 
                        OR `M_Cell` LIKE '%" . $requestArray['search'] . "%'";
        }

        if (isset($requestArray['byID']) && !isset($requestArray['byCell'])) {
            $sql = "SELECT * FROM `mother`
                        WHERE `id` LIKE '%" . $requestArray['search'] . "%'";
        }

        if (!isset($requestArray['byID']) && isset($requestArray['byCell'])) {
            $sql = "SELECT * FROM `mother`
                        WHERE `M_Cell` LIKE '%" . $requestArray['search'] . "%'";
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
            $_allKeywords[] = trim($oneData->M_Name);
        }


        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->M_Name);
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
            $_allKeywords[] = trim($oneData->M_Email);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->M_Email);
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


        $sql = "SELECT * FROM `mother` LIMIT $start,$itemsPerPage";


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
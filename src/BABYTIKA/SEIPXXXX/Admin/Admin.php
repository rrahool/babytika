<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 5/29/2017
 * Time: 1:38 PM
 */

namespace App\BABYTIKA\SEIPXXXX\Admin;

use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Model\Database;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;
use PDO;

class Admin extends Database
{

    public $id;
    public $adminName;
    public $adminEmail;
    public $adminPassword;


    public function setData($postArray){

        if(array_key_exists("id",$postArray)){
            $this->id = $postArray['id'];
        }

        if(array_key_exists("adminName",$postArray)){
            $this->adminName = $postArray['adminName'];
        }

        if(array_key_exists("adminEmail",$postArray)){
            $this->adminEmail = $postArray['adminEmail'];
        }

        if(array_key_exists("adminPassword",$postArray)){
            $this->adminPassword = md5($postArray['adminPassword']);
        }
    } // end of setData()

    public function store(){

        $query = "INSERT INTO `admin_info` (`admin_name`, `admin_email`, `admin_password`) VALUES (?, ?, ?);";

        // Utility::dd($query);

        $dataArray = array($this->adminName, $this->adminEmail, $this->adminPassword);

        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success :) Admin Created Successfully.");
        }
        else{
            Message::message("Failure :( Admin Not Created!");
        }
    } // end of store()

    public function index(){

        $query = "SELECT * FROM `admin_info` WHERE is_trashed = 'No'";

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;

    } // end of index()

     public function view(){

            $query = "SELECT * FROM `admin_info` WHERE `id`=".$this->id;

            $STH = $this->DBH->query($query);

            $STH->setFetchMode(PDO::FETCH_OBJ);
            $singleData = $STH->fetch();
            return $singleData;

        } // end of view()

    public function update(){

        $query = "UPDATE `admin_info` SET `admin_name` = ?, `admin_email` = ?, `admin_password` = ? WHERE `id` = $this->id;";

       //Utility::dd($query);

        $dataArray = array($this->adminName, $this->adminEmail, $this->adminPassword);

        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success :) Admin Profile Updated Successfully.");
        }
        else{
            Message::message("Failure :( Admin Profile Not Updated!");
        }
    } // end of update()


    public function trash(){
        $query = "UPDATE `admin_info` SET is_trashed = NOW() WHERE `id` = $this->id;";

        //Utility::dd($query);

        $result = $this->DBH->exec($query);

        if($result){
            Message::message("Success :) Data Trashed Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Trashed!");
        }

    } // end of trash()


    public function trashed(){

        $query = "SELECT * FROM `admin_info` WHERE is_trashed <> 'No'";

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;

    } // end of trashed()



    public function recover(){
            $query = "UPDATE `admin_info` SET is_trashed = 'No' WHERE `id` = $this->id;";

            //Utility::dd($query);

            $result = $this->DBH->exec($query);

            if($result){
                Message::message("Success :) Data Recovered Successfully.");
            }
            else{
                Message::message("Failure :( Data Not Recovered!");
            }

        } // end of recover()

    public function delete(){
        $query = "DELETE FROM `admin_info` WHERE `id` = $this->id;";

        //Utility::dd($query);

        $result = $this->DBH->exec($query);

        if($result){
            Message::message("Success :) Admin Deleted Successfully.");
        }
        else{
            Message::message("Failure :( Admin Not Deleted!");
        }


    } // end of delete()


    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `admin_info` WHERE `is_trashed` ='No' AND (`admin_name` LIKE '%".$requestArray['search']."%' OR `admin_email` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byTitle']) && !isset($requestArray['byAuthor']) ) $sql = "SELECT * FROM `admin_info` WHERE `is_trashed` ='No' AND `admin_name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `admin_info` WHERE `is_trashed` ='No' AND `admin_email` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();

        return $someData;

    }// end of search()


    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->admin_name);
        }


        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->admin_name);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->admin_email);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->admin_email);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// end of getAllKeywords()


    public function indexPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);

        if($start<0) $start = 0;


        $sql = "SELECT * from admin_info  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }// end of indexPaginator()


    public function trashedPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);

        if($start<0) $start = 0;


        $sql = "SELECT * from admin_info WHERE is_trashed <> 'No'  LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }// end of trashedPaginator()


    public function trashList(){

        $sql = "Select * from admin_info where is_trashed <> 'No'";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();
    } // end of trashList()




} //end of Admin Class
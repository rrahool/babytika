<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 5/29/2017
 * Time: 1:38 PM
 */

namespace App\BABYTIKA\SEIPXXXX\Moderator;

use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Model\Database;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;
use PDO;

class Moderator extends Database
{

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $phone;
    public $address;
    public $status;


    public function setData($postArray){

        if(array_key_exists("id",$postArray)){
            $this->id = $postArray['id'];
        }

        if(array_key_exists("first_name",$postArray)){
            $this->first_name = $postArray['first_name'];
        }

        if(array_key_exists("last_name",$postArray)){
            $this->last_name = $postArray['last_name'];
        }

        if(array_key_exists("email",$postArray)){
            $this->email = $postArray['email'];
        }

        if(array_key_exists("password",$postArray)){
            $this->password = md5($postArray['password']);
        }

        if(array_key_exists("phone",$postArray)){
            $this->phone = $postArray['phone'];
        }

        if(array_key_exists("address",$postArray)){
            $this->address = $postArray['address'];
        }

        if(array_key_exists("status",$postArray)){
            $this->status = $postArray['status'];
        }

    } // end of setData()

    public function store(){

        $query = "INSERT INTO `moderator` (`first_name`, `last_name`, `email`, `password`, `phone`, `address`, `email_verified`, `status`) VALUES (?, ?, ?, ?, ?, ?, 'Yes', 'Active');";


        $dataArray = array($this->first_name, $this->last_name, $this->email, $this->password, $this->phone, $this->address);

        $STH = $this->DBH->prepare($query);

        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success :) Moderator has been Created Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Inserted!");
        }
    } // end of store()


    public function index(){

        $query = "SELECT * FROM `moderator` WHERE `email_verified` = 'Yes' AND `is_trashed` = 'No'";

        $STH = $this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();

        return $allData;

    } // end of index()

     public function view(){

        $query = "SELECT * FROM `moderator` WHERE `id`=".$this->id;

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetch();
        return $singleData;

    } // end of view()

    public function update(){

        $query = "UPDATE `moderator` SET `first_name` = ?, `email` = ?, `status` = ? WHERE `id` = $this->id;";

    //    Utility::dd($query);

        $dataArray = array($this->first_name, $this->email, $this->status);

        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success :) Data Updated Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Updated!");
        }
    } // end of update()


    public function trash(){
        $query = "UPDATE `moderator` SET is_trashed = NOW() WHERE `id` = $this->id;";

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

        $query = "SELECT * FROM `moderator` WHERE is_trashed <> 'No'";

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;

    } // end of trashed()



    public function recover(){
            $query = "UPDATE `moderator` SET is_trashed = 'No' WHERE `id` = $this->id;";

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
        $query = "DELETE FROM `moderator` WHERE `id` = $this->id;";

        //Utility::dd($query);

        $result = $this->DBH->exec($query);

        if($result){
            Message::message("Success :) Data Deleted Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Deleted!");
        }


    } // end of delete()


    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `moderator` WHERE `is_trashed` ='No' AND (`first_name` LIKE '%".$requestArray['search']."%' OR `email` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byTitle']) && !isset($requestArray['byAuthor']) ) $sql = "SELECT * FROM `moderator` WHERE `is_trashed` ='No' AND `first_name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `moderator` WHERE `is_trashed` ='No' AND `email` LIKE '%".$requestArray['search']."%'";

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
            $_allKeywords[] = trim($oneData->first_name);
        }


        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->first_name);
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
            $_allKeywords[] = trim($oneData->email);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->email);
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


        $sql = "SELECT * FROM `moderator` WHERE `email_verified` = 'Yes' AND `is_trashed` = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }// end of indexPaginator()


    public function trashedPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);

        if($start<0) $start = 0;


        $sql = "SELECT * from `moderator` WHERE is_trashed <> 'No'  LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }// end of trashedPaginator()


    public function trashList(){

        $sql = "SELECT * FROM `moderator` WHERE is_trashed <> 'No'";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();
    } // end of trashList()




} //end of Admin Class
<?php

namespace App\BABYTIKA\SEIPXXXX\User;

use App\BABYTIKA\SEIPXXXX\Message\Message;
use App\BABYTIKA\SEIPXXXX\Utility\Utility;
use App\BABYTIKA\SEIPXXXX\Model\Database as DB;
use PDO;


class User extends DB
{
    // public $table="moderator";
    public $firstName = "";
    public $lastName = "";
    public $email = "";
    public $phone = "";
    public $address = "";
    public $password = "";
    public $id = "";
    public $email_token = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function setData($data = array())
    {
        if (array_key_exists('first_name', $data)) {
            $this->firstName = $data['first_name'];
        }
        if (array_key_exists('last_name', $data)) {
            $this->lastName = $data['last_name'];
        }
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('phone', $data)) {
            $this->phone = $data['phone'];
        }
        if (array_key_exists('address', $data)) {
            $this->address = $data['address'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }

        if (array_key_exists('email_token', $data)) {
            $this->email_token = $data['email_token'];
        }


        return $this;
    }





    public function store()
    {

        $dataArray = array(
            ':firstName' => $this->firstName, ':lastName' => $this->lastName, ':email' => $this->email, ':password' => $this->password,
            ':phone' => $this->phone, ':address' => $this->address, ':email_token' => $this->email_token
        );


        $query = "INSERT INTO `db_atomic_project`.`moderator` (`first_name`, `last_name`, `email`, `password`, `phone`, `address`,`email_verified`) 
VALUES (:firstName, :lastName, :email, :password, :phone, :address, :email_token)";

        $STH = $this->DBH->prepare($query);

        $result = $STH->execute($dataArray);

        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Your registration request has been sent successfully. Please check your email and active your account.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Failed!</strong> Data has not been stored successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function change_password()
    {
        $query = "UPDATE `db_atomic_project`.`moderator` SET `password`=:password  WHERE `moderator`.`email` =:email";
        $result = $this->DBH->prepare($query);
        $result->execute(array(':password' => $this->password, ':email' => $this->email));

        if ($result) {
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Password has been updated  successfully.
              </div>");
        } else {
            echo "Error";
        }
    }

    public function view()
    {
        $query = " SELECT * FROM moderator WHERE email = '$this->email' ";
        // Utility::dd($query);
        $STH = $this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();
    } // end of view()


    public function validTokenUpdate()
    {
        $query = "UPDATE `db_atomic_project`.`moderator` SET  `email_verified`='" . 'Yes' . "' WHERE `moderator`.`email` ='$this->email'";
        $result = $this->DBH->prepare($query);
        $result->execute();

        if ($result) {
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Congrats!</strong> Your Email has been verified. Please wait some time to access your account until an Admin approve your registration request.
              </div>");
        } else {
            echo "Error";
        }
        return Utility::redirect('../../../../views/SEIPXXXX/User/Profile/signup_moderator.php');
    }

    public function update()
    {

        $query = "UPDATE `db_atomic_project`.`moderator` SET `first_name`=:firstName, `last_name` =:lastName ,  `email` =:email, `phone` = :phone, `address` = :address  WHERE `moderator`.`email` = :email";

        $result = $this->DBH->prepare($query);

        $result->execute(array(
            ':firstName' => $this->firstName, ':lastName' => $this->lastName, ':email' => $this->email, ':phone' => $this->phone,
            ':address' => $this->address, ':email_token' => $this->email_token
        ));

        if ($result) {
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        } else {
            echo "Error";
        }
        return Utility::redirect($_SERVER['HTTP_REFERER']);
    }
}

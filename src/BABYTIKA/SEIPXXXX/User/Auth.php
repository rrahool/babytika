<?php
namespace App\BABYTIKA\SEIPXXXX\User;
if(!isset($_SESSION) )  session_start();
use App\BABYTIKA\SEIPXXXX\Model\Database as DB;
use PDO;

class Auth extends DB{

    public $admin_email = "";
    public $admin_password = "";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data = Array()){
        if (array_key_exists('admin_email', $data)) {
            $this->admin_email = $data['admin_email'];
        }
        if (array_key_exists('admin_password', $data)) {
            $this->admin_password = md5($data['admin_password']);
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `admin_info` WHERE `admin_info`.`admin_email` ='$this->admin_email' ";
        $STH=$this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $STH->fetchAll();

        $count = $STH->rowCount();

        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $query = "SELECT * FROM `admin_info` WHERE `admin_email`='$this->admin_email' AND `admin_password`='$this->admin_password'";
        $STH=$this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $STH->fetchAll();

        $count = $STH->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('admin_email', $_SESSION)) && (!empty($_SESSION['admin_email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['admin_email']="";
        return TRUE;
    }
}


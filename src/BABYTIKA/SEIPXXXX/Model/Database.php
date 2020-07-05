<?php
namespace App\BABYTIKA\SEIPXXXX\Model;

use PDO;
use PDOException;


class Database{
   public $DBH;


    public $username="root";
    public $password="";
    
    public function __construct()
    {
        try {

            # MySQL with PDO_MYSQL
            $this->DBH = new PDO("mysql:host=localhost;dbname=db_atomic_project", $this->username, $this->password);

        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}


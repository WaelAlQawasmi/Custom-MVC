<?php
namespace App;
use PDO;
use PDOException;
class DataBase {
    public $host;
    public $dbName;
    public $username;
    public $password;

    public function __construct($host, $dbName, $username, $password) {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
    }
    public function getConnection() :PDO {
      
        try {
        $pdo = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->username, $this->password , [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
        //echo "Connection session established";
         } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();

         }
         
         return $pdo;

    }
}
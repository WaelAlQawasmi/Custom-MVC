<?php
namespace App;
use PDO;
use PDOException;
class DataBase {

    public function getConnection() :PDO {
        $host = 'localhost';
        $dbname = 'company';
        $username = 'root';
        $password = '';
        try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password , [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
        //echo "Connection session established";
         } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();

         }
         
         return $pdo;

    }
}
<?php 
/**
 * @author Wael Al Qawasmi <wael.alqwasmi@yahoo.com>
 */
namespace App\Models;
use App\DataBase;
use PDO;
class Prodact {
  private $dataBase;
  public function __construct(DataBase $dataBase) {
    $this->dataBase= $dataBase;
  }
 public function getData(): array
 {
  $PDO= $this->dataBase->getConnection();
  $stmt= $PDO->query('SELECT * FROM company');
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }

}
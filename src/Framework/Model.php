<?php
namespace Framework;

use App\DataBase;
use PDO;

abstract class Model {
    protected $tableName;
    protected $dataBase;
    public function __construct(DataBase $dataBase) {
       echo strtolower( end(explode("\\",get_class($this))));
       exit();
      $this->dataBase= $dataBase;
    }

 public function findAll(): array
 {
  $PDO= $this->dataBase->getConnection();
  $stmt= $PDO->query("SELECT * FROM {$this->tableName}");
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
}
<?php
namespace Framework;

use App\DataBase;
use PDO;

abstract class Model {
    protected $tableName;
    protected $dataBase;
    public function getTableName() { 
        if($this->tableName ==null)
            return  strtolower( end(explode("\\",get_class($this))));
        return $this->tableName;
    }
    public function __construct(DataBase $dataBase) {
      $this->dataBase= $dataBase;
    }

 public function findAll(): array
 {
  $PDO= $this->dataBase->getConnection();
  $stmt= $PDO->query("SELECT * FROM {$this->getTableName()}");
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
}
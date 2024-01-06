<?php
namespace Framework;

use App\DataBase;
use Framework\Exceptions\PageNotFoundException;
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
  $conn= $this->dataBase->getConnection();
  $stmt= $conn->query("SELECT * FROM {$this->getTableName()}");
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }

 public function find(string $id){
    $conn= $this->dataBase->getConnection();
    $sql="SELECT * FROM {$this->getTableName()} where id = :id";
    $stmt= $conn->prepare($sql);
    $stmt->bindValue(':id',$id, PDO::PARAM_INT);
    $stmt->execute();
   $data= $stmt->fetch(PDO::FETCH_ASSOC);
   if(empty($data))
    throw  new PageNotFoundException ("id not fond");
    return  $data;


 }
}
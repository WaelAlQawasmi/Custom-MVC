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

 public function insert(array $data){
    $this->validation($data);
    if(!empty($this->errors )){
        return false;
    }
    $columns = implode(', ', array_keys($data));
    $placeholder= implode(',', array_fill(0, count($data),"?"));
    $sql ="INSERT INTO {$this->getTableName()} ($columns) values ($placeholder);";
    $conn= $this->dataBase->getConnection();
    $stmt= $conn->prepare($sql);
    $i=1;
    foreach ($data as $value){
        $stmt->bindParam($i++, $value);

    }
    return $stmt->execute();
 }

 public function update(array $data, string $id)
 {
    $this->validation($data);
    if(!empty($this->errors )){
        return false;
    }
    $sql=$this->prepareUpdateQuery($data);
    $i=1;
    $conn= $this->dataBase->getConnection();
    $stmt= $conn->prepare($sql);
    foreach ($data as $value){
          $stmt->bindParam($i++, $value);
  
      }
      $stmt->bindParam($i, $id);
      
      return $stmt->execute();
 }

 private function prepareUpdateQuery(array $data){
    $colums=array_keys($data);
    $sql = "update {$this->getTableName()} set ";
    $index=1;
    foreach ($colums as $colum ){
        if ($index++==count($colums)){
           $sql.= $colum."= ?  ";
        }
        else {
           $sql.= $colum."= ? , ";
        }
      }
      $sql.=" where id= ? ";
      return $sql;
 }

 protected  function  validation(array $data){

 }

 public function getLastInsertedId(){
    $conn= $this->dataBase->getConnection();
    return $conn->lastInsertId();

 }

 protected $errors=[];
 protected function addErrors(string $field, string $message){
   $this->errors[$field]=$message;

 }
 public function getErrors(){
   return $this->errors;
 }


 public function selectAll(array  $columns , array $conditions , array $logics , array $sprators ) {
    $selectedcolumns= implode(',',$columns );
    $query = "SELECT $selectedcolumns FROM {$this->getTableName()}";
    $query.=" where ";
    $i =0;
    foreach ($conditions as $column =>$value){
      $query.="  $column $logics[$i] ? ";
      if (array_key_exists( $i, $sprators)){
        $query.=" $sprators[$i]  ";
      }
      $i++;
    }
    $query.=" ; ";
    $i =1;
    $conn= $this->dataBase->getConnection();
    $stmt= $conn->prepare($query);
    foreach ($conditions as $column =>$value){
      $stmt->bindValue($i++, $value, PDO::PARAM_STR);
    }

  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}
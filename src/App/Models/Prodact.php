<?php 
/**
 * @author Wael Al Qawasmi <wael.alqwasmi@yahoo.com>
 */
namespace App\Models;
use Framework\Model;
class Prodact extends Model {
  protected $tableName="products";
  protected function validation (array $data):void
  {
    if(empty($data['name'])){
      $this->addErrors('name',"this field is required");
    }
  }


}
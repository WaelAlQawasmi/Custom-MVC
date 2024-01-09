<?php 
/**
 * @author Wael Al Qawasmi <wael.alqwasmi@yahoo.com>
 */
namespace App\Models;
use Framework\Model;
class Prodact extends Model {
  protected $tableName="products";
  protected function validation (array $data){
    if(empty($data['name']))
      return false;
    return true;


  }
}
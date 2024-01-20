<?php 
/**
 * @author Wael Al Qawasmi <wael.alqwasmi@yahoo.com>
 */
namespace App\Models;

use Components\AuthComponent;
use Framework\Model;
class User extends Model {
  protected $tableName="users";
  protected function validation (array $data):void
  {
    if(empty($data['email'])){
      $this->addErrors('email',"this field is required");
    }
    if(empty($data['name'])){
      $this->addErrors('name',"this field is required");
    }
    if(empty($data['password'])){
      $this->addErrors('password',"this field is required");
    }
    if( filter_var($data['email'], FILTER_VALIDATE_EMAIL) !== false)
        $this->addErrors('email',"this field should be a valid email address");
    if(!AuthComponent::isStrongPassword($data['password']))
            $this->addErrors('password',"The password should be al lest 8 characters containing integer, lowercase , uppercase and special characters");

    
  }


}
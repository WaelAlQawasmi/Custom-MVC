<?php
/**
 * @author Wael Al Qawasmi <wael.alqwasmi@yahoo.com> 
 */
namespace App\Controllers;

use App\Models\User;
use Framework\controller;
use Framework\Response;

class AuthController extends controller
{
   
   private $user;
   public function  __construct(  User $user ) {
     $this->user=$user;
   }

   public function login() {

    $email=$this->request->post['email'];
    $password=$this->request->post['password'];
    $user=$this->user->selectFirst(['*'],['password'=>hash("sha256", $password), 'email'=>$email],['=','='],['and']);
    if(empty($user)){
      $this->response->setStatusCode(401);
      return $this->redirect("./home");
    }
    $this->response->setStatusCode(200);

    return $this->redirect("./prodacts");





    
      
   }
    public function register() {
        $this->request->post['email'];
        $this->request->post['password'];
      
   }
}
<?php
/**
 * @author Wael Al Qawasmi <wael.alqwasmi@yahoo.com> 
 */
namespace App\Controllers;

use Framework\controller;
use Framework\Response;

class AuthController extends controller
{
 

   public function login() {

    $this->request->post['email'];
    $this->request->post['password'];
      
   }
    public function register() {
        $this->request->post['email'];
        $this->request->post['password'];
      
   }
}
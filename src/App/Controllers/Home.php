<?php
/**
 * @author Wael Al Qawasmi <wael.alqwasmi@yahoo.com> 
 */
namespace App\Controllers;

use Framework\controller;
use Framework\Response;

class Home extends controller
{
   public function index () :Response {
      $_SERVER['PHP_AUTH_USER'] = true;

      echo 'index page '.$_SESSION["favcolor"] ;
      // header('Location: http://www.example.com/');
      
     return $this->redirect("./prodacts");
   }

   public function contactUs() {
      echo 'content us at oyr website';
   }

   public function login() {
      $_SERVER['USER'] = "wael";
      return $this->view ('new');
      
   }
}
<?php
/**
 * @author Wael Al Qawasmi <wael.alqwasmi@yahoo.com> 
 */
namespace App\Controllers;

use Framework\controller;

class Home extends controller
{
   public function index (){
      echo 'index page';
   }

   public function contactUs() {
      echo 'content us at oyr website';
   }
}
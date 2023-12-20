<?php
namespace App\Controllers;
use App\Models\Prodact;
class Prodacts {

 public function index (){
   $Prodact= new Prodact();
   $Prodacts= $Prodact->getData();
   require_once 'Views/Prodacts.php';

 }

}
<?php

class Prodacts {

 public function index (){
   require_once 'Models/Pordact.php';
   $Prodact= new Prodact();
   $Prodacts= $Prodact->getData();
   require_once 'Views/Prodacts.php';

 }

}
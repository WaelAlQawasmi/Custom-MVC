<?php

class Prodacts {

 public function index (){
   require_once 'src/Models/Pordact.php';
   $Prodact= new Prodact();
   $Prodacts= $Prodact->getData();
   require_once 'src/Views/Prodacts.php';

 }

}
<?php
namespace App\Controllers;
use App\Models\Prodact;
use Framework\Viewer;
class Prodacts {

 public function index (){
   $Prodact= new Prodact();
   $Prodacts= $Prodact->getData();
   $viewer= new Viewer();
   $viewer->render('Prodacts');
 }

}
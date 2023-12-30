<?php
namespace App\Controllers;
use App\Models\Prodact;
use COM;
use Framework\Viewer;
class Prodacts {

  private $viewer;
  private $prodact;
  public function  __construct( Viewer $viewer , Prodact $prodact ) {
    $this->viewer=$viewer;
    $this->prodact=$prodact;
  }

  public function index (){
    $Prodacts=$this->prodact->getData();
    $this->viewer->render('Prodacts',['Prodacts'=>$Prodacts]);
  }

}
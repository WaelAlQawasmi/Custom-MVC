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

  public function index ( ){
    $Prodacts=$this->prodact->findAll();
    $this->viewer->render('Prodacts',['Prodacts'=>$Prodacts]);
  }
  public function show (string $id){
    $prodact=$this->prodact->find($id);
    $this->viewer->render('Prodact',['prodact'=>$prodact]);
  }
  public function new(){
    $this->viewer->render('header',['titel'=>'new prodact']);
    $this->viewer->render('new');
  }

}
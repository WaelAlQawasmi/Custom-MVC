<?php
namespace App\Controllers;
use App\Models\Prodact;
use COM;
use Framework\controller;
use Framework\Viewer;
class Prodacts extends controller {
 
  private $prodact;
  public function  __construct(  Prodact $prodact ) {
    $this->prodact=$prodact;
  }

  public function index (){
    $this->viewer->render('header',['titel'=>'new prodact']);

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

  public function create(){
    $data=['name'=>$this->request->post['name']];
    if( $this->prodact->insert($data)){
      header("Location: {$this->prodact->getLastInsertedId()}/show");
      echo "data inserted successfully with ID {$this->prodact->getLastInsertedId()}";

    }
    else{
      $this->viewer->render('header',['titel'=>'new prodact', 'errors'=>$this->prodact->getErrors()]);
      $this->viewer->render('new');
    }
   
  }
  public function update(string $id){
    $prodact=$this->prodact->find($id);
    $data=['name'=>$this->request->post['name']];
    $this->prodact->update( $data ,$id);
    header("Location: show");


  }
  public function edit(string $id){
    $this->viewer->render('header',['titel'=>'new prodact']);
    $prodact=$this->prodact->find($id);
    $this->viewer->render('new',['prodact'=>$prodact]);


  }

}
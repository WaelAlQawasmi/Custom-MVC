<?php
namespace App\Controllers;
use App\Models\Prodact;
use COM;
use Framework\controller;
use Framework\Response;
use Framework\Viewer;
class Prodacts extends controller {
 
  private $prodact;
  public function  __construct(  Prodact $prodact ) {
    $this->prodact=$prodact;
  }

  public function index ():Response {
    //$Prodacts=$this->prodact->selectAll(['name','description'],['name'=>'500', 'description'=>'300'],['=','='],['and']);
    $this->response->setBody($this->viewer->render('header',['titel'=>'new prodact'])); 
    
    $this->response->send();
    $Prodacts=$this->prodact->findAll();
    return $this->view('Prodacts',['Prodacts'=>$Prodacts]);
  }
  public function show (string $id) : Response{
    $prodact=$this->prodact->find($id);
    return $this->view('Prodact',['prodact'=>$prodact]);
  }
  public function new(){
    return $this->view('new');

  }

  public function create():Response{
    $data=['name'=>$this->request->post['name']];
    if( $this->prodact->insert($data)){
      header("Location: {$this->prodact->getLastInsertedId()}/show");
      echo "data inserted successfully with ID {$this->prodact->getLastInsertedId()}";
      $this->response->setStatusCode(201);
      return $this->show($this->prodact->getLastInsertedId());

    }
    else{
      $this->viewer->render('header',['titel'=>'new prodact', 'errors'=>$this->prodact->getErrors()]);
      return $this->new();
    }
   
  }
  public function update(string $id):Response{
    $prodact=$this->prodact->find($id);
    $data=['name'=>$this->request->post['name']];
    $this->prodact->update( $data ,$id);
    return $this->show($id);
  }
  public function edit(string $id):Response{
    $this->viewer->render('header',['titel'=>'new prodact']);
    $prodact=$this->prodact->find($id);
    return $this->view('new',['prodact'=>$prodact]);



  }

}
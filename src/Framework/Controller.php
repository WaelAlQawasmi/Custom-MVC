<?php
namespace Framework;

use Framework\Request;
abstract class controller {
    protected $request;
    protected $viewer;
    public function setRequest(Request $request){
      $this->request = $request;
    }
    public function setViewer (Viewer $viewer){
        $this->viewer=$viewer;

    }
}
<?php
namespace Framework;

use Framework\Request;
abstract class controller {
    protected  Request $request;
    protected TemplateViewerInterface $viewer;
    public function setRequest(Request $request){
      $this->request = $request;
    }
    public function setViewer (TemplateViewerInterface $viewer){
        $this->viewer=$viewer;

    }
}
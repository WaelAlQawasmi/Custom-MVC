<?php
namespace Framework;

use Framework\Request;
abstract class controller {
    protected  Request $request;
    protected Response $response;
    protected TemplateViewerInterface $viewer;

    public function setRequest(Request $request){
      $this->request = $request;
    }
    public function setResponse(Response $response){
        $this->response = $response;

    }
    public function setViewer (TemplateViewerInterface $viewer){
        $this->viewer=$viewer;

    }
}
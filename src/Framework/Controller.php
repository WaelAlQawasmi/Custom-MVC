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

    protected function view( string $template, Array $data=[]) :Response{
        $this->response->setBody($this->viewer->render($template,$data));
        return $this->response;
    }

    protected function redirect(string $url) :Response{
        $this->response->redirect($url);
       return $this->response;
    }
}
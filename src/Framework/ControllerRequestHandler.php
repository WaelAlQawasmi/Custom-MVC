<?php
namespace Framework;
class ControllerRequestHandler implements RequestHandlerInterface {
    private $controller;
    private $action;
    private $arguments;
    public function __construct( Controller $controller, string $action,array $arguments ){
        $this->controller = $controller;
        $this->action = $action;
        $this->arguments=$arguments;

    }
    public function handle( Request $request) :Response {
        $this->controller->setRequest( $request) ;

        return $this->controller-> $this->action(...array_values($this->arguments));
    }
 
}
<?php
namespace Framework ;
class MiddlewareRequestHandler implements RequestHandlerInterface {
    private array $middlewares ;
    private ControllerRequestHandler $controller;

    public function __construct(ControllerRequestHandler $controller, array $middlewares){
        $this->middlewares=$middlewares;
        $this->controller=$controller;
    }
    public function handle( Request $request) :Response {
       $middleware= array_shift($this->middlewares);
       if ($middleware === null){
        return $this->controller->handle($request);
       }
       return $middleware->process($request,$this);
    }

}
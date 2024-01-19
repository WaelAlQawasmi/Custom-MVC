<?php
namespace Framework ;
class MiddlewareRequestHandler implements RequestHandlerInterface {
    private array $middlewares ;
    private controller $controller;

    public function __construct($controller, $middlewares){
        $this->middlewares=$middlewares;
        $this->controller=$controller;
    }
    public function handle( Request $request) :Response {
        return new Response($request);
    }

}
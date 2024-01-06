<?php
namespace Framework;

use Framework\Exceptions\PageNotFoundException;
use ReflectionMethod;


class Dispatcher {
   public $router;
   public $container;
   public function __construct( Router $router, Container $container)
   {
      $this->router= $router;
      $this->container= $container;

   }

   public function handle($path){
      $pathParameters=$this->router->match($path);
      if (!$pathParameters)
         throw new PageNotFoundException("$path is not a valid");
      $controller=$this->getController($pathParameters);
      $controllerObject = $this->container->get($controller); 
      $action=$this->getAction($pathParameters);
      $args = $this->getActionArguments($controller, $action, $pathParameters);      
      $controllerObject->$action(...array_values($args));

   }

   private  function getController ($pathParameters)
   {
      $controller = $pathParameters["controller"];
      $controller = str_replace("-", "", ucwords(strtolower($controller), "-"));
      $namespace= "App\Controllers";
      if (array_key_exists("namespace", $pathParameters)) {
       $namespace .= "\\" . $pathParameters["namespace"];
      }
      return $namespace . "\\" . $controller;
   }

   private function getAction($pathParameters){
      $action = $pathParameters["action"]; 
      $action = str_replace("-", "", ucwords(strtolower($action), "-"));
      return lcfirst($action);
   }


   private function getActionArguments(string $controller, string $action, array $params): array
   {
      print_r($params);
      $args = [];
      $method = new ReflectionMethod($controller, $action);
       foreach ($method->getParameters() as $parameter) {
         $name = $parameter->getName();
         $args[$name] = $params[$name];
       }
       print_r($args);
      return $args;
   }
}
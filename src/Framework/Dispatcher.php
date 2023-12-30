<?php
namespace Framework;
use ReflectionMethod;
use Framework\Viewer;
use ReflectionClass;

class Dispatcher {
   public $router;
   public function __construct( Router $router)
   {
      $this->router= $router;

   }

   public function handle($path){
      $pathParameters=$this->router->match($path);
      if (!$pathParameters)
         exit( '404 The Page Not Found');
      $controller=$this->getController($pathParameters);
      $controllerObject = $this->getObject($controller); 
      $action=$this->getAction($pathParameters);
      $args = $this->getActionArguments($controller, $action, $pathParameters);
      $controllerObject->$action(...$args);

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

   private function getObject($className){
      $reflecter = new ReflectionClass($className);
      $constructor=$reflecter->getConstructor();
      $depandancies= [];
      if ($constructor === null) {
         return new  $className;
      }
      foreach($constructor->getParameters() as $parameter){
         $type=(string) $parameter->getType();
         $depandancies[]=  $this->getObject($type);
      }
      $controllerObject = new  $className(...$depandancies);
      return  $controllerObject;

   }

   private function getActionArguments(string $controller, string $action, array $params): array
   {
      $args = [];
      $method = new ReflectionMethod($controller, $action);
       foreach ($method->getParameters() as $parameter) {
         $name = $parameter->getName();
         $args[$name] = $params[$name];
       }
      return $args;
   }
}
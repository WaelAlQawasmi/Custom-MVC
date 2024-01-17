<?php
namespace Framework;

use Framework\Exceptions\PageNotFoundException;
use ReflectionMethod;
use UnexpectedValueException;

class Dispatcher {
   public $router;
   public $container;
   public function __construct( Router $router, Container $container)
   {
      $this->router= $router;
      $this->container= $container;

   }

   public function handle( Request $request) :Response{

      $path=$this->getPath($request->uri);

      $pathParameters=$this->router->match($path, $request->method);
      if (!$pathParameters)
         throw new PageNotFoundException("$path is not a valid");
      $controller=$this->getController($pathParameters);
      $controllerObject = $this->container->get($controller);
      $controllerObject->setRequest( $request) ;
      $controllerObject->setResponse( new Response()) ;
      $controllerObject->setViewer( $this->container->get(TemplateViewerInterface::class));
      $action=$this->getAction($pathParameters);
      $args = $this->getActionArguments($controller, $action, $pathParameters);      
     return $controllerObject->$action(...array_values($args));

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
      $args = [];
      $method = new ReflectionMethod($controller, $action);
       foreach ($method->getParameters() as $parameter) {
         $name = $parameter->getName();
         $args[$name] = $params[$name];
       }
      return $args;
   }
   private function getPath(string $uri){
      // to get path without query string
      $path= parse_url($uri, PHP_URL_PATH);
      if ($path==false){
         throw new UnexpectedValueException("error path {$uri}");
      }
      // Get the directory where the PHP script is located
      $scriptDirectory = dirname($_SERVER['SCRIPT_NAME']);
      // Remove the script directory from the full URL
      $path = str_replace($scriptDirectory, '', $path);
      return $path;
   }
}
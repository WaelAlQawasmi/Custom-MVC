<?php
namespace  Framework;
class Router {
private  $routes;

   public  function add(string $path, array $params =[]): void {
      $this->routes []= [
         'path' => $path,
         'params'=>$params,
      ];
   }

   public function match(string $path) {
      $path = urldecode($path);
      $path = trim($path, "/");
      foreach ($this->routes as $route) {
         if (strtolower($route['path']) == $path) {
            return $route['params'];
         }
      }
   
      return false;
   }
}
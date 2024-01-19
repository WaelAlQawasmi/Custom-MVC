<?php
$router= new Framework\Router();
$router->add('/prodacts',['controller' => 'prodacts', 'action' =>'index']);
$router->add('/home/contactus',['controller' => 'home', 'action' =>'contactus']);
$router->add('/',['controller' => 'home', 'action' =>'index']);
//$router->add("/{controller}/{id:\d+}/{action}");
$router->add("/{controller}/{id:\d+}/show",array('action' =>'show', 'method'=>'GET', 'middleware'=>'changeResponse|Authentication'));
$router->add("/{controller}/{id:\d+}/edit",array('action' =>'edit', 'method'=>'GET'));
$router->add("/{controller}/create",array('action' =>'create', 'method'=>'POST'));
$router->add("/{controller}/",array('action' =>'index'));
$router->add("/home/login",array('action' =>'login','controller' => 'home'));
$router->add("/{controller}/{id:\d+}/update",array('action' =>'update', 'method'=>'POST'));

$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);
$router->add("/{title}/{id:\d+}/{page:\d+}", ["controller" => "products", "action" => "showPage"]);
$router->add("/product/{slug:[\w-]+}", ["controller" => "products", "action" => "show"]);
$router->add("/{controller}/{id:\d+}/{action}");
$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/products", ["controller" => "products", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/{controller}/{action}");

return $router;
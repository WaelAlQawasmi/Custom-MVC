<?php
$router= new Framework\Router();
$router->add('/prodacts',['controller' => 'prodacts', 'action' =>'index']);
$router->add('/home/contactus',['controller' => 'home', 'action' =>'contactus']);
$router->add('/',['controller' => 'home', 'action' =>'index']);

return $router;
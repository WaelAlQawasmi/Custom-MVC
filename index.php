
<?php
/**
 * @copyright 2023 Wael Al Qawasmi
 * @author Wael Al Qawasmi <wael.alqwasmi@yahoo.com>
 */

use Framework\Dispatcher;

// to get path without query string
$path= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Get the directory where the PHP script is located
$scriptDirectory = dirname($_SERVER['SCRIPT_NAME']);
// Remove the script directory from the full URL
$path = str_replace($scriptDirectory, '', $path);


spl_autoload_register(function (string $className){
   require("src/". str_replace('\\', '/', $className) . '.php');
});


$router= new Framework\Router();
$router->add('/prodacts',['controller' => 'prodacts', 'action' =>'index']);
$router->add('/home/contactus',['controller' => 'home', 'action' =>'contactus']);
$router->add('/',['controller' => 'home', 'action' =>'index']);

$dispatcher= new Framework\Dispatcher($router);
$dispatcher->handle($path);
 
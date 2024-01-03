
<?php
/**
 * @copyright 2023 Wael Al Qawasmi
 * @author Wael Al Qawasmi <wael.alqwasmi@yahoo.com>
 */

use App\DataBase;
use Framework\Container;
use Framework\Dispatcher;
use Framework\Exceptions\ErrorHandler;
use Framework\Exceptions\PageNotFoundException;



spl_autoload_register(function (string $className){
   require("src/". str_replace('\\', '/', $className) . '.php');
});

set_error_handler("Framework\Exceptions\ErrorHandler::handleError");

set_exception_handler( function (Throwable $exception){

   if($exception instanceof PageNotFoundException)
      {
         http_response_code(404);
         $template="error404.php";
      
      }
   else
      {
         http_response_code(500);
         $template="error500.php";
      }
   $showError= false;
   ini_set("display_errors",$showError);
   if($showError){
      require "./Views/$template";
   }
   ini_set('log_errors',true);
   ini_set('error_log', './php_errors.log');
});


// to get path without query string
$path= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($path==false){
  throw new UnexpectedValueException("error path {$_SERVER['REQUEST_URI']}");
}

// Get the directory where the PHP script is located
$scriptDirectory = dirname($_SERVER['SCRIPT_NAME']);
// Remove the script directory from the full URL
$path = str_replace($scriptDirectory, '', $path);



$router= new Framework\Router();
$router->add('/prodacts',['controller' => 'prodacts', 'action' =>'index']);
$router->add('/home/contactus',['controller' => 'home', 'action' =>'contactus']);
$router->add('/',['controller' => 'home', 'action' =>'index']);

$Container= new Container;
$Container->set(App\DataBase::class,function (){
   return new DataBase('localhost','company','root','');
} );
$dispatcher= new Framework\Dispatcher($router,$Container);
$dispatcher->handle($path);
 

<?php
/**
 * @copyright 2023 Wael Al Qawasmi
 * @author Wael Al Qawasmi <wael.alqwasmi@yahoo.com>
 */

use App\DataBase;
use Framework\Container;
use Framework\Dispatcher;
define("ROOT_PATH", dirname(__DIR__));


spl_autoload_register(function (string $className){
   require( ROOT_PATH . "/src/". str_replace('\\', '/', $className) . '.php');
});
require_once(__DIR__ . '/../vendor/autoload.php');

// Load environment variables from .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
ini_set("display_errors",$_ENV['SHOW_ERRORS']);

//set_error_handler("Framework\Exceptions\ErrorHandler::handleError");

set_exception_handler("Framework\Exceptions\ErrorHandler::exeptionHandler");


// to get path without query string
$path= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($path==false){
  throw new UnexpectedValueException("error path {$_SERVER['REQUEST_URI']}");
}

// Get the directory where the PHP script is located
$scriptDirectory = dirname($_SERVER['SCRIPT_NAME']);
// Remove the script directory from the full URL
$path = str_replace($scriptDirectory, '', $path);

$router= require ROOT_PATH . "/config/routes.php";
$Container= require  ROOT_PATH . "/config/services.php";

$dispatcher= new Dispatcher($router,$Container);
$dispatcher->handle($path);

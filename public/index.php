
<?php
/**
 * @copyright 2023 Wael Al Qawasmi
 * @author Wael Al Qawasmi <wael.alqwasmi@yahoo.com>
 */


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
ini_set('log_errors',true);
ini_set('error_log','./php_errors.log');

$router= require ROOT_PATH . "/config/routes.php";
$container= require  ROOT_PATH . "/config/services.php";
$middlewares= require  ROOT_PATH . "/config/Middlewares.php";
$request=  Framework\Request::createGlobalForm();



$dispatcher = new Framework\Dispatcher($router, $container,$middlewares);
//header("Content-Security-Policy: form-action 'self'");
//header("Content-Security-Policy: default-src 'self'; script-src 'self' ; style-src 'self' 'unsafe-inline'; form-action 'self' ");

$response=$dispatcher->handle($request);
$response->send();

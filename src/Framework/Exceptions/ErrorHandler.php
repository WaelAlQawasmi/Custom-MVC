<?php
// declare(strict_types=1);
namespace Framework\Exceptions;

use ErrorException;
use Throwable;
use Framework\Exceptions\PageNotFoundException;

class ErrorHandler{
    
    // public static function handleError(String $errorMessage,  int $errorNumber, string $errorFile, int $errorLine){
    //     throw new ErrorException($errorMessage,0,$errorNumber,$errorFile,$errorLine);
    // }

    public static function exeptionHandler(Throwable $exception){

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
        $showError= $_ENV['SHOW_ERRORS'];
        if($showError){
        }{
            require dirname(__DIR__, 3). "/Views/$template";
        }
        throw  $exception;

        ini_set('log_errors',true);
        // ini_set('error_log', dirname(__DIR__, 3).'/php_errors.log');
     }
}
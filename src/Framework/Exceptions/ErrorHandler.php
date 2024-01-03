<?php
// declare(strict_types=1);
namespace Framework\Exceptions;

use ErrorException;

class ErrorHandler{
    public static function handleError(String $errorMessage, int $errorNumber, string $errorFile, int $errorLine){
        throw new ErrorException($errorMessage,0,$errorNumber,$errorFile,$errorLine);
    }
}
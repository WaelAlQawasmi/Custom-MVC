<?php

use Framework\Request;
use Framework\RequestHandlerInterface;
use Framework\Response;
namespace Framework;
interface MiddlewareInterface {

    public function process(Request $request ,RequestHandlerInterface $next): Response;
}


















<?php
namespace  App\Middleware;

use Framework\Request;
use Framework\RequestHandlerInterface;
use Framework\Response;
use Framework\MiddlewareInterface;

class Authentication implements MiddlewareInterface {

    public function process(Request $request ,RequestHandlerInterface $next): Response{
        if (!isset($_SESSION['user'])) {
            $response = new Response($request);
            $response->redirect("./login");
            return  $response;
        }
        $response= $next->handle($request);
        return $response;

    }


}
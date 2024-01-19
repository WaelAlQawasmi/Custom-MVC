<?php
namespace Framework;
class Request {

    public $uri, $method , $get, $post,$files,$cookie,$server;
    public function __construct (string $uri ,string $method  , array $get,array $post,array $files,array $cookie,array $server){
        $this->uri = $uri;
        $this->method=$method;
        $this->get = $get;
        $this->post=$post;
        $this->files = $files;
        $this->cookie=$cookie;
        $this->server=$server;

    }

    public static function createGlobalForm(){
        session_start();

        return new static($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD'], $_GET, $_POST, $_FILES, $_COOKIE , $_SERVER );
    }
}
<?php
namespace Framework;
class Response {
    private string $body;

    public function setBody( string $body){
        $this->body = $body;
    }

    public function getBody(  ){
        return $this->body ;
    }
    public function send (){
        echo $this->body;
    }
}
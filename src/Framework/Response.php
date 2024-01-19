<?php
namespace Framework;
class Response {
    private array $headers= [];
    private string $body;
    private int $status_code=0;
    public function setStatusCode( int $status){
        $this->status_code = $status;
    }
    public function AddHeader(string $header) {
        $this->headers []= $header;
    }
    public function setBody( string $body){
        $this->body = $body;
    }

    public function getBody(){
        return  isset($this->body)? $this->body :null;
    }
    public function send (){
        if($this->status_code !=0 ){
            http_response_code( $this->status_code );
        }
        foreach($this->headers as $header ){
            header($header);
        }
        echo isset($this->body)? $this->body : "you will redirect shortly...";
        
    }

    public function redirect(string $url){ 
        $this->AddHeader("Location: $url");
    }
}
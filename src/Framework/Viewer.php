<?php
namespace Framework;
class Viewer {

    public function render ( string $template, array $params=[]){
        extract($params, EXTR_SKIP);
        require_once 'Views/'.$template.'.php';
    }
}
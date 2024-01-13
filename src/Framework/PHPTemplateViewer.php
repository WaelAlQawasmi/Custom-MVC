<?php
namespace Framework;
class PHPTemplateViewer implements TemplateViewerInterface {

    public function render ( string $template, array $params=[]){
        extract($params, EXTR_SKIP);
        require_once dirname(__DIR__, 2) . '/Views/'.$template.'.php';
    }
}
<?php
namespace Framework;
class WARDTemplateViewer implements TemplateViewerInterface {

    public function render ( string $template, array $params=[]){
        extract($params, EXTR_SKIP);
        $code=file_get_contents(dirname(__DIR__, 2) .'/Views/'.$template.'.ward.php');
        $code= $this->replaceVariables($code);
        eval(" ?> $code" );
       // require_once dirname(__DIR__, 2) . '/Views/'.$template.'.ward.php';
    }

    private function replaceVariables($code){
      
        $pattern = '#{{\s*(\S+)\s*}}#';
    
      return  preg_replace($pattern," <?=htmlspecialchars(\$$1) ?>", $code);
      
    }
}
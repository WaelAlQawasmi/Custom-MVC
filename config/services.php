<?php

use App\DataBase;
use Framework\Container;
use Framework\TemplateViewerInterface;
use Framework\WARDTemplateViewer;

$Container= new Container;
$Container->set(DataBase::class,function (){
   return new DataBase($_ENV['DB_HOST'],$_ENV['DB_NAME'],$_ENV['DB_USER'],$_ENV['DB_PASSWORD']);
} );
$Container->set(TemplateViewerInterface::class,function (){
   return new WARDTemplateViewer();
} );
return $Container;
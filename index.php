
<?php
// to get path without query string
$path= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathArray= explode('/',$path);

// the path should be in this format => controller/action
$controller=$pathArray[2];
$action=$pathArray[3];



require "Controllers/$controller.php";
$controllerObject = new $controller();

$controllerObject->$action();

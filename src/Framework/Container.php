<?php
declare(strict_types=1);
namespace Framework;

use Closure;
use Exception;
use ReflectionClass;

class Container {
    private array $regestry = array();
    public function set (string $name, Closure $value){
        $this->regestry[$name] = $value;

     
    }
    public function get ($className){
        if (array_key_exists($className, $this->regestry))
            return $this->regestry[$className]();
        $reflecter = new ReflectionClass($className);
        $constructor=$reflecter->getConstructor();
        $depandancies= [];
        if ($constructor === null) {
            return new  $className;
        }
        foreach($constructor->getParameters() as $parameter){
            $type=$parameter->getType();
            if($type=== null)
             throw new Exception ("Constructer parameter {$parameter->getName()} in the class $className class has no type declaration ");

            $depandancies[]=  $this->get((string) $type);
        }
        $controllerObject = new  $className(...$depandancies);
        return  $controllerObject;
      
         
    }
}
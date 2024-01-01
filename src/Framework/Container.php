<?php
declare(strict_types=1);
namespace Framework;

use Closure;
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
            $type=(string) $parameter->getType();

            $depandancies[]=  $this->get($type);
        }
        $controllerObject = new  $className(...$depandancies);
        return  $controllerObject;
      
         
    }
}
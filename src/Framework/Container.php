<?php
namespace Framework;

use ReflectionClass;

class Container {
    public function get ($className){
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
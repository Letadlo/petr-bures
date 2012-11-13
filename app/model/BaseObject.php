<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseObject
 *
 * @author opravil.jan
 */
class BaseObject extends \Nette\Object {
    //put your code here
    
    /**
     *
     * @var \Nette\DI\Container 
     */
    protected $container;
    
    public function __construct(\Nette\DI\Container $container = null) {
        if ($container !== null) {
            $this->container = new Nette\DI\Container;
            $methods = $this->getReflection()->getMethods();
            foreach ($methods as $method) {
                $services = $this->getReflection()->getMethod($method->name)->getAnnotations();
                foreach ($services as $items) {
                    foreach ($items as $service) {
                        if (Nette\Utils\Strings::startsWith($service, "service")) {
                            if ($this->container->hasService($service) !== true) {
                                $this->container->addService($service, $container->{$service});
                            }
                        }
                    }
                }
            }
            $this->container->freeze();
        }

        
        
    }

    public function __sleep() {
        $list = array();
        foreach ($this->getReflection()->getProperties() as $property) {
            if ($property->name != "container") {
                $list[] = $property->name;
            }
        }
        return $list;
    }



}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseMapper
 *
 * @author opravil.jan
 */
abstract class BaseMapper extends Nette\Object {
    //put your code here

    /**
     *
     * @var \Nette\DI\Container 
     */
    protected $container;


    public function __construct(\Nette\DI\Container $container) {
        $this->container = $container;
    }

    public function begin() {
        $this->container->getService("nette.database.default")->beginTransaction();
    }

    public function commit() {
        $this->container->getService("nette.database.default")->commit();
    }
}
?>

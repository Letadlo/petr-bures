<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseService
 *
 * @author opravil.jan
 */
abstract class BaseService extends \Nette\Object {

    //put your code here

    protected $mapper;

    public function __construct($mapper) {
        $this->mapper = $mapper;
    }

}

?>

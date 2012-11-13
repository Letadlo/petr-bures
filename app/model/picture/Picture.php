<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Picture
 *
 * @author opravil.jan
 */
class Picture extends \BaseObject {

    //put your code here

    private $idPicture;
    private $public;
    private $allowed;
    private $idEvent;
    private $lastUpdate;
    /**
     *
     * @var String
     */
    private $sort;
    /**
     *
     * @var Boolean 
     */
    private $slide;

    public function __construct(\Nette\DI\Container $container = null) {
        parent::__construct($container);
    }
    
    public function getIdPicture() {
        return $this->idPicture;
    }

    public function setIdPicture($idPicture) {
        $this->idPicture = $idPicture;
    }

    public function getPublic() {
        return $this->public;
    }

    public function setPublic($public) {
        $this->public = $public;
    }

    public function getAllowed() {
        return $this->allowed;
    }

    public function setAllowed($allowed) {
        $this->allowed = $allowed;
    }

    public function getIdEvent() {
        return $this->idEvent;
    }

    public function setIdEvent($idEvent) {
        $this->idEvent = $idEvent;
    }

    public function getLastUpdate() {
        return $this->lastUpdate;
    }

    public function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
    }

    public function getSort() {
        return $this->sort;
    }

    public function setSort($sort) {
        $this->sort = $sort;
    }

    public function getSlide() {
        return $this->slide;
    }

    public function setSlide($slide) {
        $this->slide = $slide;
    }

    /**
     * @service serviceFile
     * @return Nette\ArrayHash
     */
    public function getFile(){
        return $this->container->serviceFile->getByIdPicture($this->idPicture);
    }


}

?>

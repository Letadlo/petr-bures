<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * @author opravil.jan
 */
namespace Event;

class Event extends \BaseObject {
    //put your code here
    
    private $idEvent;
    private $idPlace;
    private $lastUpdate;
    private $date;
    private $name;
    private $link;
    private $public;
    private $allowed;
    private $idFile;
    
    public function __construct(\Nette\DI\Container $container = null) {
        parent::__construct($container);
    }

    public function getIdEvent() {
        return $this->idEvent;
    }

    public function setIdEvent($idEvent) {
        $this->idEvent = $idEvent;
    }

    public function getIdPlace() {
        return $this->idPlace;
    }

    public function setIdPlace($idPlace) {
        $this->idPlace = $idPlace;
    }

    public function getLastUpdate() {
        return $this->lastUpdate;
    }

    public function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getLink() {
        return $this->link;
    }

    public function setLink($link) {
        $this->link = $link;
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

    public function getFile(){
        return $this->serviceFile->get($this->idFile);
    }

    /**
     * @service servicePicture
     * @return \Nette\ArrayHash
     */
    public function getPictures(){
        return $this->container->servicePicture->getByIdEvent($this->idEvent);
    }
    
    /**
     * @service servicePicture
     * @return \Nette\ArrayHash
     */
    public function getAllowedPictures(Nette\Utils\Paginator $paginator){
        return $this->container->servicePicture->getAllowedByIdEvent($paginator,$this->idEvent);
    }
    
    /**
     * @service servicePicture
     * @return \Nette\ArrayHash
     */
    public function getPublicPictures(Nette\Utils\Paginator $paginator){
        return $this->container->servicePicture->getPublicByIdEvent($paginator,$this->idEvent);
    }
}

?>

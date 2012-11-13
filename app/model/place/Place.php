<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Place
 *
 * @author opravil.jan
 */
class Place extends \Nette\Object {

    //put your code here

    private $idPlace;
    private $name;
    private $link;
    private $lastUpdate;
    private $allowed;
    private $public;
    private $present;

    /**
     *
     * @var ServiceEvent 
     */
    private $serviceEvent;

    /**
     *
     * @var ServiceFile 
     */
    private $serviceFile;

    public function __construct() {
        
    }

    public function getIdPlace() {
        return $this->idPlace;
    }

    public function setIdPlace($idPlace) {
        $this->idPlace = $idPlace;
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

    public function getLastUpdate() {
        return $this->lastUpdate;
    }

    public function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
    }

    public function getAllowed() {
        return $this->allowed;
    }

    public function setAllowed($allowed) {
        $this->allowed = $allowed;
    }

    public function getPublic() {
        return $this->public;
    }

    public function setPublic($public) {
        $this->public = $public;
    }

    public function getPresent() {
        return $this->present;
    }

    public function setPresent($present) {
        $this->present = $present;
    }

    public function setServiceEvent(ServiceEvent $serviceEvent) {
        $this->serviceEvent = $serviceEvent;
    }

    public function setServiceFile(ServiceFile $serviceFile) {
        $this->serviceFile = $serviceFile;
    }

    public function getLogo() {
        return $this->serviceFile->getByIdPlace($this->idPlace);
    }

    public function getEvents() {
        return $this->serviceEvent->getByIdPlace($this->idPlace);
    }

    public function getPublicEvents() {
        return $this->serviceEvent->getPublicByIdPlace($this->idPlace);
    }

    public function getAllowedEvents() {
        return $this->serviceEvent->getAllowedByIdPlace($this->idPlace);
    }

}

?>

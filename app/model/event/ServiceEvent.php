<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServiceEvent
 *
 * @author opravil.jan
 */
namespace Event;

class ServiceEvent extends \BaseService {
    //put your code here

    /**
     *
     * @var ServiceFile 
     */
    private $serviceFile;

    public function __construct(MapperEvent $mapper, ServiceFile $serviceFile) {
        parent::__construct($mapper);
        $this->serviceFile = $serviceFile;
    }

    public function save(Event $event, $commit = false) {
        if ($commit === true) {
            $this->mapper->begin();
        }

        $event = $this->mapper->save($event);
        /*
          if ($event->getLogo() !== null) {
          $event->getLogo()->setIdEvent($event->getIdEvent());
          $this->serviceFile->save($event->getLogo());
          }
         */
        if ($commit === true) {
            $this->mapper->commit();
        }

        return $event;
    }

    public function update(Event $event, $commit = false) {
        if ($commit === true) {
            $this->mapper->begin();
        }

        $this->mapper->update($event);
        /*
          if ($event->getLogo() !== null) {
          if ($event->getLogo()->getIdFile() !== null) {
          $this->serviceFile->deleteCache($event->getLogo()->getIdFile());
          $this->serviceFile->update($event->getLogo());
          } else {
          $event->getLogo()->setIdEvent($event->getIdEvent());
          $this->serviceFile->save($event->getLogo());
          }
          }
         */
        if ($commit === true) {
            $this->mapper->commit();
        }
    }

    public function delete(Event $event, $commit = false) {
        if ($commit === true) {
            $this->mapper->begin();
        }

        $this->mapper->delete($event);

        if ($commit === true) {
            $this->mapper->commit();
        }
    }

    private function fetch(Event $event) {
        return $event;
    }

    public function get($id) {
        $event = $this->mapper->get($id);
        if ($event !== null) {
            $event = $this->fetch($event);
        }
        return $event;
    }

    public function getAll() {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getAll() as $event) {
            $event = $this->fetch($event);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }

    public function getByIdPlace($idPlace) {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getByIdPlace($idPlace) as $event) {
            $event = $this->fetch($event);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }

    public function getPublicByIdPlace($idPlace) {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getPublicByIdPlace($idPlace) as $event) {
            $event = $this->fetch($event);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }

    public function getAllowedByIdPlace($idPlace) {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getPublicByIdPlace($idPlace) as $event) {
            $event = $this->fetch($event);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }

    public function getByLink($link) {
        $event = $this->mapper->getByLink($link);
        if ($event !== null) {
            $event = $this->fetch($event);
        }
        return $event;
    }

    public function getPublicEvent($from, $to) {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getPublicEvent($from, $to) as $event) {
            $event = $this->fetch($event);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }

    public function getAllowedEvent($from, $to) {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getAllowedEvent($from, $to) as $event) {
            $event = $this->fetch($event);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }

    public function getCountByIdPlace($idPlace) {
        return $this->mapper->getCountByIdPlace($idPlace);
    }

    public function getLastPublic($count) {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getLastPublic($count) as $event) {
            $event = $this->fetch($event);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }

}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServicePlace
 *
 * @author opravil.jan
 */
use Nette\Diagnostics\Debugger;

class ServicePlace extends \BaseService {
    //put your code here

    /**
     *
     * @var ServiceFile 
     */
    private $serviceFile;

    public function __construct(MapperPlace $mapper, ServiceFile $serviceFile) {
        parent::__construct($mapper);
        $this->serviceFile = $serviceFile;
    }

    public function save(Place $place, $commit = false) {
        if ($commit === true) {
            $this->mapper->begin();
        }

        $place = $this->mapper->save($place);
        
        if ($commit === true) {
            $this->mapper->commit();
        }
        return $place;
    }

    public function update(Place $place, $commit = false) {
        if ($commit === true) {
            $this->mapper->begin();
        }

        $this->mapper->update($place);
        /*
          if ($place->getLogo() !== null) {
          if ($place->getLogo()->getIdFile() !== null) {
          $this->serviceFile->deleteCache($place->getLogo()->getIdFile());
          $this->serviceFile->update($place->getLogo());
          } else {
          $place->getLogo()->setIdPlace($place->getIdPlace());
          $this->serviceFile->save($place->getLogo());
          }
          }
         */
        if ($commit === true) {
            $this->mapper->commit();
        }
    }

    public function delete(Place $place, $commit = false) {
        if ($commit === true) {
            $this->mapper->begin();
        }

        $this->mapper->delete($place);

        if ($commit === true) {
            $this->mapper->commit();
        }
    }

    private function fetch(Place $place) {
        return $place;
    }

    public function get($id) {
        $place = $this->mapper->get($id);
        if ($place !== null) {
            $place = $this->fetch($place);
        }
        return $place;
    }

    public function getAll() {
        $list = new \Nette\ArrayHash();
        foreach ($this->mapper->getAll() as $place) {
            $place = $this->fetch($place);
            $list->offsetSet($place->getIdPlace(), $place);
        }
        return $list;
    }

    public function getByLink($link) {
        $place = $this->mapper->getByLink($link);
        if ($place !== null) {
            $place = $this->fetch($place);
        }
        return $place;
    }

    public function getPublic($present = true) {
        $list = new \Nette\ArrayHash();
        foreach ($this->mapper->getPublic($present) as $place) {
            $place = $this->fetch($place);
            $list->offsetSet($place->getIdPlace(), $place);
        }
        return $list;
    }

    public function getAllowed($present = true) {
        $list = new \Nette\ArrayHash();
        foreach ($this->mapper->getAllowed($present) as $place) {
            $place = $this->fetch($place);
            $list->offsetSet($place->getIdPlace(), $place);
        }
        return $list;
    }

}

?>

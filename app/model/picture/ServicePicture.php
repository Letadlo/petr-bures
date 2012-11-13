<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServicePicture
 *
 * @author opravil.jan
 */
class ServicePicture extends \BaseService {
    //put your code here

    /**
     *
     * @var ServiceFile 
     */
    private $serviceFile;
    
    public function __construct(MapperPicture $mapper,  ServiceFile $serviceFile) {
        parent::__construct($mapper);
    }

    public function save(Picture $picture, $commit = false) {
        if ($commit === true) {
            $this->mapper->begin();
        }

        $picture = $this->mapper->save($picture);
/*
        if ($picture->getFile() !== null) {
            $picture->getFile()->setIdPicture($picture->getIdPicture());
            $this->serviceFile->save($picture->getFile());
        }
*/
        if ($commit === true) {
            $this->mapper->commit();
        }

        return $picture;
    }

    public function update(Picture $picture, $commit = false) {
        if ($commit === true) {
            $this->mapper->begin();
        }

        $this->mapper->update($picture);
/*
        if ($picture->getFile() !== null) {
            if ($picture->getFile()->getIdFile() !== null) {
                $this->serviceFile->deleteCache($picture->getFile()->getIdFile());
                $this->serviceFile->update($picture->getFile());
            } else {
                $picture->getFile()->setIdPicture($picture->getIdPicture());
                $this->serviceFile->save($picture->getFile());
            }
        }
*/
        if ($commit === true) {
            $this->mapper->commit();
        }
    }

    public function delete(Picture $picture, $commit = false) {
        if ($commit === true) {
            $this->mapper->begin();
        }

        $this->mapper->delete($picture);

        if ($commit === true) {
            $this->mapper->commit();
        }
    }

    private function fetch(Picture $picture) {
        return $picture;
    }

    public function get($id) {
        $picture = $this->mapper->get($id);
        if ($picture !== null) {
            $picture = $this->fetch($picture);
        }
        return $picture;
    }

    public function getAll() {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getAll() as $picture) {
            $picture = $this->fetch($picture);
            $list->offsetSet($picture->getIdPicture(), $picture);
        }
        return $list;
    }

    public function getPageByIdEvent(\Nette\Utils\Paginator $paginator, $idEvent) {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getPageByIdEvent($paginator, $idEvent) as $picture) {
            $picture = $this->fetch($picture);
            $list->offsetSet($picture->getIdPicture(), $picture);
        }
        return $list;
    }

    public function getPublicByIdEvent(\Nette\Utils\Paginator $paginator, $idEvent) {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getPublicByIdEvent($paginator, $idEvent) as $picture) {
            $picture = $this->fetch($picture);
            $list->offsetSet($picture->getIdPicture(), $picture);
        }
        return $list;
    }

    public function getAllowedByIdEvent(\Nette\Utils\Paginator $paginator, $idEvent) {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getAllowedByIdEvent($paginator, $idEvent) as $picture) {
            $picture = $this->fetch($picture);
            $list->offsetSet($picture->getIdPicture(), $picture);
        }
        return $list;
    }

    public function getByIdEvent($idEvent) {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getByIdEvent($idEvent) as $picture) {
            $picture = $this->fetch($picture);
            $list->offsetSet($picture->getIdPicture(), $picture);
        }
        return $list;
    }

    public function getCountByIdEvent($idEvent) {
        return $this->mapper->getCountByIdEvent($idEvent);
    }
    
    public function getToSlider(){
        $list = new \Nette\ArrayHash();
        foreach ($this->mapper->getToSlider() as $picture){
            $picture = $this->fetch($picture);
            $list->offsetSet($list->count(), $picture);
        }
        return $list;
    }

    public function getRandom($count) {
        $list = new \Nette\ArrayHash();
        $temp = $this->getToSlider();
        do {
            $index = rand(0, $temp->count()-1);
            if ($list->offsetExists($index) === false) {
                $list->offsetSet($index, $temp->offsetGet($index));
            }
        } while ($list->count() !== $count);
        return $list;
    }

}

?>

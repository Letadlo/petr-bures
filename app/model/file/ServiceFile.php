<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServiceFile
 *
 * @author opravil.jan
 */
class ServiceFile extends \BaseService {

    //put your code here

    public function __construct(MapperFile $mapper) {
        parent::__construct($mapper);
    }

    public function save(File $file, $commit = false) {
        if ($commit === true) {
            $this->mapper->begin();
        }

        $file = $this->mapper->save($file);

        if ($commit === true) {
            $this->mapper->commit();
        }

        return $file;
    }

    public function update(File $file, $commit = false) {
        if ($commit === true) {
            $this->mapper->begin();
        }

        $this->mapper->update($file);

        if ($commit === true) {
            $this->mapper->commit();
        }
    }

    public function delete(File $file, $commit = false) {
        if ($commit === true) {
            $this->mapper->begin();
        }

        $this->mapper->delete($file);

        if ($commit === true) {
            $this->mapper->commit();
        }
    }

    private function fetch(File $file) {
        return $file;
    }

    public function get($id) {
        $file = $this->mapper->get($id);
        if ($file !== null) {
            $file = $this->fetch($file);
        }
        return $file;
    }

    public function addSource(File $file){
        $this->mapper->addSource($file);
    }

    public function getAll() {
        $list = new Nette\ArrayHash();
        foreach ($this->mapper->getAll() as $file) {
            $file = $this->fetch($file);
            $list->offsetSet($file->getIdFile(), $file);
        }
        return $list;
    }

    public function getByIdEvent($idEvent) {
        $file = $this->mapper->getByIdEvent($idEvent);
        if ($file !== null) {
            $file = $this->fetch($file);
        }
        return $file;
    }

    public function getByIdPlace($idPlace) {
        $file = $this->mapper->getByIdPlace($idPlace);
        if ($file !== null) {
            $file = $this->fetch($file);
        }
        return $file;
    }

    public function getByIdPicture($idPicture) {
        $file = $this->mapper->getByIdPicture($idPicture);
        if ($file !== null) {
            $file = $this->fetch($file);
        }
        return $file;
    }

    public function deleteCache($idFile) {
        $list = scandir(PICTURE_DIR . '/');
        foreach ($list as $string) {
            if (\Nette\Utils\Strings::startsWith($string, $idFile . '_')) {
                unlink(PICTURE_DIR . '/' . $string);
            }
        }
    }
}
?>

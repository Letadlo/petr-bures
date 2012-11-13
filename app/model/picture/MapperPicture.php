<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MapperPicture
 *
 * @author opravil.jan
 */
class MapperPicture extends \BaseMapper {

    //put your code here

    public function __construct(\Nette\DI\Container $container) {
        parent::__construct($container);
    }
    
    public function save(Picture $picture) {
        $attributes["allowed"] = $picture->getAllowed();
        $attributes["id_event"] = $picture->getIdEvent();
        $attributes["public"] = $picture->getPublic();
        $attributes["last_update"] = new Nette\DateTime();
        $attributes["slide"] = $picture->getSlide();
        $attributes["sort"] = $picture->getSort();
        $this->database->exec("INSERT INTO picture__picture", $attributes);
        $picture->setIdPicture($this->database->lastInsertId("picture__picture_id_picture_seq"));
        return $picture;
    }

    public function update(Picture $picture) {
        $attributes["allowed"] = $picture->getAllowed();
        $attributes["id_event"] = $picture->getIdEvent();
        $attributes["public"] = $picture->getPublic();
        $attributes["last_update"] = new Nette\DateTime();
        $attributes["slide"] = $picture->getSlide();
        $attributes["sort"] = $picture->getSort();
        $this->database->exec("UPDATE picture__picture SET ? WHERE id_picture = ?", $attributes, $picture->getIdPicture());
    }

    public function delete(Picture $picture) {
        $this->database->exec("DELETE FROM picture__picture WHERE id_picture = ?", $picture->getIdPicture());
    }

    private function fetch($object) {
        $picture = $this->container->createPicture();
        $picture->setAllowed($object->allowed);
        $picture->setIdEvent($object->id_event);
        $picture->setIdPicture($object->id_picture);
        $picture->setPublic($object->public);
        $picture->setLastUpdate($object->last_update);
        $picture->setSlide($object->slide);
        $picture->setSort($object->sort);
        return $picture;
    }

    public function get($id) {
        $result = $this->database->query("SELECT * FROM picture__picture WHERE id_picture = ?", $id);
        foreach ($result as $object) {
            return $this->fetch($object);
        }
        return null;
    }

    public function getAll() {
        $list = new Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM picture__picture ORDER BY sort");
        foreach ($result as $object) {
            $picture = $this->fetch($object);
            $list->offsetSet($picture->getIdPicture(), $picture);
        }
        return $list;
    }

    public function getPublic() {
        $list = new Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM picture__picture WHERE public IS TRUE AND allowed IS TRUE ORDER BY sort");
        foreach ($result as $object) {
            $picture = $this->fetch($object);
            $list->offsetSet($picture->getIdPicture(), $picture);
        }
        return $list;
    }

    public function getAllowed() {
        $list = new Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM picture__picture WHERE allowed IS TRUE ORDER BY sort");
        foreach ($result as $object) {
            $picture = $this->fetch($object);
            $list->offsetSet($picture->getIdPicture(), $picture);
        }
        return $list;
    }

    public function getPageByIdEvent(Nette\Utils\Paginator $paginator, $idEvent) {
        $list = new Nette\ArrayHash();
        $result = $this->database->query("SELECT COUNT(id_picture) AS pocet FROM picture__picture WHERE id_event = ?", $idEvent);
        foreach ($result as $object) {
            $paginator->setItemCount($object->pocet);
        }
        $result = $this->database->query("SELECT * FROM picture__picture WHERE id_event = ? ORDER BY sort LIMIT ? OFFSET ?", $idEvent, $paginator->getItemsPerPage(), $paginator->getOffset());
        foreach ($result as $object) {
            $picture = $this->fetch($object);
            $list->offsetSet($picture->getIdPicture(), $picture);
        }
        return $list;
    }

    public function getPublicByIdEvent(Nette\Utils\Paginator $paginator, $idEvent) {
        $list = new Nette\ArrayHash();
        $result = $this->database->query("SELECT COUNT(id_picture) AS pocet FROM picture__picture WHERE id_event = ? AND public IS TRUE", $idEvent);
        foreach ($result as $object) {
            $paginator->setItemCount($object->pocet);
        }
        $result = $this->database->query("SELECT * FROM picture__picture WHERE id_event = ? AND public IS TRUE ORDER BY sort LIMIT ? OFFSET ? ", $idEvent, $paginator->getItemsPerPage(), $paginator->getOffset());
        foreach ($result as $object) {
            $picture = $this->fetch($object);
            $list->offsetSet($picture->getIdPicture(), $picture);
        }
        return $list;
    }

    public function getAllowedByIdEvent(Nette\Utils\Paginator $paginator, $idEvent) {
        $list = new Nette\ArrayHash();
        $result = $this->database->query("SELECT COUNT(id_picture) AS pocet FROM picture__picture WHERE id_event = ? AND allowed IS TRUE", $idEvent);
        foreach ($result as $object) {
            $paginator->setItemCount($object->pocet);
        }
        $result = $this->database->query("SELECT * FROM picture__picture WHERE id_event = ? AND allowed IS TRUE ORDER BY sort LIMIT ? OFFSET ?", $idEvent, $paginator->getItemsPerPage(), $paginator->getOffset());
        foreach ($result as $object) {
            $picture = $this->fetch($object);
            $list->offsetSet($picture->getIdPicture(), $picture);
        }
        return $list;
    }

    public function getByIdEvent($idEvent) {
        $list = new Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM picture__picture WHERE id_event = ? ORDER BY sort", $idEvent);
        foreach ($result as $object) {
            $picture = $this->fetch($object);
            $list->offsetSet($picture->getIdPicture(), $picture);
        }
        return $list;
    }
    
    public function getToSlider(){
        $list = new \Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM picture__picture WHERE slide IS TRUE");
        foreach ($result as $object) {
            $picture = $this->fetch($object);
            $list->offsetSet($list->count(), $picture);
        }
        return $list;
    }

}
?>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MapperPlace
 *
 * @author opravil.jan
 */
class MapperPlace extends \BaseMapper {
    //put your code here
    
    public function __construct(\Nette\DI\Container $container) {
        parent::__construct($container);
    }
    
    public function save(Place $place){
        $attributes["name"] = $place->getName();
        $attributes["link"] = $place->getLink();
        $attributes["last_update"] = new Nette\DateTime();
        $attributes["public"] = $place->getPublic();
        $attributes["allowed"] = $place->getAllowed();
        $attributes["present"] = $place->getPresent();
        $this->database->exec("INSERT INTO place__place",$attributes);
        $place->setIdPlace($this->database->lastInsertId("place__place_id_place_seq"));
        return $place;
    }
    
    public function update(Place $place){
        $attributes["name"] = $place->getName();
        $attributes["link"] = $place->getLink();
        $attributes["last_update"] = new Nette\DateTime();
        $attributes["public"] = $place->getPublic();
        $attributes["allowed"] = $place->getAllowed();
        $attributes["present"] = $place->getPresent();
        $this->database->exec("UPDATE place__place SET ? WHERE id_place = ?",$attributes,$place->getIdPlace());
    }
    
    public function delete(Place $place){
        $this->database->exec("DELETE FROM place__place WHERE id_place = ?",$attributes,$place->getIdPlace());
    }
    
    private function fetch($object){
        $place = $this->container->createPlace();
        $place->setIdPlace($object->id_place);
        $place->setName($object->name);
        $place->setLink($object->link);
        $place->setAllowed($object->allowed);
        $place->setLastUpdate($object->last_update);
        $place->setPresent($object->present);
        $place->setPublic($object->public);
        return $place;
    }
    
    public function get($id){
        $result = $this->database->query("SELECT * FROM place__place WHERE id_place = ?",$id);
        foreach ($result as $object){
            return $this->fetch($object);
        }
        return null;
    }
    
    public function getAll(){
        $list = new Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM place__place ORDER BY name");
        foreach ($result as $object){
            $place = $this->fetch($object);
            $list->offsetSet($place->getIdPlace(), $place);
        }
        return $list;
    }
    
    public function getByLink($link){
        $result = $this->database->query("SELECT * FROM place__place WHERE link = ?",$link);
        foreach ($result as $object){
            return $this->fetch($object);
        }
        return null;
    }

    public function getPublic($present = true){
        $list = new Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM place__place WHERE present = ? AND public IS TRUE ORDER BY name",$present);
        foreach ($result as $object){
            $place = $this->fetch($object);
            $list->offsetSet($place->getIdPlace(), $place);
        }
        return $list;
    }

    public function getAllowed($present = true){
        $list = new Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM place__place WHERE present = ? AND allowed IS TRUE ORDER BY name",$present);
        foreach ($result as $object){
            $place = $this->fetch($object);
            $list->offsetSet($place->getIdPlace(), $place);
        }
        return $list;
    }
}

?>

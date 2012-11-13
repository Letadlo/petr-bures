<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MapperEvent
 *
 * @author opravil.jan
 */
namespace Event;

class MapperEvent extends \BaseMapper {
    //put your code here
    
    public function __construct(\Nette\DI\Container $container) {
        parent::__construct($container);
    }
    
    public function save(Event $event){
        $attributes["date"] = $event->getDate();
        $attributes["id_place"] = $event->getIdPlace();
        $attributes["last_update"] = new Nette\DateTime();
        $attributes["name"] = $event->getName();
        $attributes["link"] = $event->getLink();
        $attributes["allowed"] = $event->getAllowed();
        $attributes["public"] = $event->getPublic();
        $attributes["id_file"] = $event->getIdFile();
        $this->database->exec("INSERT INTO event__event",$attributes);
        $event->setIdEvent($this->database->lastInsertId("event__event_id_event_seq"));
        return $event;
    }
    
    public function update(Event $event){
        $attributes["date"] = $event->getDate();
        $attributes["id_place"] = $event->getIdPlace();
        $attributes["last_update"] = new Nette\DateTime();
        $attributes["name"] = $event->getName();
        $attributes["link"] = $event->getLink();
        $attributes["allowed"] = $event->getAllowed();
        $attributes["public"] = $event->getPublic();
        $attributes["id_file"] = $event->getIdFile();
        $this->database->exec("UPDATE event__event SET ? WHERE id_event = ?",$attributes,$event->getIdEvent());
    }
    
    public function delete(Event $event){
        $this->database->exec("DELETE FROM event__event WHERE id_event = ?",$event->getIdEvent());
    }
    
    public function deleteByIdEvent($idEvent){
        $this->database->exec("DELETE FROM event__event WHERE id_event = ?",$idEvent);
    }
    
    private function fetch($object){
        $event  = $this->container->createEvent();
        $event->setDate($object->date);
        $event->setIdEvent($object->id_event);
        $event->setIdPlace($object->id_place);
        $event->setLastUpdate($object->last_update);
        $event->setName($object->name);
        $event->setLink($object->link);
        $event->setAllowed($object->allowed);
        $event->setPublic($object->public);
        return $event;
    }
    
    public function get($id){
        $result = $this->database->query("SELECT * FROM event__event WHERE id_event = ?",$id);
        foreach ($result as $object){
            return $this->fetch($object);
        }
        return null;
    }
    
    public function getAll(){
        $list = new \Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM event__event ORDER BY date DESC");
        foreach ($result as $object){
            $event =  $this->fetch($object);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }
    
    public function getByIdPlace($idPlace){
        $list = new \Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM event__event WHERE id_place = ? ORDER BY date DESC",$idPlace);
        foreach ($result as $object){
            $event =  $this->fetch($object);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }

    public function getPublicByIdPlace($idPlace){
        $list = new \Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM event__event WHERE id_place = ? AND public IS TRUE ORDER BY date DESC",$idPlace);
        foreach ($result as $object){
            $event =  $this->fetch($object);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }

    public function getAllowedByIdPlace($idPlace){
        $list = new \Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM event__event WHERE id_place = ? AND allowed IS TRUE ORDER BY date DESC",$idPlace);
        foreach ($result as $object){
            $event =  $this->fetch($object);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }

    public function getPublicEvent($from,$to){
        $list = new \Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM event__event WHERE date BETWEEN ? AND ? AND public IS TRUE ORDER BY date DESC",$from,$to);
        foreach ($result as $object){
            $event =  $this->fetch($object);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }

    public function getAllowedEvent($from,$to){
        $list = new \Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM event__event WHERE date BETWEEN ? AND ? AND allowed IS TRUE ORDER BY date DESC",$from,$to);
        foreach ($result as $object){
            $event =  $this->fetch($object);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }
    
    public function getByLink($link){
        $result = $this->database->query("SELECT * FROM event__event WHERE link = ?",$link);
        foreach ($result as $object){
            return $this->fetch($object);
        }
        return null;
    }
    
    public function getLastPublic($count){
        $list = new \Nette\ArrayHash();
        $result = $this->database->query("SELECT * FROM event__event WHERE allowed IS TRUE AND public IS TRUE ORDER BY last_update DESC LIMIT ?",$count);
        foreach ($result as $object){
            $event =  $this->fetch($object);
            $list->offsetSet($event->getIdEvent(), $event);
        }
        return $list;
    }

    
}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MapperFile
 *
 * @author opravil.jan
 */
class MapperFile extends \BaseMapper {

    //put your code here
    
    public function __construct(\Nette\DI\Container $container) {
        parent::__construct($container);
    }

    public function save(File $file) {
        $attributes["extension"] = $file->getExtension();
        $attributes["mime_type"] = $file->getMimeType();
        $attributes["source"] = base64_encode($file->getSource());
        $attributes["id_event"] = $file->getIdEvent();
        $attributes["id_picture"] = $file->getIdPicture();
        $attributes["id_place"] = $file->getIdPlace();
        $this->database->exec("INSERT INTO file__file", $attributes);
        $file->setIdFile($this->database->lastInsertId("file__file_id_file_seq"));
        return $file;
    }

    public function update(File $file) {
        $attributes["extension"] = $file->getExtension();
        $attributes["mime_type"] = $file->getMimeType();
        $attributes["source"] = base64_encode($file->getSource());
        $attributes["id_event"] = $file->getIdEvent();
        $attributes["id_picture"] = $file->getIdPicture();
        $attributes["id_place"] = $file->getIdPlace();
        $this->database->exec("UPDATE file__file SET ? WHERE id_file = ?", $attributes, $file->getIdFile());
    }

    public function delete(File $file) {
        $this->database->exec("DELETE FROM file__file  WHERE id_file = ?", $file->getIdFile());
    }

    private function fetch($object) {
        $file = $this->container->createFile();
        $file->setExtension($object->extension);
        $file->setIdFile($object->id_file);
        $file->setMimeType($object->mime_type);
        $file->setIdEvent($object->id_event);
        $file->setIdPicture($object->id_picture);
        $file->setIdPlace($object->id_place);
        
        return $file;
    }

    public function get($id) {
        $result = $this->database->query("SELECT extension,id_file,mime_type,id_event,id_picture,id_place FROM file__file WHERE id_file = ?", $id);
        foreach ($result as $object) {
            return $this->fetch($object);
        }
        return null;
    }

    public function addSource(File $file){
        $result = $this->database->query("SELECT source FROM file__file WHERE id_file = ?", $file->getIdFile());
        foreach ($result as $object) {
            $file->setSource(base64_decode(stream_get_contents($object->source)));
        }
    }

    public function getAll() {
        $list = new Nette\ArrayHash();
        $result = $this->database->query("SELECT extension,id_file,mime_type,id_event,id_picture,id_place FROM file__file");
        foreach ($result as $object) {
            $file = $this->fetch($object);
            $list->offsetSet($file->getIdFile(), $file);
        }
        return $list;
    }

    public function getByIdPicture($idPicture) {
        $result = $this->database->query("SELECT extension,id_file,mime_type,id_event,id_picture,id_place FROM file__file WHERE id_picture = ?", $idPicture);
        foreach ($result as $object) {
            return $this->fetch($object);
        }
        return null;
    }

    public function getByIdPlace($idPlace) {
        $result = $this->database->query("SELECT extension,id_file,mime_type,id_event,id_picture,id_place FROM file__file WHERE id_place = ?", $idPlace);
        foreach ($result as $object) {
            return $this->fetch($object);
        }
        return null;
    }

    public function getByIdEvent($idEvent) {
        $result = $this->database->query("SELECT extension,id_file,mime_type,id_event,id_picture,id_place FROM file__file WHERE id_event = ?", $idEvent);
        foreach ($result as $object) {
            return $this->fetch($object);
        }
        return null;
    }

}

?>

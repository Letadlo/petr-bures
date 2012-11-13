<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of File
 *
 * @author opravil.jan
 */
use Nette\Utils\Html;
use Nette\Image;

class File extends \Femoz\Picture\Picture {

    //put your code here

    private $idFile;
    private $idPicture;
    private $idPlace;
    private $idEvent;

    /**
     *
     * 
     * @var ServiceFile
     */
    private $serviceFile;

    public function __construct($file = null) {
        parent::__construct($file);
    }

    public function setIdFile($idFile) {
        $this->idFile = $idFile;
    }

    public function setIdPicture($idPicture) {
        $this->idPicture = $idPicture;
    }

    public function setIdPlace($idPlace) {
        $this->idPlace = $idPlace;
    }

    public function setIdEvent($idEvent) {
        $this->idEvent = $idEvent;
    }

    public function setServiceFile(ServiceFile $serviceFile) {
        $this->serviceFile = $serviceFile;
    }

    public function getIdFile() {
        return $this->idFile;
    }

    public function getIdPicture() {
        return $this->idPicture;
    }

    public function getIdPlace() {
        return $this->idPlace;
    }

    public function getIdEvent() {
        return $this->idEvent;
    }

    public function getServiceFile() {
        return $this->serviceFile;
    }

    private function resize($width, $height = null) {
        $image = Image::fromString($this->source);
        if ($height !== null) {
            $x = floor($image->getWidth() / $width);
            $y = floor($image->getHeight() / $height);
            if ($x <= $y) {
                $image->resize($width, null);
            } else {
                $image->resize(null, $height);
            }
            $x = floor($image->getWidth() / $width);
            $y = floor($image->getHeight() / $height);
            if ($x <= $y) {
                $left = floor(($image->getWidth() - $x * $width) / 2);
                $tempWidth = $image->getWidth() - ($image->getWidth() - $x * $width);
                $top = ($image->getHeight() - $x * $height) / 2;
                $tempHeight = $image->getHeight() - ($image->getHeight() - $x * $height);
            } else {
                $left = ($image->getWidth() - $y * $width) / 2;
                $tempWidth = $image->getWidth() - ($image->getWidth() - $y * $width);
                $top = ($image->getHeight() - $y * $height) / 2;
                $tempHeight = $image->getHeight() - ($image->getHeight() - $y * $height);
            }
            if ($tempHeight != 0 && $tempWidth != 0) {
                $image->crop($left, $top, $tempWidth, $tempHeight);
            }
            $this->source = base64_encode($image->toString(Image::JPEG, 80));
        } else {
            $image->resize($width, null);
            $this->source = base64_encode($image->toString(Image::JPEG, 80));
        }
    }

    public function save() {
        if (file_exists(PICTURE_DIR . '/' . $this->idFile . ".jpg") === false) {
            $this->serviceFile->addSource($this);
            $image = Image::fromString($this->source);
            $image->save(PICTURE_DIR . '/' . $this->idFile . '.' . $this->extension, 80, Image::JPEG);
            $this->watermark(PICTURE_DIR . '/' . $this->idFile . '.' . $this->extension);
        }
    }

    private function watermark($path) {
        $imageLogo = Image::fromFile(WWW_DIR . "/images/logo_fancy_box_opacity.png");
        $image = Image::fromFile($path);
        $image->alphaBlending(TRUE);
        $imageLogo->alphaBlending(TRUE);
        $x = 0;
        $y = 0;
        if ($image->getWidth() > $imageLogo->getWidth()) {
            $x = floor(($image->getWidth() - $imageLogo->getWidth()) / 2);
        }
        if ($image->getHeight() > $imageLogo->getHeight()) {
            $y = floor(($image->getheight() - $imageLogo->getHeight()) / 2);
        }
        imagecopy($image->getImageResource(), $imageLogo->getImageResource(), $x, $y, 0, 0, $imageLogo->getWidth(), $imageLogo->getHeight());
        //imagecopymerge($image->getImageResource(), $imageLogo->getImageResource(), $x, $y, 0, 0, $imageLogo->getWidth(), $imageLogo->getHeight(), 15);
        $image->save(PICTURE_DIR . '/' . $this->idFile . '.' . $this->extension, 80, Image::JPEG);
    }

    public function toHtml($width, $height, $text) {
        $this->serviceFile->addSource($this);
        $this->resize($width, $height);
        $img = Html::el("img");
        $img->src = "data:" . $this->mimeType . ";base64," . $this->source;
        $img->alt = $text;
        return $img;
    }

}

?>

<?php 

namespace App;

class Image2Ml {

    var $allowedTypes = array(
        1,  // [] gif
        2,  // [] jpg
        3,  // [] png
        6   // [] bmp
    );

    var $type = NULL;

    var $im = NULL;

    var $imageUrl = NULL;

    var $label = NUll;

    var $size = 40;

    var $w = NULL;
    var $h = NULL;

    /**
     * array of string
     *  dirname : dir where the file is located
     *  basename : filename with extension
     *  extension :
     *  filename : filename with no extension
     */
    var $pathInfo = NULL;

    function __construct($imageUrl = NULL){

        $this->imageUrl = $imageUrl;
        $this->pathInfo = pathinfo($this->imageUrl);
        $this->im = $this->imageCreateFromAny($this->imageUrl);
        $this->im = $this->resizeImage();
    }

    function imageCreateFromAny($filepath) {
        $this->type = exif_imagetype($filepath); // [] if you don't have exif you could use getImageSize()

        if (!in_array($this->type, $this->allowedTypes)) {
            throw new Exception("Invalid file type : {$this->type} from {$filepath}.\n");
        }

        switch ($this->type) {
            case 1 :
                $im = imageCreateFromGif($filepath);
                break;
            case 2 :
                $im = imageCreateFromJpeg($filepath);
                break;
            case 3 :
                $im = imageCreateFromPng($filepath);
                break;
            case 6 :
                $im = imagecreatefromwbmp($filepath);
                break;
        }

        $this->w = imagesx($im); // image width
        $this->h = imagesy($im); // image height

        return $im;
    }

    function resizeImage()
    {

        $im = imagecreatetruecolor($this->size, $this->size);

        if(!is_resource($im)){
            throw new Exception("Unable to resize file : {$this->imageUrl}.\n");
        }

        imagecopyresampled($im, $this->im, 0, 0, 0, 0,
            $this->size, $this->size, $this->w, $this->h);

        return $im;
    }

    public function grayScalePixels(){

        $cur_array = array();
        $cnt = 0;
        for($y = 0; $y < $this->size; $y++){
            for($x = 0; $x < $this->size; $x++){
                $rgb = imagecolorat($this->im, $x, $y) / 16777215;
                $cur_array[$cnt] = $rgb;
                $cnt++;
            }
        }
//        unlink($this->imageUrl);
        return array(array_slice($cur_array, 1));
    }
}

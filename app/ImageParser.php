<?php

namespace App;


class ImageParser
{
    var $url = NULL;

    var $num = NULL;

    var $im = NULL;

    function __construct($url)
    {
        $this->url = $url;
        $this->num = rand(0, 49);
    }

    /**
     * @param null $im
     */
    public function setIm()
    {
        $result = array();
        $content = file_get_contents($this->url);
        $json = json_decode($content);
        foreach ($json->hits as $resultjson) {
            array_push($result, $resultjson->largeImageURL);
        }
        return  $result[$this->num];
    }
}


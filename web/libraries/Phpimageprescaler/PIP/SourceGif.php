<?php

namespace Phpimageprescaler\PIP;


class SourceGif extends Source
{
    public function imageCreateFrom($resource, $crop)
    {
        if ($crop) {
            $this->crop();
        }
        return imagecreatefromgif($this->getSourceFile());
    }

    function showImage($resource, $filename, $quality)
    {
        return imagegif($resource, $filename);
    }
}
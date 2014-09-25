<?php

namespace Phpimageprescaler\PIP;


class SourceGif extends Source
{
    public function imageCreateFrom($resource)
    {
        return imagecreatefromgif($this->getSourceFile());
    }

    function showImage($resource, $filename, $quality)
    {
        return imagegif($resource, $filename);
    }
}
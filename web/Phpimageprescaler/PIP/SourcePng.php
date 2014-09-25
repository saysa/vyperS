<?php

namespace Phpimageprescaler\PIP;


class SourcePng extends Source
{
    public function imageCreateFrom($resource)
    {
        return imagecreatefrompng($this->getSourceFile());
    }

    function showImage($resource, $filename, $quality)
    {
        return imagepng($resource, $filename, 9, PNG_FILTER_NONE);
    }
}
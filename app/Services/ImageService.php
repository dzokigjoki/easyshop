<?php

namespace EasyShop\Services;

use File;
use Image;

class ImageService
{

    /**
     * @param $image
     * @param $width
     * @param $height
     * @return mixed
     */
    public function crop($image, $width, $height)
    {

        if ($image->width() / $image->height() > $width / $height) {
            $image->resize(null, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        } else {
            $image->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        
        $image->crop($width, $height);
        
        return $image;
    }

}

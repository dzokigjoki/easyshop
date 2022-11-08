<?php

namespace EasyShop\Services;

use Image;

class ManufacturerService
{

    protected $imageService;

    public function __construct()
    {
        $this->imageService = new ImageService();
    }

    function saveMainImage($file, $manufacturerId)
    {

        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $image = Image::make($file->getRealPath());
        $path = public_path('uploads' . DIRECTORY_SEPARATOR . 'manufacturers' . DIRECTORY_SEPARATOR . $manufacturerId . DIRECTORY_SEPARATOR);
        $image->save($path . $filename, 80);
        $image->destroy();

        return ['filename' => $filename];
    }
}

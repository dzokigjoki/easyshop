<?php

namespace EasyShop\Services;

use Image;

class SupplierService
{

    protected $imageService;

    public function __construct()
    {
        $this->imageService = new ImageService();
    }   
 
    function saveMainImage($file, $supplierId)
    {

        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            $watermark = Image::make(public_path() . '/assets/admin/easyshop/' . config( 'app.client') . '/watermark.png');
        }
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        $imageMD = Image::make($file->getRealPath());
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            if(config( 'app.client') == 'shopathome') {
                $watermark->resize(30, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } else {
                $watermark->resize(80, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
        }
        $imageMD = $this->imageService->crop($imageMD, \EasyShop\Models\AdminSettings::getDimensions('productssize', 'md', 'width'), \EasyShop\Models\AdminSettings::getDimensions('productssize', 'md', 'height'));
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            $imageMD->insert($watermark, 'bottom-right');
        }
        $path= public_path('uploads' . DIRECTORY_SEPARATOR . 'suppliers' . DIRECTORY_SEPARATOR . $supplierId . DIRECTORY_SEPARATOR);
        $imageMD->save($path. 'md_' . $filename, 80);
        $imageMD->destroy();
        
        return ['filename' => $filename];
    }
    
}

<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use File;

class ProductImages extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_images';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the image path
     *
     * @param $productId - id of the product
     * @return string
     */
    public static function imagePath($productId)
    {
        return public_path('uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . $productId . DIRECTORY_SEPARATOR);
    }

    public static function checkDirectory($id)
    {
        if (File::isDirectory(public_path('uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . $id))) {
            return true;
        }
        return false;
    }
}

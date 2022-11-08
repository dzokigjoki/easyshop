<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOptionsPackage extends Model
{
    protected $table = 'product_options_package';


    public function product()
    {
        return $this->belongsTo(\EasyShop\Models\Product::class, 'product_id');
    }

    public function values(){
        // return $this->hasMany(\Easyshop\Models\ProductOptionValue)
    }
}

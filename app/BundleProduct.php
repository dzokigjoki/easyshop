<?php

namespace EasyShop;

use Illuminate\Database\Eloquent\Model;

class BundleProduct extends Model
{
    protected $table = 'bundle_products';
    
    public function product(){
        return $this->belongsTo(\EasyShop\Models\Product::class, 'product_id');
    }


}

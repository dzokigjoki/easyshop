<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOptionValue extends Model
{
    protected $table = 'product_option_values';


    public function option()
    {
        return $this->belongsTo(\EasyShop\Models\ProductOptions::class, 'option_id');
    }
}

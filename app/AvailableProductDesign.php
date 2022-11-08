<?php

namespace EasyShop;

use Illuminate\Database\Eloquent\Model;

class AvailableProductDesign extends Model
{
    protected $table = 'available_product_designs';

    protected $casts = [
        'json' => 'array'
    ];


    public function value()
    {
        return $this->belongsTo(\EasyShop\Models\ProductOptionValue::class, 'value_id');
    }
}

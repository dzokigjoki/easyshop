<?php

namespace EasyShop\Models;

use EasyShop\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductOptions extends Model
{
    protected $table = 'product_options';


    public function values()
    {
        return $this->hasMany('EasyShop\Models\ProductOptionValue', 'option_id', 'id');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'options_products_pivot', 'option_id', 'product_id');
    }
}

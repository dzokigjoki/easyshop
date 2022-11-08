<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class GradualDiscount extends Model
{
    /**
     * @var string
     */
    protected $table = 'gradual_discounts';

    /**
     * @var bool
     */
    public $timestamps = true;

    public function items()
    {
        return $this->hasMany(GradualDiscountItem::class, 'gradual_discount_id', 'id')->orderBy('gradual_discount_items.discount_percentage', 'desc');
    }

    public function products()
    {
        return $this->belongsToMany('EasyShop\Models\Product', 'gradual_discount_products', 'gradual_discount_id', 'product_id');
    }
}

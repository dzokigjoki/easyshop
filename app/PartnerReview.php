<?php

namespace EasyShop;
use EasyShop\Models\Product;

use Illuminate\Database\Eloquent\Model;

class PartnerReview extends Model
{
    protected $table = 'partner_reviews';

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}

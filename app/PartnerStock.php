<?php

namespace EasyShop;

use EasyShop\Models\Product;
use Illuminate\Database\Eloquent\Model;

class PartnerStock extends Model
{
    protected $table = 'partner_stock';

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    
}

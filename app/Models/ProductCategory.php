<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
     protected $table = 'product_category';
     protected $primaryKey  = 'id';
     public $timestamps = true;
}

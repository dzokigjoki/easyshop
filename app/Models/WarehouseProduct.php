<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use URL;

class WarehouseProduct extends Model
{

    /**
     * @var string
     */
    protected $table = 'product_warehouse';

    /**
     * @var bool
     */
    public $timestamps = true;

}

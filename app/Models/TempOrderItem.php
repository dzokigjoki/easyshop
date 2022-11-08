<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class TempOrderItem extends Model
{

    /**
     * @var string
     */
    protected $table = 'temp_order_items';

    /**
     * @var bool
     */
    public $timestamps = true;

}

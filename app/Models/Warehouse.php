<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    /**
     *
     */
    const MAIN_WAREHOUSE = 1;

    use SoftDeletes;


    /**
     * @var string
     */
    protected $table = 'warehouses';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var bool
     */
    public $timestamps = true;

}

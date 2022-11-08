<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{

    /**
     * @var string
     */
    protected $table = 'services';

    /**
     * @var bool
     */
    public $timestamps = true;

}
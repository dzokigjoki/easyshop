<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use URL;

class Newsletter extends Model
{

    /**
     * @var string
     */
    protected $table = 'newsletter';

    /**
     * @var bool
     */
    public $timestamps = true;

}

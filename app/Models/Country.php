<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
   /**
     * @var string
     */
    protected $table = 'countries';

    /**
     * @var bool
     */
    public $timestamps = false;
}

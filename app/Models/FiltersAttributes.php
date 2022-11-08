<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use URL;

class FiltersAttributes extends Model
{

    /**
     * @var string
     */
    protected $table = 'filters_attributes';

    /**
     * @var bool
     */
    public $timestamps = true;
}

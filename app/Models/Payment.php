<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use URL;

class Payment extends Model
{
    const TYPE_GOTOVO = 'gotovo';
    const TYPE_CASYS = 'casys';
    const TYPE_HALK = 'halk';

    /**
     * @var string
     */
    protected $table = 'payments';

    /**
     * @var bool
     */
    public $timestamps = true;

}

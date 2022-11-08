<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use URL;

class Filters extends Model
{

    /**
     * @var string
     */
    protected $table = 'filters';

    /**
     * @var bool
     */
    public $timestamps = true;

    protected $fillable = [
        'filter',
        'name',
        'show',
    ];

    public static $uploadsPath = 'uploads/category';

    /**
     * Get attributes for filter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */



     public function attributes()
    {


        if (detectLang() == 'lang1') {

            return $this->hasMany(\EasyShop\Models\Attributes::class, 'filter_id');
        }

        return $this->hasMany(\EasyShop\Models\Attributes::class, 'filter_id')->whereNotNull('filters_attributes.value_' . $this->lang)->select('*', 'filters_attributes.value_' . $this->lang . ' as value');
    }
}

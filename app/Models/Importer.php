<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class Importer extends Model
{
    protected $table = 'importers';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getCountry()
    {
        return $this->belongsTo(\EasyShop\Models\Country::class, 'country_id');
    }

}

<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use URL;

class DocumentItems extends Model
{

    /**
     * @var string
     */
    protected $table = 'document_items';

    /**
     * @var bool
     */
    public $timestamps = true;

    public function document(){
        $this->belongsTo(DocumentItems::class , 'document_id');
    }




}

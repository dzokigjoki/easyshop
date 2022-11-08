<?php

namespace EasyShop;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    /**
     * @var string
     */
    protected $table = 'couriers';




    public static function getCourierName($id){
        if(!$id){
            return false;
        }
        return Courier::find($id)->name;
    }
}

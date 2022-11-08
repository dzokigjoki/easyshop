<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class BannerCategory extends Model
{
    protected $table = 'banner_category';
    protected $primaryKey  = 'id';
    public $timestamps = true;

    public function banners()
    {
        return $this->belongsToMany('EasyShop\Models\Banner', 'banner_table_category', 'category_id', 'banner_id');
    }
    
    public function getByTitle($name)
    {
        return BannerCategory::where('title', '=', $name);
    }
}

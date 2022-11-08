<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use EasyShop\Repositories\BannerRepository\BannerRepositoryInterface;


class Banner extends Model
{
    protected $table = 'banners';
    protected $primaryKey  = 'id';
    public $timestamps = true;

    public static function imagePath($bannerId)
    {
        return public_path() . '/uploads/banners/' . $bannerId . '/';
    }
    
    public function categories()
    {
        return $this->belongsTo(BannerCategory::class, 'banner_category_id', 'id');
    }

}
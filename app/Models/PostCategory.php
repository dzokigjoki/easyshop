<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
     protected $table = 'post_category';
     protected $primaryKey  = 'id';
     public $timestamps = true;
}

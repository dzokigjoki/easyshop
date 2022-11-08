<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use URL;

class Category extends Model
{

    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var bool
     */
    public $timestamps = true;

    protected $lang;

    public static $uploadsPath = 'uploads/category';

    protected $fillable = [
        'parent',
        'title',
        'url',
        'description',
        'order',
        'unit_id',
        'type',
        'active',
        'image',
        'main_category',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }



    public function __construct()

    {

        $this->lang = detectLang();
    }


    /**
     * Get children
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function child()
    {
        return $this->hasMany('EasyShop\Models\Category', 'parent', 'id');
    }

    /**
     * Get active child
     *
     * @return mixed
     */
    public function activeChild()
    {
        return $this->hasMany('EasyShop\Models\Category', 'parent', 'id')->where('active', 1);
    }


    public function belongs()
    {
        return $this->belongsTo('EasyShop\Models\Category', 'parent');
    }

    /**
     * Get products for category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('EasyShop\Models\Product', 'product_category', 'category_id', 'product_id');
    }


    public function filters()
    {


        if ($this->lang == 'lang1') {
            return $this->belongsToMany(\EasyShop\Models\Filters::class, 'category_filters', 'category_id', 'filter_id');
        }
        return $this->belongsToMany(\EasyShop\Models\Filters::class, 'category_filters', 'category_id', 'filter_id')->whereNotNull('filters.name_' . $this->lang)->select('filters.id', 'filters.filter', 'filters.show', 'filters.unit_id', 'filters.name_' . $this->lang . ' as name');
    }





    public static function getCategoryById($id, $lang = "lang1")
    {

        if ($lang == "lang1") {
            return Category::where('active', 1)

                ->select('*')


                ->find($id);
        }
        
        return Category::where('active', 1)

            ->select(

                '*',

                'id',

                'type',

                'image',

                'title_' . $lang . ' as title',

                'url_' . $lang . ' as url',

                'description_' . $lang . ' as description'

            )


            ->find($id);
    }

    public function childHasActiveChild()
    {
        $has_active_child = false;
        foreach ($this->activeChild as $child) {

            if ($child->activeChild->count()) {
                $has_active_child = true;
                break;
            }
        }
        return $has_active_child;
    }

    /**
     * Make categories tree from all categories
     *
     * @param $tree
     * @param $parent
     * @return array
     */
    public static function formatTree($tree, $parent)
    {
        $result = array();
        foreach ($tree as $item) {
            if ($item->parent == $parent) {
                $tempChildren = self::formatTree($tree, $item->id);
                $item->children = $tempChildren;
                if (count($item->children) < 1) {
                    unset($item->children);
                }
                array_push($result, (array) $item);
            }
        }
        return $result;
    }

    /**
     * @param $tree
     * @param $parent
     * @return array
     */
    public static function getCategoryChild($tree, $parent)
    {
        $result = array();
        foreach ($tree as $i => $item) {
            if ($item->parent_id == $parent) {
                array_push($result, $item->id);
            }
        }
        return $result;
    }
}

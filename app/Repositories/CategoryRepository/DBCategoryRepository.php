<?php

namespace EasyShop\Repositories\CategoryRepository;

use DB;
use EasyShop\Models\Category;
use EasyShop\Models\Settings;

class DBCategoryRepository implements CategoryRepositoryInterface
{

    /**
     * Get Category by id
     */
    public function find($id)
    {
        return DB::table('categories')->find($id);
    }

    /**
     * Get all categories
     *
     * @param $orderBy
     * @param $order
     * @param $onlyMainMenu
     * @return mixed
     */
    public function getAll($orderBy = NULL, $order = 'asc', $onlyMainMenu = false, $lang = "lang1")
    {
        $query = DB::table('categories');

        if ($onlyMainMenu) {
            $query =  $query->where('main_category', '=', '1');
        }

        if (!is_null($orderBy)) {
            $query->orderBy($orderBy, $order);
        }

        if ($lang == 'lang1') {
            $query->select('*');
        } else {
            $query->select('*', 'title_' . $lang . ' as title', 'url_' . $lang . ' as url');
        }

        return $query->get();
    }

    /**
     * Get all active category lists
     *
     * @param $orderBy
     * @param $order
     *
     * @return array
     */
    public function getAllActive($orderBy = NULL, $order = 'asc', $onlyMainMenu = false, $lang = "lang1")
    {
        $query = DB::table('categories')->where('active', '=', '1');

        if ($onlyMainMenu) {
            $query =  $query->where('main_category', '=', '1');
        }

        if (!is_null($orderBy)) {
            $query->orderBy($orderBy, $order);
        }

        if ($lang == 'lang1') {
            $query->select('*');
        } else {
            $query->select('*', 'title_' . $lang . ' as title', 'url_' . $lang . ' as url');
        }

        return $query->get();
    }


    public function getCategoriesForJson($orderBy = NULL, $order = 'asc', $onlyMainMenu = false)
    {
        $query = DB::table('categories')->where('active', '=', '1');

        if ($onlyMainMenu) {
            $query =  $query->where('main_category', '=', '1');
        }

        if (!is_null($orderBy)) {
            $query->orderBy($orderBy, $order);
        }

        $query->select('id', 'title', 'url', 'parent');

        return $query->get();
    }

    public function getAllBlogListing($orderBy = 'title', $order = 'asc')
    {
        return  Category::active()->where('type', 'list_posts')->get();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return Category::where('id', '=', $id)->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteById($id)
    {
        DB::table('categories')->where('id', '=', $id)->delete();
    }

    /**
     * Delete all categories related with product
     *
     * @param $productId
     * @return mixed
     */
    public function deleteForProduct($productId)
    {
        DB::table('product_category')->where('product_id', $productId)->delete();
    }

    /**
     * Delete all categories related with post
     *
     * @param $productId
     * @return mixed
     */
    public function deleteForPost($post_id)
    {
        DB::table('post_category')->where('post_id', $post_id)->delete();
    }

    /**
     * Get the next order number for given parent
     *
     * @param $parentId
     * @return mixed
     */
    public function getNextOrder($parentId = NULL)
    {
        $query = DB::table('categories');

        if (is_null($parentId)) {
            $query->whereNull('parent');
        } else {
            $query->where('parent', '=', $parentId);
        }

        return $query->max('order') + 1;
    }

    /**
     * @param $categoryId
     * @param $parentId
     * @param $positions
     * @return mixed
     */
    public function updateOrders($categoryId, $parentId, $positions)
    {
        DB::transaction(function () use ($categoryId, $parentId, $positions) {
            DB::table('categories')
                ->where('id', '=', $categoryId)
                ->update([
                    'parent' => $parentId
                ]);

            foreach ($positions as $position) {
                DB::table('categories')->where('id', '=', $position['id'])->update(['order' => $position['position']]);
            }
        });
    }

    /**
     * Get active children of category
     *
     * @param $categoryId
     * @param null $orderBy
     * @param string $order
     * @return mixed
     */
    public function getActiveChildren($categoryId, $orderBy = NULL, $order = 'asc', $lang = "lang1")
    {

        if ($lang == "lang1") {
            $query = DB::table('categories')->where('parent', '=', $categoryId)->where('active', '=', 1);
        } else {
            $query = DB::table('categories')->where('parent', '=', $categoryId)->where('active', '=', 1)
                ->select("*", 'title_' . $lang . ' as title', 'url_' . $lang . ' as url');
        }


        if (!is_null($orderBy)) {
            $query->orderBy($orderBy, $order);
        }

        return $query->get();
    }

    /**
     * Returns an array that consists of filter names for a given category
     *
     * @param $cid
     *
     * @return array
     */

    public function getFiltersForCategory($cid)
    {
        return \DB::table('category_filters')->where('category_id', $cid)->pluck('filter_id');
    }

    /**
     * @param $filters
     * @return array
     */
    public function getFiltersArray($filters)
    {
        $result = array();

        foreach ($filters as $v) {
            $result[$v] = self::getFilterName($v)[0];
        }

        return $result;
    }

    /**
     * Returns an array that consists of filter attributes for a given filter
     *
     * @param $fid
     *
     * @returns array
     */

    public function getAttributesForFilter($fid)
    {
        return \DB::table('filters_attributes')->where('filter_id', $fid)->select('id', 'value')->get();
    }

    public function getFilterName($fid)
    {
        return \DB::table('filters')->where('id', $fid)->pluck('filter');
    }



    /**
     * Get min and max prices for category slider
     *
     * @param $priceGroup
     * @param $categoryId
     * @return mixed
     */
    public function getSliderPrices($priceGroup, $categoryId)
    {
        if (
            $priceGroup === 'price_retail_1' &&
            in_array(config('app.client'), [
                Settings::CLIENT_HERLINE,
                Settings::CLIENT_MY_MODA,
                Settings::CLIENT_HOTSPOT,
                Settings::CLIENT_NATURATHERAPYSHOP_AL,
                Settings::CLIENT_NATURATHERAPYSHOP_ALB,
                Settings::CLIENT_NATURATHERAPYSHOP
            ])
        ) {
            return \DB::table('products')->join('product_category', 'products.id', '=', 'product_category.product_id')
                ->where('product_category.category_id', '=', $categoryId)
                ->where(function ($query) {
                    $query->where('active', 1)
                        ->whereNull('deleted_at');
                })
                ->select(
                    \DB::raw("MAX(products.final_price_retail_1) as max_price"),
                    \DB::raw("MIN(products.final_price_retail_1) as min_price")
                )->first();
        } else {
            return \DB::table('products')->join('product_category', 'products.id', '=', 'product_category.product_id')
                ->where('product_category.category_id', '=', $categoryId)
                ->select(
                    \DB::raw("MAX(products.{$priceGroup}) as max_price"),
                    \DB::raw("MIN(products.{$priceGroup}) as min_price")
                )->first();
        }
    }

    /**
     * Get filtered products for category
     *
     * @param int $categoryId
     * @param string $priceGroup
     * @param object $filters
     * @return mixed
     */
    public function getFilteredProducts($categoryId, $priceGroup, $filters, $lang = 'lang1')
    {
        $query = \DB::table('products')
            ->leftJoin('product_category', 'product_category.product_id', '=', 'products.id')
            ->where('product_category.category_id', '=', $categoryId)
            ->where('products.active', '=', 1)
            ->where('products.show_on_web', '=', 1)
            ->whereNull('products.deleted_at')
            ->orderBy('products.' . $filters->sort, $filters->order);

        if (!\EasyShop\Models\AdminSettings::getField('showChildren')) {
            $query = $query->whereNull('products.parent_product');
        }

        if (!is_null($filters->priceFrom) && !is_null($filters->priceTo)) {
            if ($priceGroup == 'price_retail_1' && in_array(config('app.client'), [
                Settings::CLIENT_HERLINE,
                Settings::CLIENT_MY_MODA,
                Settings::CLIENT_HOTSPOT,
                Settings::CLIENT_NATURATHERAPYSHOP_AL,
                Settings::CLIENT_NATURATHERAPYSHOP_ALB,
                Settings::CLIENT_NATURATHERAPYSHOP
            ])) {
                $query->whereBetween('products.final_price_retail_1', [$filters->priceFrom, $filters->priceTo]);
            } else {
                $query->whereBetween('products.' . $priceGroup, [$filters->priceFrom, $filters->priceTo]);
            }
        }

        if (!is_null($filters->attributes)) {
            foreach ($filters->attributes as $attributes) {

                $query->whereIn('products.id', \DB::table('products')->select('product_id')->from('product_attributes')->whereIn('product_attributes.filter_att_id', $attributes));
            }
        }

        if ($lang == 'lang1') {
            $query->select('products.*');
        } else {
            $query->select('products.*', 'products.title_' . $lang . ' as title', 'products.url_' . $lang . ' as url');
        }

        // clone the query for counting products
        $countQuery = clone $query;

        switch (config('app.client')) {
            case "naturatherapy":
                break;
            case "barbakan":
                break;
            default:
                $query->skip(($filters->page - 1) * $filters->limit)
                    ->take($filters->limit);
        }

        return [
            $query->groupBy('products.id')->get(),
            $countQuery->count()
        ];
    }
}

<?php

namespace EasyShop\Repositories\ArticleRepository;

use DB;
use EasyShop\Models\Product;
use EasyShop\Models\Wishlist;

class DBArticleRepository implements ArticleRepositoryInterface
{

    protected $model;

    public function __construct()
    {
        $this->model = new \EasyShop\Models\Product();
    }

    /**
     * Get article by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return Product::with('categories')->find($id);
    }

    /**
     * Get active article by id
     *
     * @param $id
     * @return mixed
     */
    public function getActiveById($id)
    {
        return Product::where('active', true)->where('id', $id)->first();
    }

    /**
     * Get active articles by an array of ids
     * 
     * @param $ids
     * @return mixed
     */
    public function getActiveByIds($ids)
    {
        return Product::whereIn('id', $ids)->where('active', true)->get();
    }

    /**
     * Get all articles
     *
     * @return mixed
     */
    public function getAll()
    {
        return Product::all();
    }

    /**
     * @param null $categoryIds
     * @return mixed
     */
    public function getAllFeed($categoryIds = null)
    {
        $query = Product::where('active', 1);

        if (is_array($categoryIds)) {
            $query->leftJoin('product_category', 'product_category.product_id', '=', 'products.id')
                ->whereIn('product_category.category_id', $categoryIds)
                ->distinct('products.id')
                ->select('products.*');
        }

        return $query->get();
    }

    /**
     * @param $oldCategoryId
     * @param $newCategoryId
     * @return number - the number of affected rows
     */
    public function changeArticlesCategory($oldCategoryId, $newCategoryId)
    {
        return DB::table('product_category')
            ->where('category_id', '=', $oldCategoryId)
            ->update(['category_id' => $newCategoryId]);
    }

    /**
     * Get newest articles
     *
     * @param integer $count
     * @param array $categoryIds - get products in this categories
     */
    public function getNewest($count = 20, $categoryIds = null, $lang = "lang1")
    {
        $query = DB::table('products')
            ->where('active', 1)
            ->where('show_on_web', 1)
            ->whereNull('deleted_at')
            ->whereRaw("DATE(NOW()) >= DATE(new_from)")
            ->whereRaw("DATE(NOW()) <= DATE(new_to)");

        if (is_array($categoryIds)) {
            $query->leftJoin('product_category', 'product_category.product_id', '=', 'products.id')
                ->whereIn('product_category.category_id', $categoryIds)
                ->distinct('products.id');
        }
        
        
        
        
        
        if ($lang == "lang1") {

            $query->select('products.*');
        } else {

            $query->select(
                'products.*',
                'products.title_' . $lang . ' as title',
                'products.url_' . $lang . ' as url'
            );
        }

        return
            $query->orderBy('products.created_at', 'desc')
            ->take($count)
            ->get();
    }

    /**
     * Get best sellers articles
     *
     * @param integer $count
     * @param array $categoryIds - get products in this categories
     */
    public function getBestSellers($count = 20, $categoryIds = null, $lang = "lang1")
    {
        $query = DB::table('products')
            ->where('active', 1)
            ->where('show_on_web', 1)
            ->whereNull('deleted_at')
            ->where('is_best_seller', 1);

        if (is_array($categoryIds)) {
            $query->leftJoin('product_category', 'product_category.product_id', '=', 'products.id')
                ->whereIn('product_category.category_id', $categoryIds)
                ->distinct('products.id');
        }

        if ($lang == "lang1") {

            $query->select('products.*');
        } else {

            $query->select(
                'products.*',
                'products.title_' . $lang . ' as title',
                'products.url_' . $lang . ' as url'
            );
        }

        return
            $query->orderBy('products.created_at', 'desc')
            ->take($count)
            ->get();
    }

    /**
     * Get best sellers articles
     *
     * @param integer $count
     * @param array $categoryIds - get products in this categories
     */
    public function getRecommended($count = 20, $categoryIds = null, $lang = "lang1")
    {
        $query = DB::table('products')
            ->where('active', 1)
            ->where('show_on_web', 1)
            ->whereNull('deleted_at')
            ->where('is_recommended', 1);

        if (!\EasyShop\Models\AdminSettings::getField('showChildren')) {
            $query = $query->whereNull('products.parent_product');
        }

        if (is_array($categoryIds)) {
            $query->leftJoin('product_category', 'product_category.product_id', '=', 'products.id')
                ->whereIn('product_category.category_id', $categoryIds)
                ->distinct('products.id');
        }
        if ($lang == "lang1") {

            $query->select('products.*');
        } else {

            $query->select(
                'products.*',
                'products.title_' . $lang . ' as title',
                'products.url_' . $lang . ' as url'
            );
        }

        return
            $query->orderBy('products.created_at', 'desc')
            ->take($count)
            ->get();
    }


    /**
     * Get exclusive articles
     *
     * @param integer $count
     * @param array $categoryIds - get products in this categories
     */
    public function getExclusive($count = 20, $categoryIds = null, $lang = "lang1")
    {
        $query = DB::table('products')
            ->where('active', 1)
            ->where('show_on_web', 1)
            ->whereNull('deleted_at')
            ->where('is_exclusive', 1);

        if (is_array($categoryIds)) {
            $query->leftJoin('product_category', 'product_category.product_id', '=', 'products.id')
                ->whereIn('product_category.category_id', $categoryIds)
                ->distinct('products.id');
        }

        if ($lang == "lang1") {

            $query->select('products.*');
        } else {

            $query->select(
                'products.*',
                'products.title_' . $lang . ' as title',
                'products.url_' . $lang . ' as url'
            );
        }
        return
            $query->orderBy('products.created_at', 'desc')
            ->take($count)
            ->get();
    }


    /**
     * Get articles on discount
     *
     * @param integer $count
     * @param array $categoryIds - get products in this categories
     */
    public function getOnDiscount($count = 20, $categoryIds = null, $lang = "lang1")
    {

        $query = DB::table('products')
            ->where('active', 1)
            ->where('show_on_web', 1)
            ->whereNull('deleted_at')
            ->where('is_exclusive', 1);

        if (is_array($categoryIds)) {
            $query->leftJoin('product_category', 'product_category.product_id', '=', 'products.id')
                ->whereIn('product_category.category_id', $categoryIds)
                ->distinct('products.id')
                ->select('products.*');
        }





        if ($lang == "lang1") {

            $query->select('products.*');
        } else {

            $query->select(
                'products.*',
                'products.title_' . $lang . ' as title',
                'products.url_' . $lang . ' as url'
            );
        }

        return
            $query->orderBy('products.created_at', 'desc')
            ->take($count)
            ->get();
    }



    /**
     * Get daily promotions
     *
     */
    public function getDailyPromotions()
    {
        return DB::table('products')
            ->where('active', 1)
            ->where('show_on_web', 1)
            ->whereNull('deleted_at')
            ->where('daily_promotion', date('Y-m-d'))
            ->get();
    }
    /**
     * Get popular articles
     *
     * @param integer $count
     * @param array $categoryIds - get products in this categories
     */
    public function getPopular($count = 20, $categoryIds = null)
    {
        $query =  DB::table('products')
            ->where('active', 1)
            ->where('show_on_web', 1)
            ->whereNull('deleted_at');

        if (is_array($categoryIds)) {
            $query->leftJoin('product_category', 'product_category.product_id', '=', 'products.id')
                ->whereIn('product_category.category_id', $categoryIds)
                ->distinct('products.id')
                ->select('products.*');
        }

        return
            $query->orderBy('products.visits', 'desc')
            ->take($count)
            ->get();
    }

    /**
     * Get images for product
     *
     * @param $id
     * @return mixedG
     */
    public function getProductImages($id)
    {
        return DB::table('product_images')->where('product_id', $id)->orderBy('sort_order', 'asc')->get();
    }

    public function search()
    {
        // TODO: Implement search() method.
    }


    /**
     * Get best sellers articles
     *
     * @param integer $categoryIds
     * @param integer $count
     * @param array $exclude
     */
    public function getRelatedProducts($categoryIds, $count = 10, $exclude = [], $lang = "lang1")
    {
        $query = DB::table('products')
        ->leftJoin('product_category', 'products.id', '=', 'product_category.product_id')
        ->select('products.*')
        ->whereIn('product_category.category_id', $categoryIds)
            ->whereNotIn('products.id', $exclude)
            ->where('products.active', '=', 1)
            ->where('products.show_on_web', '=', 1)
            ->whereNull('products.deleted_at');

        if (config( 'app.client') == "sofu") {
            $query = $query->whereNull('products.parent_product');
        }

        if ($lang == "lang1") {

            $query->select('products.*');
        } else {

            $query->select(
                'products.*',
                'products.title_' . $lang . ' as title',
                'products.url_' . $lang . ' as url'
            );
        }


        $query = $query->whereNull('products.parent_product')
        ->distinct()
            ->orderBy('created_at', 'desc')
            ->take($count)
            ->get();

        return $query;
    }

    public function getPreviousProduct($parameter, $product_id, $exclude = [])
    {

        if (is_numeric($parameter)) {

            return DB::table('products')
                ->leftJoin('product_category', 'products.id', '=', 'product_category.product_id')
                ->select('products.*')
                ->where('product_category.category_id', $parameter)
                ->whereNotIn('products.id', $exclude)
                ->where('products.id', '<', $product_id)
                ->where('products.active', 1)
                ->where('products.show_on_web', 1)
                ->whereNull('products.deleted_at')
                ->distinct()
                ->orderBy('products.id', 'desc')
                ->take(1)
                ->get();
        } else {
            if ($parameter == "recommended") {

                return DB::table('products')
                    ->select('products.*')
                    ->where('products.is_recommended', true)
                    ->whereNotIn('products.id', $exclude)
                    ->where('products.id', '<', $product_id)
                    ->where('products.active', 1)
                    ->where('products.show_on_web', 1)
                    ->whereNull('products.deleted_at')
                    ->distinct()
                    ->orderBy('products.id', 'desc')
                    ->take(1)
                    ->get();
            } else if ($parameter == "action") {

                return DB::table('products')
                    ->select('products.*')
                    ->where('products.is_exclusive', true)
                    ->whereNotIn('products.id', $exclude)
                    ->where('products.id', '<', $product_id)
                    ->where('products.active', 1)
                    ->where('products.show_on_web', 1)
                    ->whereNull('products.deleted_at')
                    ->distinct()
                    ->orderBy('products.id', 'desc')
                    ->take(1)
                    ->get();
            } else if ($parameter == "newest") {

                return DB::table('products')
                    ->select('products.*')
                    ->whereNotIn('products.id', $exclude)
                    ->where('products.id', '>', $product_id)
                    ->where('products.active', 1)
                    ->where('products.show_on_web', 1)
                    ->whereNull('products.deleted_at')
                    ->distinct()
                    ->orderBy('products.id', 'asc')
                    ->take(1)
                    ->get();
            }
        }
    }

    public function getNextProduct($parameter, $product_id, $exclude = [])
    {
        if (is_numeric($parameter)) {

            return DB::table('products')
                ->leftJoin('product_category', 'products.id', '=', 'product_category.product_id')
                ->select('products.*')
                ->where('product_category.category_id', $parameter)
                ->whereNotIn('products.id', $exclude)
                ->where('products.id', '>', $product_id)
                ->where('products.active', 1)
                ->where('products.show_on_web', 1)
                ->whereNull('products.deleted_at')
                ->distinct()
                ->orderBy('products.id', 'asc')
                ->take(1)
                ->get();
        } else {

            if ($parameter == "recommended") {

                return DB::table('products')
                    ->select('products.*')
                    ->where('products.is_recommended', true)
                    ->whereNotIn('products.id', $exclude)
                    ->where('products.id', '>', $product_id)
                    ->where('products.active', 1)
                    ->where('products.show_on_web', 1)
                    ->whereNull('products.deleted_at')
                    ->distinct()
                    ->orderBy('products.id', 'asc')
                    ->take(1)
                    ->get();
            } else if ($parameter == "action") {

                return DB::table('products')
                    ->select('products.*')
                    ->where('products.is_exclusive', true)
                    ->whereNotIn('products.id', $exclude)
                    ->where('products.id', '>', $product_id)
                    ->where('products.active', 1)
                    ->where('products.show_on_web', 1)
                    ->whereNull('products.deleted_at')
                    ->distinct()
                    ->orderBy('products.id', 'asc')
                    ->take(1)
                    ->get();
            } else if ($parameter == "newest") {

                return DB::table('products')
                    ->select('products.*')
                    ->whereNotIn('products.id', $exclude)
                    ->where('products.id', '>', $product_id)
                    ->where('products.active', 1)
                    ->where('products.show_on_web', 1)
                    ->whereNull('products.deleted_at')
                    ->distinct()
                    ->orderBy('products.id', 'asc')
                    ->take(1)
                    ->get();
            }
        }
    }


    public function getProductVariationQuantity($productId, $variationId)
    {
        return DB::table('variation_quantity')
            ->where('product_id', $productId)
            ->where('variation_id', $variationId)
            ->sum('quantity');
    }

    public function getVariationValues($productId)
    {
        return DB::table('product_variations')
            ->where('product_id', $productId)
            ->join('variations', 'product_variations.variation_id', '=', 'variations.id')
            ->select('variations.value')
            ->get();
    }

    public function incrementVisit($productId)
    {
        DB::table('products')
            ->where('id', $productId)
            ->increment('visits', 1);
    }

    public function getProductAttributes($productId)
    {
        $pa = DB::table('product_attributes')
            ->where('product_id', $productId)
            ->join('filters', 'filters.id', '=', 'product_attributes.filter_id')
            ->join('filters_attributes', 'filters_attributes.id', '=', 'product_attributes.filter_att_id')
            ->select('filters.name', 'filters_attributes.value')
            ->get();
        $return_attributes = [];
        foreach ($pa as $key => $value) {
            $return_attributes[$value->name][] = $value;
        }
        return $return_attributes;
    }


    /**
     * Get ids for products that are inside categories
     *
     * @param $categoryIds
     * @return mixed
     */
    public function getProductIdsInCategories($categoryIds)
    {
        return DB::table('product_category')->select('product_id')->whereIn('category_id', $categoryIds)->get();
    }

    public function isInSession($sessionOfProductIDs, $pid)
    {
        foreach ($sessionOfProductIDs as $id) {
            if ($id === $pid) {
                return true;
            }
        }
        return false;
    }

    public function getHomeProducts($type, $limit = 20)
    {
        if ($type === 'newest') {
            $products = Product::where('active', 1)
                ->where('show_on_web', 1)
                ->select('id', 'title', 'url', 'image', 'price_retail_1', 'discount_type', 'discount_value', 'unit_code')
                ->orderBy('created_at', 'desc')
                ->take($limit)
                ->get();
        } else {
            $products = Product::where('active', 1)
                ->where('show_on_web', 1)
                ->where('is_' . $type, 1)
                ->select('id', 'title', 'url', 'image', 'price_retail_1', 'discount_type', 'discount_value', 'unit_code')
                ->orderBy('created_at', 'desc')
                ->take($limit)
                ->get();
        }



        foreach ($products as $product) {
            $product->price = (float)$product->price_retail_1;
            $product->discountPrice = (float)Product::getPriceRetail1($product, false, 2);
            $product->sku = $product->unit_code;
            $product->imageSM = asset('uploads/products/' . $product->id . '/' . 'sm' . '_' . $product->image);
            $product->imageMD = asset('uploads/products/' . $product->id . '/' . 'md' . '_' . $product->image);
            $product->imageLG = asset('uploads/products/' . $product->id . '/' . 'lg' . '_' . $product->image);

            unset($product->unit_code);
            unset($product->discount_type);
            unset($product->discount_value);
            unset($product->price_retail_1);
        }

        return $products;
    }


    public function getUserWishlist($userId)
    {
        $products = DB::select(
            "SELECT id, title, url, image, price_retail_1, discount_type, discount_value, unit_code 
             FROM products 
             WHERE products.id 
             IN (SELECT product_id 
             FROM wishlist 
             WHERE wishlist.user_id = $userId)
             ORDER BY products.created_at DESC"
        );

        foreach ($products as $product) {
            $product->discount_price = (float)Product::getPriceRetail1($product, false, 2);
            unset($product->discount_type);
            unset($product->discount_value);
            $product->price = (float)$product->price_retail_1;
            $product->sku = $product->unit_code;
            $product->imageSM = asset('uploads/products/' . $product->id . '/sm_' . $product->image);
            $product->imageMD = asset('uploads/products/' . $product->id . '/md_' . $product->image);
            $product->imageLG = asset('uploads/products/' . $product->id . '/lg_' . $product->image);
            unset($product->price_retail_1);

            if ($product->discount_price == $product->price) {
                $product->discount_price = null;
            }
        }

        return $products;
    }
}

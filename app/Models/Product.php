<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Auth;
use EasyShop\BundleProduct;

class Product extends Model
{
    use SoftDeletes;

    const TYPE_PRODUCT = 'product';
    const TYPE_SERVICE = 'service';

    const TYPE_RECOMMENDED = 'recommended';
    const TYPE_EXCLUSIVE = 'exclusive';
    const TYPE_BEST_SELLER = 'best_seller';

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'unit_code',
        'title',
        'unit_id',
        'vat',
        'total_stock',
        'price_retail_1',
        'url',
        'discount',
        'image',
        'short_description',
        'description',
        'url',
        'active',
        'is_exclusive',
        'is_best_seller',
        'is_recommended',
        'sku',
        'visits',
        'type',
        'new_from',
        'new_to',
        'show_on_web',
        'sell_on_web'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('EasyShop\Models\Category', 'product_category', 'product_id', 'category_id');
    }

    public function options()
    {
        return $this->belongsToMany(ProductOptions::class, 'options_products_pivot', 'product_id', 'option_id');
    }

    public function bundleProducts()
    {
        return $this->hasMany(BundleProduct::class, 'bundle', 'id');
    }


    public function selectedOptionValues()
    {
        return $this->hasMany('EasyShop\Models\ProductOptionValue', 'option_id', 'option_id');
    }

    public function packages()
    {
        return $this->hasMany(\EasyShop\Models\ProductOptionsPackage::class, 'product_id');
    }




    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function manufacturer()
    {
        return $this->belongsTo(\EasyShop\Models\Manufacturers::class, 'manufacturer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getImporter()
    {
        return $this->belongsTo(\EasyShop\Models\Importer::class, 'importer_id');
    }

    /**
     * Returns an array of variations
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function variations()
    {
        return $this->belongsToMany('EasyShop\Models\Variations', 'product_variations', 'product_id', 'variation_id');
    }

    /**
     * @return mixed
     */
    public function variationValues()
    {
        return $this->variations()->select('value')->get();
    }



    public static function getProductAttributes($productId, $lang)

    {



        if ($lang == 'lang1') {

            $pa = DB::table('product_attributes')

                ->where('product_id', '=', $productId)

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




        $pa = DB::table('product_attributes')

            ->where('product_id', '=', $productId)

            ->join('filters', 'filters.id', '=', 'product_attributes.filter_id')

            ->join('filters_attributes', 'filters_attributes.id', '=', 'product_attributes.filter_att_id')

            ->select('filters.name_' . $lang . ' as name', 'filters_attributes.value_' . $lang . ' as value')

            ->get();

        $return_attributes = [];

        foreach ($pa as $key => $value) {

            if ($value->name)

                $return_attributes[$value->name][] = $value;
        }

        return $return_attributes;
    }




    public static function getProductByIdInLang($id, $lang = 'lang1')
    {
        if ($lang == 'lang1') {
            return Product::where('products.id', '=', $id)
                ->where('active', 1)
                ->select(
                    '*',
                    'title as title',
                    'url as url',
                    'short_description as short_description',
                    'description as description'
                )
                ->first();
        }

        return Product::where('products.id', '=', $id)
            ->where('active', 1)
            ->select(
                '*',
                'title_' . $lang . ' as title',
                'url_' . $lang . ' as url',
                'short_description_' . $lang . ' as short_description',
                'description_' . $lang . ' as description'
            )
            ->first();
    }

    /**
     * @return mixed
     */
    public function variationValuesAndIds()
    {
        if (config( 'app.client') == Settings::CLIENT_HERLINE) {
            return $this->variations()->select('variations.*')->orderBy('order', 'asc')->get();
        } else {
            return $this->variations()->select('variations.*')->orderBy('value', 'desc')->get();
        }
    }

    /**
     * @name variationValuesAndQuantities
     *
     * @description Get variation values and quantities
     *
     * @return mixed
     */
    public function variationValuesAndQuantities()
    {
        return $this->variations()
            ->leftJoin('variation_quantity', 'variations.id', '=', 'variation_quantity.variation_id')
            ->where('variation_quantity.product_id', '=', $this->id)
            ->select('variations.id', 'variations.value', 'variation_quantity.quantity')
            ->get();
    }
    /**
     * Get variation of the product by id
     *
     * @param $variationId
     * @return mixed
     */
    public function getVariationById($variationId)
    {
        return $this->variations()->where('variations.id', '=', $variationId)->select('variations.id', 'variations.value')->first();
    }

    public static function productsByCategories($categoryId)
    {
        return DB::table('products')->join('product_category', 'products.id', '=', 'product_category.product_id')->whereNull('products.deleted_at')->where('product_category.category_id', $categoryId)->select('products.*')->get();
    }

    public function myVariations()
    {
    }

    public static function checkDiscount($product_id)
    {
        $price_group = 'price_retail_1';
        if (Auth::check())
            $price_group = Auth::user()->cenovna_grupa;

        $discount = DB::table('discounts')->whereRaw("(NOW() between `start` and `end`)")->where('product_id', $product_id)->first();
        if ($discount) {
            return [
                'type' => $discount->type,
                'value' => $discount->value,
                'end_date' => $discount->end
            ];
        } else {
            return false;
        }
    }


    public static function getDiscountPrice($price, $product_id, $format = TRUE, $decimals = 2)
    {
        $discount = DB::table('discounts')->whereRaw("(NOW() between `start` and `end`)")->where('product_id', $product_id)->first();

        if ($discount) {

            if (empty($format)) {
                if ($discount->type == 'fixed')
                    return $price - $discount->value;
                else
                    return $price - ($price / 100) * $discount->value;
            } else {

                if ($discount->type == 'fixed')
                    return number_format($price - $discount->value, $decimals, ',', '');
                else
                    return number_format($price - ($price / 100) * $discount->value, $decimals, ',', '');
            }
        }
    }

    /**
     *
     */
    public static function getPriceRetail1($product, $format = false, $decimals = 2)
    {
        if (!is_null($product->discount_type) && !is_null($product->discount_value)) {
            if (!$format) {
                if ($product->discount_type === 'fixed') {
                    return $product->price_retail_1 - $product->discount_value;
                } else {
                    return $product->price_retail_1 - ($product->price_retail_1 / 100) * $product->discount_value;
                }
            } else {
                if ($product->discount_type === 'fixed') {
                    return number_format($product->price_retail_1 - $product->discount_value, $decimals, ',', '.');
                } else {
                    return number_format($product->price_retail_1 - ($product->price_retail_1 / 100) * $product->discount_value, $decimals, ',', '.');
                }
            }
        } else {
            if (!$format) {
                return $product->price_retail_1;
            } else {
                return number_format($product->price_retail_1, $decimals, ',', '');
            }
        }
    }

    public static function getProductPoints($product){
        return $product->points;
    }

    public static function hasDiscount($json)
    {
        if (!$json) {
            return false;
        }

        $discount = json_decode($json);

        $start = Carbon::parse($discount->start);
        $end = Carbon::parse($discount->end);
        $now = Carbon::now();

        if ($start->gt($now) || $end->lt($now)) {
            return false;
        }

        return true;
    }


    public function children()
    {
        return $this->hasMany(Product::class, 'parent_product');
    }
}

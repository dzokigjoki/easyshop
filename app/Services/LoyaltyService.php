<?php

namespace EasyShop\Services;

use EasyShop\Models\Product;
use DB;
use \Auth;

class LoyaltyService
{
    protected $user;

    public function __construct()
    {
        $this->user = \Auth::user();
    }

    public function getUserInfo()
    {
        $response = null;
        if (\Auth::check()) {
            $id = \Auth::user()->id;
            $response = DB::table('users')->where('id', '=', $id)->get();
        }
        return $response[0];
    }
    public static function isProductInLoyaltyCategory($product)
    {
        $categories = DB::table("product_category")->where("product_id", $product->id)->get();
        $loyaltyCategory = DB::table('categories')->where("id", 20)->get();
        $categoryId = $loyaltyCategory[0]->id;
        foreach ($categories as $category) {
            if ($category->category_id == $categoryId) {
                return true;
            }
        }
        return false;
    }
    public static function getUserLoyaltyCodeByPhone($phone)
    {
        $user = DB::table('users')->where('phone', '=', $phone)->first();
        return null !== $user ? $user->loyalty_code : '';
    }
}

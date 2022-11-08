<?php

namespace EasyShop\Helpers;


use DB;
use EasyShop\Models\Product;

class ArticleHelper
{
    public static function changePositionOnUpdate($productId, $newPosition)
    {
        $oldPosition = Product::find($productId)->order;
        $newPosition = (int) $newPosition;

        if ($newPosition < $oldPosition) {
            $products = Product::where([['order', '>=', $newPosition], ['order', '<=', $oldPosition]])->get();

            foreach ($products as $product) {

                if ($product->order == $oldPosition) {

                    $product->order = $newPosition;
                } else {
                    $product->order = ($product->order) + 1;
                }

                $product->save();
            }
        } else if ($newPosition > $oldPosition) {
            $products = Product::where([['order', '>=', $oldPosition], ['order', '<=', $newPosition]])->get();
            foreach ($products as $product) {

                if ($product->order == $oldPosition) {

                    $product->order = $newPosition;
                } else {
                    $product->order = ($product->order) - 1;
                }

                $product->save();
            }
        }
    }
    public static function changePositionOnDelete($productToBeDeleted)
    {

        $products = Product::where([['order', '>', $productToBeDeleted->order]])->get();

        foreach ($products as $product) {
            $product->order = ($product->order) - 1;
            $product->save();
        }
    }
    public static function changePositionOnCreate($productToBeInserted, $newPosition)
    {

        $products = Product::where([['order', '>=', $newPosition]])->get();
        foreach ($products as $product) {
            $product->order = ($product->order) + 1;
            $product->save();
        }
    }

    public static function getAllActiveArticles()
    {
        $products = DB::table('products')
            ->where('active', '=', 1)
            ->where('show_on_web', '=', 1)
            ->whereNull('deleted_at')
            ->whereRaw("DATE(NOW()) >= DATE(new_from)")
            ->whereRaw("DATE(NOW()) <= DATE(new_to)")->orderBy('products.created_at', 'desc')
            ->get();

        return $products;
    }

    public static function checkIfInCategory($productId, $categoryId)
    {
        $product = Product::find($productId);

        $productCategoriesIds = $product->categories()->get()->pluck("id");
        if(in_array($categoryId, $productCategoriesIds->toArray())){
            return 1;
        }else{
            return 0;
        }
    }

    public static function getVATMultiplier($vat)
    {
        $vat = (int)$vat;

        switch($vat) {
            case 20:
                return 1.2;
            case 18:
                return 1.18;
            case 5: 
                return 1.05;
            case 0:
                return 1;
            default:
                return 1.18;
        }
    }
}

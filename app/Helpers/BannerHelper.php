<?php

namespace EasyShop\Helpers;


use DB;
use EasyShop\Models\Banner;
use EasyShop\Models\BannerCategory;

class BannerHelper
{
    public static function getBannerByCategory($categoryTitle, $type = "web")
    {
        
        $banners = DB::table('banner_category as bc')
            ->where('bc.title','=', $categoryTitle)
            ->leftJoin('banners as b', 'bc.id', '=', 'b.banner_category_id')
            ->where('b.active','=', 1)
            ->where('b.type','=', $type)
            ->select('b.*')
            ->orderBy('b.position', 'asc')->get();

        
        return $banners;
    }

   public static function getAll($type = "web")
    {
        $banners = DB::table('banner_category as bc')
            ->Join('banners as b', 'bc.id', '=', 'b.banner_category_id')
            ->where('b.active', 1)
            ->where('b.type', $type)
            ->select('b.*', 'bc.title as banner_position')
            ->orderBy('b.position', 'asc')->get();

        return $banners;
    }

    public static function getNextPosition($categoryTitle, $bannerType)
    {
        $banners = DB::table('banner_category as bc')->Join('banners as b', 'bc.id', '=', 'b.banner_category_id')->where('bc.title', $categoryTitle)->where('b.type', $bannerType)->count();

        return $banners;
    }
    public static function changePositionOnUpdate($bannerId, $newPosition, $newCategoryId)
    {
        $oldPosition = Banner::find($bannerId)->position;
        $newPosition = (int) $newPosition;

        if ($newPosition < $oldPosition) {
            $banners = Banner::where([['position', '>=', $newPosition], ['banner_category_id', '=', $newCategoryId], ['position', '<=', $oldPosition]])->get();

            foreach ($banners as $banner) {

                if ($banner->position == $oldPosition) {

                    $banner->position = $newPosition;
                } else {
                    $banner->position = ($banner->position) + 1;
                }

                $banner->save();
            }
        } else if ($newPosition > $oldPosition) {
            $banners = Banner::where([['position', '>=', $oldPosition], ['banner_category_id', '=', $newCategoryId], ['position', '<=', $newPosition]])->get();

            foreach ($banners as $banner) {

                if ($banner->position == $oldPosition) {

                    $banner->position = $newPosition;
                } else {
                    $banner->position = ($banner->position) - 1;
                }

                $banner->save();
            }
        }
    }
    public static function changePositionOnDelete($bannerToBeDeleted)
    {

        $banners = Banner::where([['position', '>', $bannerToBeDeleted->position], ['banner_category_id', '=', $bannerToBeDeleted->category_id]])->get();

        foreach ($banners as $banner) {
            $banner->position = ($banner->position) - 1;
            $banner->save();
        }
    }
    public static function changePositionOnCreate($bannerToBeInserted, $newPosition, $newCategoryId)
    {

        $banners = Banner::where([['position', '>=', $newPosition], ['banner_category_id', '=', $newCategoryId]])->get();

        foreach ($banners as $banner) {
            $banner->position = ($banner->position) + 1;
            $banner->save();
        }
    }
}

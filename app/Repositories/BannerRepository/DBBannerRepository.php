<?php

namespace EasyShop\Repositories\BannerRepository;

use EasyShop\Repositories\BannerRepository\BannerRepositoryInterface;
use DB;
use EasyShop\Models\Banner;

class DBBannerRepository implements BannerRepositoryInterface
{

    protected $model;
    protected $bannerRepository;



    /**
     * Get article by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return Banner::where('id', '=', $id)->first();
    }

    /**
     * @description
     * Make html select from categories
     */
    public function setCategoriesHtml($array, $selected_ids, $start = 0, $parentsDisabled = true)
    {
        $html = '';
        foreach ($array as $v) {
            $selected = "";
            if (in_array($v->id, $selected_ids)) {

                $selected = "selected";
            }
            $temp = "<option {$selected} value='{$v->id}'>" . str_repeat('-', $start) . " {$v->title}</option>";

            $html .= $temp;
        }

        return $html;
    }

    /**
     * Get all banners
     *
     * @return mixed
     */
    public function getAll()
    {
        return Banner::all();
    }

    public function getAllWebActive($order = 'position', $orderType = 'ASC')
    {
        return DB::table('banners')
            ->where('active', 1)
            ->where('type', 'web')
            ->select('id', 'title', 'image', 'mobile_image', 'url')
            ->orderBy($order, $orderType)
            ->get();
    }


    public function getAllCategories()
    {
        $query = DB::table('banner_category');
        return $query->get();
    }

    public function deleteBannerCategories($banner_id)
    {
        DB::table('banner_table_category')->where('banner_id', $banner_id)->delete();
    }

    public function getNextPosition()
    {
        $position = Banner::max('position');
        if (!$position) {
            $position = 1;
        } else {
            $position++;
        }

        return $position;
    }
}

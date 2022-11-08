<?php

namespace EasyShop\Http\Controllers\Api;

use EasyShop\Http\Controllers\Controller;
use EasyShop\Services\ApiResponse;
use EasyShop\Helpers\BannerHelper;

use Illuminate\Http\Request;
use JWTAuth;


class BannerController extends Controller
{
    protected $apiResponse;

    public function __construct(
        ApiResponse $apiResponse
    )
    {
        $this->apiResponse = $apiResponse;
    }


    public function getByCategory($category)
    {
        if (!$category) {
            return $this->apiResponse->error([], 'No category provided.', 404);
        }


        $banners = BannerHelper::getBannerByCategory($category, 'mobile');

        foreach ($banners as $banner) {
            $banner->image = asset('uploads/banners/' . $banner->id . '/' . 'mob' . '_' . $banner->image);
        }

        return $this->apiResponse->success(['records' => $banners]);
    }


    public function getAll()
    {
        $banners = BannerHelper::getAll('mobile');

        foreach ($banners as $banner) {
            $banner->image = asset('uploads/banners/' . $banner->id . '/' . 'mob' . '_' . $banner->image);
        }

        return $this->apiResponse->success(['records' => $banners]);
    }

}

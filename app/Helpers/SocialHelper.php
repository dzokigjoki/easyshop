<?php

namespace EasyShop\Helpers;

class SocialHelper
{
    /**
     * Fetch instagram items
     */
    public function getInstagramItems($key, $accessToken)
    {
        $instagramItems = [];
        $time = 60;
        $client = new \GuzzleHttp\Client();
        $result = $client->get('https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $accessToken . '&count=8');
        $instagramItems = json_decode($result->getBody());
        Cache::put($key, $instagramItems, $time);
        return $instagramItems;
    }
}

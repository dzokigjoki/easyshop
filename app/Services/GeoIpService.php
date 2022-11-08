<?php

namespace EasyShop\Services;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;


class GeoIpService
{

  public function getLocation()
  {
    $location = geoip()->getLocation(\Request::getClientIp()); // da se implentira try catch block

    if ($location->country == "Albania") {
      foreach (\EasyShop\Models\AdminSettings::getField('currencies') as $i) {
        if ($i['name'] == 'LEK') {  
          $price_multiplier = $i['divider'];
          break;
        }
      }
    } else {
      foreach (\EasyShop\Models\AdminSettings::getField('currencies') as $i) {
        if ($i['name'] == 'EUR') {
          $price_multiplier = $i['divider'];
          break;
        }
      }
    }


    Cookie::queue('location', $price_multiplier, 150);

    return $price_multiplier;
  }


  public function getLangExtension()
  {
    
    $location = geoip()->getLocation(\Request::getClientIp()); // da se implentira try catch block

    if ($location->country == "Albania" || $location->country == "Kosovo") {
      return "/";
    } else {
      return "/en/";
    }
  }
}

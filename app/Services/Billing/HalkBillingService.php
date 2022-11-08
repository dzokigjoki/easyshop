<?php

namespace EasyShop\Services\Billing;


class HalkBillingService
{
  /**
   * @param $totalPrice
   * @param $tempOrderId
   * @param $input
   * @return mixed
   */
  public function generateHash($rnd, $amount, $oid)
  {
    $clientId = \EasyShop\Models\AdminSettings::getField('clientId');
    $storeKey = \EasyShop\Models\AdminSettings::getField('storeKey');

    $hash = $clientId . $oid . $amount . route('halk.success') . route('halk.fail') . 'Auth' . $rnd . route('halk.success') . $storeKey;

    return base64_encode(pack('H*', sha1($hash)));
  }
}
